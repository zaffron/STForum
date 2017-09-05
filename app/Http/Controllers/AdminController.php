<?php

namespace Forum\Http\Controllers;

use Illuminate\Http\Request;
use Forum\User;
use Forum\Thread;
use Carbon\Carbon;

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
}
