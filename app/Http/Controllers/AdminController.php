<?php

namespace Forum\Http\Controllers;

use Illuminate\Http\Request;
use Forum\User;
use Forum\Thread;
use Carbon\Carbon;
use Forum\Tag;

class AdminController extends Controller
{
    public function index()
    {
    	$user_count = User::count();
    	$posts_count = Thread::count();
    	$post_Traffic = Thread::select('created_at')->get()->groupBy(function($date){
    		return Carbon::parse($date->created_at)->format('d');
    	});
    	return view('admin.partials.home', compact('user_count','posts_count','$post_Traffic
    		'));
    }
    public function usersManagement()
    {
    	$users = User::get()->all();
    	$threads = Thread::get()->all();
    	return view('admin.partials.usersManagement', compact('users','threads'));
    }
    public function tagsManagement()
    {
    	return view('admin.partials.tagsManagement');
    }
    public function tagsUpdater(Request $request)
    {
        $this->validate($request, ['tag_name' => 'required|string|max:20']);
        $tag = Tag::create([
            'name' => $request->tag_name,
        ]);
        return back()->withMessage("Tag Created Successfully");
    }
    public function userDelete(Request $request)
    {
        $id = $request['id'];
        $user = User::find($id);
        $user->delete();
        return back()->withMessage('User has been removed');
    }
}
