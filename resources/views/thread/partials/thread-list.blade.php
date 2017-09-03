<div class="list-group">
    @forelse($threads as $thread)

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><a href="{{route('thread.show',$thread->id)}}"> {{$thread->subject}}</a></h3>
            </div>
            <div class="panel-body" >
                <p>{{str_limit($thread->thread,100) }}....<a href="{{route('thread.show',$thread->id)}}">Read More</a>
                    <br>
                    <div id="post-details-update" style="border-top:1px solid grey; padding-top:5px;">
                        Posted by : <a href="{{route('user_profile',$thread->user->name)}}">{{$thread->user->name}}</a> {{$thread->created_at->diffForHumans()}}
                    </div>
                </p>
            </div>
        </div>

    @empty
        <h5>No threads</h5>

    @endforelse
</div>