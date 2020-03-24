<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;


class UserController extends Controller
{
    public function index()
    {
        $user = DB::table('users')->get();
        return view('user.index', ['user' => $user]);
    }
    public function create(){}

    public function store(Request $request){
    
    } 
    
    public function show($id){}

    public function edit($id){
        $user = new \App\User;
        $user = new User;
        $user = User::find($id);
        $user->status = 'A';
        $user->save();
        return view('user.edit')->with('user',$user);
       

    }

    public function update(Request $request, $id){

        // App\User::where('user')->update(['status' => 'A']);
        $rules = [
            'status' => 'required',    
        ];
        $user = User::find($id);
        $user->status = 'A';
        $user->update($request->all());
        $user->save();
        return redirect()->route('users.index')->with('status', 'อนุมัติบัญชีผู้ใช้สำเร็จ');

    }

    public function destroy($id)
        {
            User::destroy($id);
            return back();
        }
}
