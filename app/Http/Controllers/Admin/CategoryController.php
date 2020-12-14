<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $categorys = Category::paginate(15);
      return view('admin.categorys.list',compact("categorys"));
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorys.add');
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
                'name' => 'required|unique:Categories,cate_name|min:3|max:50'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên Thể Loại!',
                'name.unique'   => 'Tên Thể Loại đã tồn tại, vui lòng nhập lại!',
                'name.min'      => 'Tên Thể Loại gồm ít nhất 3 ký tự!',
                'name.max'      => 'Tên Thể Loại gồm tối đa 50 ký tự!'             
            ]
        );

        $category = new Category;
        $category->cate_name = $request->name;
        $category->cate_slug = Str::slug($request->name);
        $category->save();
        return redirect()->back()->with('message','Thêm thành công!');
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
        $category = Category::findOrFail($id);
        return view('admin.categorys.edit',compact("category"));
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
        $cate=Category::find($id);   
        $this->validate($request,
            [
                'name' => 'required|string|min:3|max:50|unique:Categories,cate_name,'.$cate->id,
            ],
            [
                'name.required' => 'Bạn chưa nhập tên Thể Loại!',
                'name.unique' => 'Tên Thể Loại đã tồn tại, vui lòng nhập lại!!',
                'name.min' => 'Tên Thể Loại gồm ít nhất 3 ký tự!',
                'name.max' => 'Tên Thể Loại gồm tối đa 50 ký tự!'
            ]);  
        $arr['cate_name'] = $request->name;
        $arr['cate_slug'] = Str::slug($request->name);
        $cate::whereId($id)->update($arr);
        return redirect()->back()->with('message','Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = Category::findOrFail($id);
        $cate->delete();
        return redirect()->route('categorys.index');
    }


}
