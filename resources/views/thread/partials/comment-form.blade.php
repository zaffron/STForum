<div class="comment-form">

    <form action="{{route('threadcomment.store',$thread->id)}}" method="post" role="form">
        {{csrf_field()}}
        <legend>Comment</legend>

        <div class="form-group">
            <input type="text" class="form-control" name="body" id="" placeholder="Comment here...">
        </div>


        <button type="submit" class="btn btn-primary">Comment &nbsp;<span class="glyphicon glyphicon-comment"></span></button>
    </form>

</div>