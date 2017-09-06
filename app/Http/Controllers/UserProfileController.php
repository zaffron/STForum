<?php

namespace Forum\Http\Controllers;

use Forum\Comment;
use Forum\Thread;
use Forum\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index(User $user)
    {
       $threads=Thread::where('user_id',$user->id)->latest()->get();

       $comments=Comment::where('user_id',$user->id)->where('commentable_type','Forum\Thread')->get();

       return view('profile.index',compact('threads','comments','user'));
       
    }
    public function descUpdate(Request $request, $user)
    {
    	$this->validate($request, ['description' => 'required|string|min:5']);
    	$user = User::where("id", $user)->update(["description" => $request->description]);
    	return back()->withMessage('Description Updated');

    }
    public function nameUpdate(Request $request, $user)
    {
        $this->validate($request,['name' => 'required|string|max:256']);
        $user = User::where("id", $user)->first()->update(["name" => $request->name]);
        return back()->withMessage('Name Updated');
    }

    public function emailUpdate(Request $request, $user)
    {
        $this->validate($request,['email' => 'required|email|max:256|unique:users']);
        $user = User::where("id", $user)->first()->update(["email" => $request->email]);
        return back()->withMessage('Email Updated');
    }

    public function passwordUpdate(Request $request, $user)
    {
        $this->validate($request,['password' => 'required|string|min:6|confirmed']);
        $password = bcrypt($request->password);
        $user = User::where("id", $user)->first()->update(["password" => $password]);
        return back()->withMessage('Password Updated');
    }

    public function genderUpdate(Request $request, $user)
    {
        $this->validate($request, ['gender' => 'required|string']);
        $user = User::where("id", $user)->first()->update(["gender" => $request->gender]);
        return back()->withMessage('Gender Updated');
    }
    public function imageUpdate(Request $request, $user)
    {
        $this->validate($request, [
            'user_image' => 'required|image|mimes:jpeg,jpg|max:2048',
        ]);
        $image = $request->file('user_image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('images');
        $image->move($destinationPath, $input['imagename']);
        $user = User::where("username", $user)->update(["user_image" => $input['imagename']]);
        return back()->withMessage('Image Successfully Uploaded');
    }

    public function edit(User $user)
    {
        $threads=Thread::where('user_id',$user->id)->latest()->get();
        return view('profile.edit', compact('threads','user'));
    }
    

}
