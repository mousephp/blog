<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddAuthorRequest;
use App\Http\Requests\EditAuthorRequest;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $author=Author::all();
        return view('admin.author.list',compact('author'));;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddAuthorRequest $request)
    {
        $author=new Author;
        $author->author_name     = $request['name'];
        $author->author_birthday = $request['birthday'];
        $author->author_address  = $request['address'];
        $author->author_profile  = $request['profile'];

        $request->validate([
            'images' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('images')){
            $imageName = time().'.'.$request->images->extension();  
            $author->author_image=$request->images->move('upload/author', $imageName);
        }else{
            return redirect()->back()->with('error','Hình không được trống');  
                $author->author_image= ''; // Nếu người dùng không upload hình thì sẽ gán đường dẫn là rỗng
            }
            $author->save();
            return redirect()->route('authors.index');              
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
        $author = Author::find($id);
        return view('admin.author.edit',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditAuthorRequest $request, $id)
    {
       $author = Author::findOrFail($id);
       $author->author_name     = $request['name'];
       $author->author_birthday = $request['birthday'];
       $author->author_address  = $request['address'];
       $author->author_profile  = $request['profile'];

        $request->validate([
            'image' => 'nullable|image'
        ]);

        if($request->hasFile('image')){
            $imgFile = $request->file('image'); // Nhận file hình ảnh người dùng upload lên server
            unlink(''.$author->author_image); // Xóa hình cũ
            $imageName = time().'.'.$request->image->extension();  
            $author->author_image = $request->image->move('upload/author', $imageName);
        }
        $author->save();
        return redirect()->route('authors.index');  
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        unlink(''.$author->author_image);
        $author->delete();
        return redirect()->route('authors.index');  
    }
          
}
