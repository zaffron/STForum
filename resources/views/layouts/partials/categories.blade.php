<div class="col-md-3">
    <a class="btn btn-info"  href="{{route('thread.create')}}">Create Thread</a> <br><br>
    <h4>Tags</h4>
    <ul class="list-group">
        <a href="{{route('thread.index')}}" class="list-group-item">
            <span class="badge">{{count($tags)}}</span>
            All Threads
        </a>
        @foreach($tags as $tag)
        <a href="{{route('thread.index',['tags'=>$tag->id])}}" class="list-group-item">
            <span class="badge">{{count($tag)}}</span>
            {{$tag->name}}
        </a>
        @endforeach
    </ul>
</div>