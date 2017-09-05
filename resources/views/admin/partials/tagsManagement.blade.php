@extends('admin.index')

@section('content')
	
	<div class="row">
		<div class="well well-sm col-md-11 text-center">
			<h1>Tags Manager</h1>
		</div>
		<div class="well well-lg col-md-11">
			<table class="table">
				<tr>
					<th>Tag ID</th>
					<th>Tag Name</th>
					<th>Created At</th>
					<th>Last Modified</th>
					<th>Operations</th>
				</tr>
				@foreach($tags as $tag)
					<tr>
						<td>{{$tag->id}}</td>
						<td>{{$tag->name}}</td>
						<td>{{$tag->created_at->diffForHumans()}}</td>
						<td>{{$tag->updated_at->diffForHumans()}}</td>
						<td><button class="btn btn-xs btn-info "><span class="glyphicon glyphicon-edit">Edit</span></button> <button class="btn btn-xs btn-danger "><span class="glyphicon glyphicon-remove"></span> Delete</button></td>
					</tr>
				@endforeach
			</table>
			<button class="btn btn-md btn-success">Add New</button>
		</div>
	</div>

@endsection
@section('js')
<script>
	
</script>
@endsection