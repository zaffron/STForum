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

    	$this->validate($request, [
    		'description' => 'required|min:5'
    	]);

    	$user = User::where("id", $user)->update([
    		"description" => $request->description
    	]);
    	return back()->withMessage('Description Updated');

    }
    

}
