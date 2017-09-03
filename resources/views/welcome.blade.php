@extends('layouts.front')

@section('banner')
    <div class="jumbotron">
        <div class="container">
            <h1>Join Study Tweaks Community</h1>
            <h2>Let's share the knowledge the right way</h2>
            <p>Help and get help</p>
            <p>
                <a class="btn btn-primary btn-lg" href="{{ route('learn') }}">Learn more</a>
            </p>
        </div>
    </div>
@endsection
@section('heading',"Threads")
@section('content')
    @include('thread.partials.thread-list')
@endsection
