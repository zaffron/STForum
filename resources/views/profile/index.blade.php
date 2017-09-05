@extends('layouts.front')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
@endsection

@section('category')
    <div class="col-md-2 text-center" >
    <div class="dp">
    <img src="http://www.sbsc.in/images/dummy-profile-pic.png" height="150" width="150" alt="profile-pic"><br><br>
    <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-cloud"></span> Upload Image</button>
    </div>
        <h3>
            {{ $user->name }}
        </h3>
        <h5>
            {{ $user->description }}
        </h5>
        <button class="btn btn-primary btn-xs" id="descUpdate">Update Description</button>
    </div>

@endsection

@section('content')
<div>
    
    <h3>{{$user->name}}'s latest Threads</h3>
    <hr>

    @forelse($threads as $thread)
        <a href="{{route('thread.show',$thread->id)}}"><h5>{{$thread->subject}}</h5></a>

    @empty
        <h5>No threads yet</h5>

    @endforelse
    <br>
    <hr>

    <h3>{{$user->name}}'s latest Comments</h3>
    <hr>

    @forelse($comments as $comment)
        <h5>{{$user->name}} commented on <a href="{{route('thread.show',$comment->commentable->id)}}">{{$comment->commentable->subject}}</a>  {{$comment->created_at->diffForHumans()}}</h5>
    @empty
    <h5>No comments yet</h5>
    @endforelse
</div>

<div class="description-updater">
    <div class="description-container">
        <form method="POST" action="{{ route('users.descUpdate', $user->id) }}">
            {{ csrf_field() }}
            <h2>Update Desctiption</h2>
            <br>
            <div class="form-group">
                <textarea class="form-input" style="resize:none;" name="description"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" value="submit" class="btn btn-success">Update Desctiption</button>
            </div>
        </form>
    </div>{{-- container --}}
</div>{{-- description-updater --}}

@endsection

{{-- Scripts for description update and profile update --}}
@push('scripts')

    <script type="text/javascript">
        
        $(document).ready(function(){
            $('#descUpdate').click(function(){
                $('.description-updater').css('display','block');
            });
            $('.description-updater').click(function(e){
                if(e.target.className == 'description-updater'){
                    $('.description-updater').css('display','none');
                }
            });

        });

    </script>

@endpush