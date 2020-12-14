<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tags;
use Illuminate\Support\Facades\Auth;

class TagsController extends Controller
{
//  public function __construct()
//  {
//     $this->middleware('auth');
// }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tags::all();
        return view('admin.tags.list',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.add');
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
            'name' => 'required|unique:tags,tag_title|min:3|max:100'
        ],
        [
            'name.required' => 'Bạn chưa nhập tên Tags!',
            'name.unique'   => 'Tên Thể Loại đã tồn tại, vui lòng nhập lại!',
            'name.min'      => 'Tên Thể Loại gồm ít nhất 3 ký tự!',
            'name.max'      => 'Tên Thể Loại gồm tối đa 50 ký tự!'
        ]);
        Tags::create([
            'tag_title' => $request['name'],
        ]);  
     return redirect()->route('tags.index');
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
        $tags['data'] = Tags::find($id);
        return view('admin.tags.edit',$tags);
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
        $tags = Tags::find($id);
        $this->validate($request,
            [
                'name' => 'required|min:3|max:100|unique:tags,tag_title,'.$tags->id,
            ],
            [
                'name.required' => 'Bạn chưa nhập tên Tags!',
                'name.unique'   => 'Tên Thể Loại đã tồn tại, vui lòng nhập lại!',
                'name.min'      => 'Tên Thể Loại gồm ít nhất 3 ký tự!',
                'name.max'      => 'Tên Thể Loại gồm tối đa 50 ký tự!'
            ]);
        Tags::where('id',$id)->update([
            'tag_title'=> $request['name'],
        ]);  
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tags::where('id',$id)->delete();
        return redirect()->route('tags.index');
    }
    
}
