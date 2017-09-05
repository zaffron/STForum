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
            <span class="badge">
                @php
                $count = 0;
                foreach($threads as $thread){
                    if($thread->tag_id == $tag->id){
                        $count++;
                    }
                }
                echo $count;
                @endphp
            </span>
            {{$tag->name}}
        </a>
        @endforeach
    </ul>
</div>