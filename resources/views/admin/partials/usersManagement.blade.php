@extends('admin.index')
@section('styles')
	<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection
@section('content')

<div class="row">
	<div class="well well-sm col-md-11 text-center"><h1>Users</h1></div>
	<div class="well well-lg col-md-11">
		<table class="table table-striped users-table">
			<tr class="header">
				<th><h3>Name</h3></th>
				<th><h3>ID</h3></th>
				<th><h3>Username</h3></th>
				<th><h3>No. of posts</h3></th>
			</tr>
			@foreach($users as $user)
			<tr>
					<td><a href="{{route('user_profile', $user->name)}}" class="table-link">{{$user->name}}</a></td>
					<td>{{$user->id}}</td>
					<td>{{$user->username}}</td>
					@php
						$count = 0;
						foreach($threads as $thread){
							if($thread->user_id == $user->id){
								$count++;
							}
						}
					@endphp
					<td>{{$count}}</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>

@endsection

@section('js')
@endsection