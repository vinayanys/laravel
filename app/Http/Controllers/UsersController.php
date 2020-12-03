<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
Use App\User;
Use PDF;
Use App\Model;
Use Storage;
class UsersController extends Controller
{   
    public function User()
    {   
        $users = User::All();
        return view ('admin.users.manageuser', ['users'=>$users]);
    }

    public function add()
    {
        return view('admin.users.adduser');
    }
    public function create(Request $request)
    {
        if($request->file('image')){
            $image = $request->file('image')->store('img','public');
        }

        User::create([
            'name' => $request->name,
            'image' => $image,
            'email' => $request->email,
            'password' => $request->password,
            'roles' => $request->roles,
        ]);
        return redirect('/manage');
    }

    public function edit($id){       
        $users = User::find($id);   
        return view('admin.users.edituser',['users'=>$users]);   
        }
    public function update($id, Request $request)     {       
        $users = User::find($id);   
        // $users = User::All();   
        $users->name = $request->name;       
        $users->email = $request->email;
        $users->password = $request->password;   
        $users->roles = $request->roles;
        if($users->image && file_exists(storage_path('app/public/' . $users->image)))
            {
                Storage::delete('public/'. $users->image);
            }
            $image = $request->file('image')->store('img', 'public');
            $users->image = $image;      
            $users->save();      
        return redirect('/manage');    
       } 
    public function delete($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('/manage');
    }
    public function cetak_pdf(){
        $users = User::all();
        $pdf = PDF::loadview('admin.users.userspdf',['users'=>$users]);
        return $pdf->stream();
       }
}