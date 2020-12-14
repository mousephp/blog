<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\PasswordRequest;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::all();
        return view('admin.users.list',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.users.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequest $request)
    {
        User::create([
            'name'       => $request['user_name'],
            'email'      => $request['user_email'],
            'password'   => bcrypt($request['user_password']),  
            'permission' => $request['permission'],     
        ]); 
        return redirect()->route('users.index');  

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
        $user = User::find($id);
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        $user  = User::findOrFail($id);
        $input = [
            'name'       => $request['user_name'],
            'email'      => $request['user_email'],
            'permission' => $request['permission']          
        ];
        
        User::where('id', $id)->update($input);       
        $data = $request->all(); 
        if(!\Hash::check($data['user_password'], $user->password)){
            return redirect()->back()->with('error','Bạn đã nhập sai mật khẩu cũ');
        }else{
            $user->password = bcrypt($request->user_password_again);
            $user->save();
            return redirect()->back()->with('message','Cập nhâp mật khẩu thành công'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dele = User::find($id);
        $dele->delete();
        return back();
    }

    public function getUpdatePassword()
    { 
        return view('admin.users.password');
    }

    public function postUpdatePassword(PasswordRequest $request)
    {
        $data = $request->all(); 
        $user = User::find(auth()->user()->id);
        if(!\Hash::check($data['user_password'], $user->password)){
            return redirect()->back()->with('error','Bạn đã nhập sai mật khẩu cũ');
        }else{
            $user->password = bcrypt($request->password_confirmation);
            $user->save();
            return redirect()->back()->with('message','Cập nhâp mật khẩu thành công'); 
        }
    }
    
}
