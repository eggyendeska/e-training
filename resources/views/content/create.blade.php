@extends('admin_main')
@section('content')
<div class="panel-heading">
	<h3 class="panel-title">Content's Form</h3>
</div>
<div class="panel-body">
						<form class="form-horizontal" method="POST" action="{{ route('content.store') }}">
                        {{ csrf_field() }}
                                
								<div class="form-group" id="title_form">
                                    <label for="userTitle">Title</label>
                                    <input type="text" name="title" parsley-trigger="change" required
                                           placeholder="Enter content's title" class="form-control" id="title" value="{{ old('title') }}">
								@if ($errors->has('title'))
                                    <script>
										document.getElementById("title_form").classTitle = "form-group has-error has-feedback";
									</script>
                                    <p class="label label-danger">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </p>
                                @endif
                                </div>
								<div class="form-group" id="source_form">
                                    <label for="role">Source</label>
                                    <select class="form-control select2" name="sources_id" id="sources_id" required>
										<option>Choose video's source</option>                             
										@foreach($sources as $source)
										<option value="{{ $source->id }}" @if(old('sources_id') == "$source->id }}") Selected @endif>{{ $source->name }}</option>
										@endforeach
									</select>
                                </div>
								<div class="form-group" id="id_content_form">
                                    <label for="userName">Content ID</label>
									<div class="input-group m-t-10">
										<input type="text" name="id_content" parsley-trigger="change"
											   placeholder="Enter content's id" class="form-control" id="id_content_code" value="{{ old('id_content') }}">
										<span class="input-group-btn">
											<button type="button" class="popper btn waves-effect waves-light btn-primary" data-container="body" title="" data-toggle="popover" data-placement="left" title="Helper"><i class="fa fa-lightbulb-o"></i> Show Help</button>
											<div class="popper-content hide">
												@foreach($sources as $source)
												<strong>{{ $source->name }}</strong>
												<p>{!! $source->example !!}
												<hr>
												@endforeach
											</div>
										</span>
										
										
									</div>
								@if ($errors->has('id_content'))
                                    <script>
										document.getElementById("id_content_form").className = "form-group has-error has-feedback";
									</script>
                                    <p class="label label-danger">
                                        <strong>{{ $errors->first('id_content') }}</strong>
                                    </p>
                                @endif
								</div>
								<div class="form-group" id="description_form">
                                    <label for="userName">Description</label>
                                         <textarea class="form-control" rows="5" name="description" id="description" >{{ old('description') }}</textarea>
                                </div>
								<div class="form-group" id="note_form">
                                    <label for="userName">Note (Private)</label>
                                         <textarea class="form-control" rows="5" name="note" id="note" >{{ old('note') }}</textarea>
                                </div>
								<div class="form-group" id="source_form">
                                    <label for="role">Category</label>
                                    <select class="form-control select2" name="categories_id" id="categories_id" required>
										<option>Choose video's category</option>
										@foreach($categories as $cat)
										<option value="{{ $cat->id }}" @if(old('categories_id') == "$cat->id }}") Selected @endif>{{ $cat->name }}</option>
										@endforeach     
									</select>
                                </div>
								<div class="form-group" id="tags_form">
                                    <input type="text" name="tags" parsley-trigger="change"
                                           placeholder="Enter content's Tags" class="form-control" id="tags" data-role="tagsinput" value="{{ old('tags') }}">
								</div>
								<div class="form-group" id="source_form">
                                    <label for="role">Status</label>
									<p />
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="status1" value="1" name="status" checked>
                                        <label for="inlineRadio1"> Public </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <input type="radio" id="status2" value="0" name="status">
                                        <label for="inlineRadio2"> Private </label>
                                    </div>
								</div>
                                <div class="form-group text-left m-b-0">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                                        Reset
                                    </button>
                                </div>
                            </form>

</div>
	<script src="{{ asset('adminto/js/jquery.min.js') }}"></script>
	<script src="{{ asset('adminto/js/bootstrap.min.js') }}"></script>
										<script type="text/javascript">
											$('.popper').popover({
												container: 'body',
												html: true,
												content: function () {
													return $(this).next('.popper-content').html();
												}
											});
										</script>
@endsection