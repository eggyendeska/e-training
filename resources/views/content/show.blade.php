@extends('admin_main')
@section('content')
<div class="panel-body">
  <div class="bg-picture card-box">
    <div class="profile-info-name">
      <div class="profile-info-detail">
        <h3 class="m-t-0 m-b-0">{{ $content->title }}</h3>
		<hr>
        <p class="text-muted m-b-20">
          @php $tags=explode(',', $content->tags); @endphp
          @foreach($tags as $tag)
            <a href=""><span class="label label-purple">{{ $tag }}</span></a>
          @endforeach
        </p>
        <p>
			<div class="videoWrapper col-md-8">
				<!-- Copy & Pasted from YouTube -->
          <iframe width="420" height="315"
                  src="{{$video}}">
          </iframe>
        </div>
			
			<div class="col-md-3" style="margin-left:20px;">
				<h3 class="m-t-0 m-b-0">Related Videos</h3>
				<hr>
                @foreach($related as $rel)
                  <a href="{{ url('master/content/'. Crypt::encrypt($rel->id)) }}">{{ $rel->title }}</a>
                  <hr>
				@endforeach
			</div>
        </p>
		<div class="clearfix"></div>
        <hr>
		<p class="text-muted m-b-20">
          <p>
          {{ $content->description }}
		  </p>
        </p>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  @if(Auth::id() == $content->users_id)
  <!-- Self note -->
    <form method="post" class="card-box" action="{{ route('note.store') }}" id="notes">
        {{ csrf_field() }}
        <input type="hidden" name="content_id" value="{{ $content->id }}">
        <span class="input-icon icon-right">
            <h3 class="m-t-0 m-b-0">Self Note (Private)</h3>
            <hr>
            <textarea id="elm1" name="note">{{ $content->note }}</textarea>
        </span>
        <div class="p-t-10 pull-right">
            <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light">Send
            </button>
        </div>
        <div class="clearfix"></div>
    </form>
  <!-- end Self note -->
  @endif
  <form method="post" class="card-box" action="{{ route('comment.store') }}" id="comments">
    {{ csrf_field() }}
    <input type="hidden" name="content_id" value="{{ $content->id }}">
    <span class="input-icon icon-right">
      <h3 class="m-t-0 m-b-0">Comments</h3>
        <hr>
        <textarea name="body" rows="2" class="form-control" placeholder="Post a new comment"></textarea>
    </span>
    <div class="p-t-10 pull-right">
      <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light">Send
      </button>
    </div>
    <ul class="nav nav-pills profile-pills m-t-10">
      <li>
        <a href="#">
          <i class="fa fa-user">
          </i>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-location-arrow">
          </i>
        </a>
      </li>
      <li>
        <a href="#">
          <i class=" fa fa-camera">
          </i>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-smile-o">
          </i>
        </a>
      </li>
    </ul>
  </form>
  <div class="card-box">
    @foreach($comments as $comment)
    <div class="comment" id="{{ $comment->id }}">
      <img src="assets/images/users/avatar-1.jpg" alt="" class="comment-avatar">
      <div class="comment-body">
        <div class="comment-text">
          <div class="comment-header">
            <a href="#" title="">{{ $comment->user->name }}
            </a>
            <span>at {{ date_format(date_create($comment->created_at), 'l jS \of F Y h:i:s A') }}
            </span>
            @if($comment->users_id == Auth::id())
            <div class="pull-right">
              <a onclick="warning_hapus('Do you want to delete this comment?','{{ Crypt::encrypt($comment->id) }}','{{ $comment->id }}')"><i class="fa fa-trash"></i></a>
            </div>
            @endif
          </div>
          {{ $comment->body }}
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
</div>
<script>
    function warning_hapus(a,b,c) {
        swal({
            title: "Are you sure?",
            text: a,
            type: "error",
            showCancelButton: true,
            confirmButtonClass: "btn-danger waves-effect waves-light",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "Cancel",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: 'GET',
                    url: "{{url('comment')}}/"+b+"/destroy",
                    success: function(data) {
                        if(data=='1'){
                            swal("Deleted!", "Comment has been deleted!", "success");
                            $("#"+c).delay("fast").fadeOut();
                        }else{
                            swal("Failed!", "An error happened, action failure!", "error");
                        }
                    }
                })
            }
        });

    }
</script>
@endsection