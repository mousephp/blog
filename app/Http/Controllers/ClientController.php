<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\Models\Author;
use App\Models\Tags;
use App\Models\Slides;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Builder;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{

	public function getHome(){
		$data['news']	  = News::all();

		//slides
		$data['slides']	  = Slides::take(5)->get();

		//Chính trị-Kinh doanh
		$data['politics'] = Category::where('cate_name','chính trị')->take(1)->get();
		$data['business'] = Category::where('cate_name','kinh doanh')->take(1)->get();

		//Xu hướng
		$data['trending'] = News::where('tag_id','1')->orWhere('tag_id','2')->take(3)->orderBy('id','desc')->get();

		//Tin nổi bật
		$data['randomFeatured'] = News::where('news_featured','1')->inRandomOrder()->paginate(3);
		$data['featuredOne']	= News::all()->random(); 

		//Sức khẻo		
		$data['health']		= Category::where('cate_name','SỨC KHỎE')->take(1)->get();

		//Tin tức gần đây
		$data['newsCreate'] = News::orderBy('id','desc')->paginate(6);//desc =>fase

		//Bài viết phổ biến
		$data['featured']	= News::where('news_featured','1')->orderBy('id','asc')->paginate(4);

		//times customs 
		$data['day']	= Carbon::now()->day; //ngày
		$data['month']  = Carbon::now()->month; //tháng
		$data['hour']   = Carbon::now()->hour; //giờ; 
		$data['minute'] = Carbon::now()->minute; //phút
		$time= Carbon::now('Asia/Ho_Chi_Minh');
		$time->toTimeString(); 
		return view('client.index',$data,compact('time'));	
	}

	//show danh sach bai viet
	public function getCategory($id){
		$data['category'] = Category::find($id);//thuoc danh muc nao
		$data['news']	  = News::where('category_id',$id)->orderBy('id','desc')->paginate(6);//dl cua danh muc
		$data['featured'] = News::where('news_featured','1')->where('category_id',$id)->orderBy('id','asc')->paginate(4);//tin noi bat cua danh muc
		return view('client.category',$data);
	}

	//show bai viet
	public function getDetail($id){
		$data['detail']		  = News::find($id);

		//show comment
		$data['comment']	  = Comment::where('new_id',$id)->paginate(10);
		$data['countComment'] = Comment::where('new_id',$id)->count();//dem comment trong 1 tin cu the
		//
		$data['featured']	  = News::where('news_featured','1')->orderBy('id','asc')->paginate(4);
		return view('client.details',$data);
	}

    //show detail slide
	public function getDetailslides($id){
		$data['detail'] = Slides::find($id);
		$time = Carbon::now('Asia/Ho_Chi_Minh');
		$time->toTimeString(); 
		return view('client.slidedetail',$data,compact('time'));
	}

	//show list author
	public function getAuthor(){
		$data['author'] = Author::paginate(7);
		return view('client.about',$data);
	}

	//show author cua bai viet
	public function authorDetail($id){
		$data['author'] = Author::find($id);
		return view('client.authordetail',$data);
	}

	public function postComment(Request $request,$id){
		$this->validate($request,
			[
				'name'			=> 'required|min:3|max:100',
				'email'			=> 'required',//|unique:comments,com_email
				'message'		=> 'required',
			],
			[
				'name.required' => 'Bạn chưa nhập tên name!',
				'name.min'		=> 'Tên Thể Loại gồm ít nhất 3 ký tự!',
				'name.max'		=> 'Tên Thể Loại gồm tối đa 50 ký tự!',
				'email.required'	=>'Bạn chưa nhập name!',
				'message.required'	=>'Bạn chưa nhập tên message!',

			]);
		Comment::create([
			'new_id'	  => $id,
			'com_name'	  => $request['name'],
			'com_email'   => $request['email'],
			'com_content' => $request['message'],
		]);
		return back()->with('thangcong','comment thanh cong');
	}

	public function searchNews(Request $request){
		$result = $request->search;
		$data['keyword'] = $request->search;
		//$result=str_replace('', '%',$result);
		$data['items'] = News::where('news_title','like','%'.$result.'%')->orWhere('news_content','like','%'.$result.'%')->orWhere('news_summary','like','%'.$result.'%')->take(30)->paginate(5);
		return view('client.search',$data);
	}

	public function searchTags($id){
		$data['tags'] = News::where('tag_id',$id)->get();
		return view('client.searchwithtags',$data);
	}	

	public function tags($id){//Request $request
		$data['tags'] = News::where('tag_id',$id)->get();
		return view('client.searchwithtags',$data);
	}

	public function searchCategories($id){
		$data['categories'] = News::where('category_id',$id)->paginate();
		return view('client.searchwithcategories',$data);
	}

}
