@extends('admin_main')
@section('content')
<div class="panel-body">
  <div class="bg-picture card-box">
    <div class="profile-info-name">
      <div class="profile-info-detail">
        <h3 class="m-t-0 m-b-0">{{ $content->title }}</h3>
		<hr>
        <p class="text-muted m-b-20">
          <i>{{ $content->description }}
          </i>
        </p>
        <p>
			<div class="videoWrapper col-md-8">
				<!-- Copy & Pasted from YouTube -->
				<iframe src="{{ $video }}" frameborder="0" allowfullscreen></iframe>
			</div>
			
			<div class="col-md-3" style="margin-left:20px;">
				<h3 class="m-t-0 m-b-0">Related Videos</h3>
				<!-- Copy & Pasted from YouTube -->
				<hr>
				<iframe src="{{ $related['link'] }}" frameborder="0" allowfullscreen></iframe>
				
			</div>
        </p>
		<div class="clearfix"></div>
		<p class="text-muted m-b-20">
          <p>
			<?php $tags=explode(',', $content->tags); ?>
			@foreach($tags as $tag) 
				<a href="#"><span class="label label-purple">{{ $tag }}</span></a>
			@endforeach
		  </p>
        </p>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <form method="post" class="card-box">
    <span class="input-icon icon-right">
      <textarea rows="2" class="form-control" placeholder="Post a new comment">
      </textarea>
    </span>
    <div class="p-t-10 pull-right">
      <a class="btn btn-sm btn-primary waves-effect waves-light">Send
      </a>
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
    <div class="comment">
      <img src="assets/images/users/avatar-1.jpg" alt="" class="comment-avatar">
      <div class="comment-body">
        <div class="comment-text">
          <div class="comment-header">
            <a href="#" title="">Kim Ryder
            </a>
            <span>about 4 hours ago
            </span>
          </div>
          i'm in the middle of a timelapse animation myself! (Very different
          though.) Awesome stuff.
        </div>
        <div class="comment-footer">
          <a href="#">
            <i class="fa fa-thumbs-o-up">
            </i>
          </a>
          <a href="#">
            <i class="fa fa-thumbs-o-down">
            </i>
          </a>
          <a href="#">Reply
          </a>
        </div>
      </div>
    </div>
    <div class="comment">
      <img src="assets/images/users/avatar-7.jpg" alt="" class="comment-avatar">
      <div class="comment-body">
        <div class="comment-text">
          <div class="comment-header">
            <a href="#" title="">Nicolai Larson
            </a>
            <span>10 hours ago
            </span>
          </div>
          the parallax is a little odd but O.o that house build is awesome!!
        </div>
        <div class="comment-footer">
          <a href="#">
            <i class="fa fa-thumbs-o-up">
            </i>
          </a>
          <a href="#">
            <i class="fa fa-thumbs-o-down">
            </i>
          </a>
          <a href="#">Reply
          </a>
        </div>
      </div>
    </div>
    <div class="m-t-30 text-center">
      <a href="" class="btn btn-default waves-effect waves-light btn-sm">Load More...
      </a>
    </div>
  </div>
</div>
</div>

@endsection