<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddNewRequest;
use App\Http\Requests\EditNewRequest;
use App\Models\News;
use App\Models\Category;
use App\Models\Author;
use App\Models\Tags;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news=News::paginate(10);
        return view('admin.news.list',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    
    {
        $data['author']   =         Author::all();
        $data['category'] =         Category::all();
        $data['tags']     =         Tags::all();
        return view('admin.news.add',$data);//compact('data')=>false
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewRequest $request)
    {
        $news=new News;
        $news->news_title    = $request['title'];
        $news->author_id     = $request['author'];
        $news->news_summary  = $request['summary'];
        $news->news_content  = $request['desciption'];
        $news->news_featured = $request['featured'];
        $news->tag_id        = $request['tags'];
        $news->category_id   = $request['category'];
        $news->news_slug     = Str::slug($request['title']);

        $request->validate([
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('images')){
            $imageName        = time().'.'.$request->images->extension();  
            $news->news_image = $request->images->move('upload/news', $imageName);
        }else{
            return redirect()->back()->with('error','hinh khong duoc rong');  
            $news->news_image= ''; 
        }
        $news->save();
        return redirect()->route('news.index');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['author']   = Author::all();
        $data['category'] = Category::all();
        $data['tags']     = Tags::all();
        $data['new']      = News::find($id);
        return view('admin.news.edit',$data);//compact('data')=>false
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditNewRequest $request, $id)
    {
        $news = News::find($id);
        $news->news_title    = $request['title'];
        $news->author_id     = $request['author'];
        $news->news_summary  = $request['summary'];
        $news->news_content  = $request['desciption'];
        $news->news_featured = $request['featured'];
        $news->tag_id        = $request['tags'];
        $news->category_id   = $request['category'];
        $news->news_slug     = Str::slug($request['title']);

        if($request->hasFile('image')){
            $imgFile          = $request->file('image');           
            unlink(''.$news->news_image);
            $imageName        = time().'.'.$request->image->extension();  
            $news->news_image = $request->image->move('upload/news', $imageName);
        } 
        $news->save();
        return redirect()->route('news.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $new=News::find($id);
       unlink(''.$new->news_image);
       $new->delete();
       return redirect()->back();  
    }

}
