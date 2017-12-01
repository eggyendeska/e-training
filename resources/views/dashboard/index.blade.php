@extends('admin_main')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="inbox-app-main">
                <div class="row">
                    <div class="col-md-3">
                        <aside id="sidebar" class="nano">
                            <div class="nano-content">
                                <div class="menu-segment">
                                    <ul class="labels list-unstyled">
                                        <li class="title">Categories <span class="icon">+</span></li>
                                        <li class="@if($cate =="")active @endif">
                                            <a href="{{url('/home')}}">All Categories </a>

                                    @foreach($categories as $cat)
                                        <li class="@if($cat->id == $cate)active @endif"><a href="{{url('/home/?cat='.$cat->id)}}">{{$cat->name}} </a>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="bottom-padding"></div>
                            </div>
                        </aside>
                    </div> <!-- end col -->

                    <div class="col-md-9">
                        <main id="main" style="overflow-y: auto">
                            <div class="overlay"></div>
                            <div class="panel-inverse panel-border">
                                <div class="panel-heading">All Contents</div>
                                <div class="panel-body">
                                @if($contentAll->count() > 0)
                                    @foreach($contentAll as $rel)
                                        @php
                                            $embed_code = $rel->getSource->embed_code;
                                            $id_content = $rel->id_content;
                                            $video = str_replace("[id]", $id_content, $embed_code);
                                        @endphp
                                            <div class="col-md-4">
                                                <iframe
                                                        src="{{$video}}" disabled="">
                                                </iframe>
                                                <h5><a href="{{ url('master/content/'. Crypt::encrypt($rel->id)) }}">
                                                        {{ $rel->title }}
                                                    </a></h5>
                                            </div>
                                    @endforeach
                                @elseif($contentAll->count() == 0)
                                    No Content
                                @endif
                                </div>
                            </div>
                            <div class="clearfix"><hr/></div>
                            <div class="panel-inverse panel-border">
                                <div class="panel-heading">My Contents</div>
                                <div class="panel-body">
                                    @if($contentMe->count() > 0)
                                        @foreach($contentMe as $rel)
                                            @foreach($contentAll as $rel)
                                                @php
                                                    $embed_code = $rel->getSource->embed_code;
                                                    $id_content = $rel->id_content;
                                                    $video = str_replace("[id]", $id_content, $embed_code);
                                                @endphp
                                                <div class="col-md-4">
                                                    <iframe
                                                            src="{{$video}}" disabled="">
                                                    </iframe>
                                                    <h5><a href="{{ url('master/content/'. Crypt::encrypt($rel->id)) }}">
                                                            {{ $rel->title }}
                                                        </a></h5>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    @elseif($contentMe->count() == 0)
                                        No Content
                                    @endif
                                </div>
                            </div>

                        </main>


                    </div> <!-- end col -->
                </div><!-- end row -->
            </div>

        </div>

    </div>
    <!-- End row -->
@endsection