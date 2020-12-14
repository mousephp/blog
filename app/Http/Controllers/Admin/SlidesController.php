<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slides;
use App\Models\Category;
use App\Models\Author;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $slides = Slides::all();
      return view('admin.slides.list',compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data['author']   = Author::all();
      $data['category'] = Category::all();
      return view('admin.slides.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,
      [
        'name'        => 'required|unique:slides,slide_title|min:6|max:200',
        'description' => 'required|min:10',
        'images'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ],
      [
        'name.required'        => 'Bạn chưa nhập Tên Slide',
        'name.min'             => 'Tên Slide gồm ít nhất 6 ký tự',
        'name.max'             => 'Tên Slide không được vượt quá 200 ký tự',
        'name.unique'          => 'Tên Slide không được trùng',
        'description.required' => 'Bạn chưa nhập Nội Dung cho Slide',
        'description.min'      => 'Nội Dung Slide gồm tối thiểu 10 ký tự',
      ]);


      $slide = new Slides;
      $slide->slide_title   = $request['name'];
      $slide->slide_content = $request['description'];
      $slide->author_id     = $request['author'];
      $slide->cate_id       = $request['category'];
      if($request->hasFile('images')){
        $imageName = time().'.'.$request->images->extension();  
        $slide->slide_image = $request->images->move('upload/slides', $imageName);
      }else{
        return redirect()->back()->with('error','hinh khong duoc rong');  
          $slide->slide_image= ''; // Nếu người dùng không upload hình thì sẽ gán đường dẫn là rỗng
        }
        $slide->save();
        return redirect()->route('slides.index');  
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
      $data['slide']    = Slides::find($id);
      return view('admin.slides.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $slide=Slides::find($id);
      $this->validate($request,
      [
        'name'        => 'required|min:6|max:200|unique:slides,slide_title,'.$slide->id,
        'description' => 'required|min:10',
        'image'       => 'nullable|image'
      ],
      [
        'name.required'        => 'Bạn chưa nhập Tên Slide',
        'name.min'             => 'Tên Slide gồm ít nhất 6 ký tự',
        'name.max'             => 'Tên Slide không được vượt quá 200 ký tự',
        'name.unique'          => 'Tên Slide không được trùng',
        'description.required' => 'Bạn chưa nhập Nội Dung cho Slide',
        'description.min'      => 'Nội Dung Slide gồm tối thiểu 10 ký tự',
      ]);
      
      $slide->slide_title   = $request['name'];
      $slide->slide_content = $request['description'];
      $slide->author_id     = $request['author'];
      $slide->cate_id       = $request['category'];

      if($request->hasFile('image')){
        $imgFile = $request->file('image'); // Nhận file hình ảnh người dùng upload lên server   
        unlink(''.$slide->slide_image); // Xóa hình cũ
        $imageName = time().'.'.$request->image->extension();  
        $slide->slide_image=$request->image->move('upload/slides', $imageName);
      }
      $slide->save();
      return redirect()->route('slides.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $slide=Slides::find($id);
      unlink(''.$slide->slide_image);
      $slide->delete();
      return redirect()->back();  
    }
    
}
