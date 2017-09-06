@extends('admin.index')
@section('styles')
	<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection
@section('content')
	
	<div class="row">
		<div class="well well-sm col-md-11 text-center">
			<h1>Tags Manager</h1>
		</div>
	<div class="col-md-11">
		
    @include('layouts.partials.error')

    @include('layouts.partials.success')

	</div>
		<div class="well well-lg col-md-11">
			<table class="table text-center">
				<tr>
					<th><h3 class="text-center">Tag ID</h3></th>
					<th><h3 class="text-center">Tag Name</h3></th>
					<th><h3 class="text-center">Created At</h3></th>
					<th><h3 class="text-center">Last Modified</h3></th>
				</tr>
				@foreach($tags as $tag)
					<tr>
						<td>{{$tag->id}}</td>
						<td>{{$tag->name}}</td>
						<td>{{$tag->created_at->diffForHumans()}}</td>
						<td>{{$tag->updated_at->diffForHumans()}}</td>
					</tr>
				@endforeach
			</table>
			<button class="btn btn-md btn-success" id="tagUpdate">Add New</button>
		</div>
	</div>
	<div class="tag-updater-container">
		<div class="tag-updater text-center">
			<form action="{{route('tagUpdater')}}" class="form" method="POST">
				{{csrf_field()}}
				<h2 class="text-center">New Tag Name</h2>
				<input type="text" name="tag_name" class="form-control" placeholder="Tag Name" autofocus>
				<button class="btn btn-md btn-success">Insert New Tag</button>
				<button class="btn btn-md btn-danger" id="cancel">Cancel</button>
			</form>
		</div>
	</div>

@endsection
@section('js')
    <script type="text/javascript">
        
        $(document).ready(function(){
            $('#tagUpdate').click(function(){
                $('.tag-updater-container').css('display','block');
            });
            $('#cancel').click(function(e){
            	e.preventDefault();
                $('.tag-updater-container').css('display','none');
            });

        });

    </script>
@endsection