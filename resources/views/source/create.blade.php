@extends('admin_main')
@section('content')
<div class="panel-heading">
	<h3 class="panel-title">Source's Form</h3>
</div>
<div class="panel-body">
						<form class="form-horizontal" method="POST" action="{{ route('source.store') }}">
                        {{ csrf_field() }}
                                
								<div class="form-group" id="name_form">
                                    <label for="userName">Name</label>
                                    <input type="text" name="name" parsley-trigger="change" required
                                           placeholder="Enter source's name" class="form-control" id="name" value="{{ old('name') }}">
								@if ($errors->has('name'))
                                    <script>
										document.getElementById("name_form").className = "form-group has-error has-feedback";
									</script>
                                    <p class="label label-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </p>
                                @endif
                                </div>
								<div class="form-group" id="url_form">
                                    <label for="userName">URL</label>
                                    <input type="text" name="url" parsley-trigger="change"
                                           placeholder="Enter source's URL" class="form-control" id="url" value="{{ old('url') }}">
                                
								@if ($errors->has('url'))
                                    <script>
										document.getElementById("url_form").className = "form-group has-error has-feedback";
									</script>
                                    <p class="label label-danger">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </p>
                                @endif
								</div>
								<div class="form-group" id="embed_form">
                                    <label for="userName">Embed Code</label>
                                    <input type="text" name="embed_code" parsley-trigger="change"
                                           placeholder="Enter source's embed code" class="form-control" id="embed_code" value="{{ old('embed_code') }}">
                                
								@if ($errors->has('embed_code'))
                                    <script>
										document.getElementById("embed_form").className = "form-group has-error has-feedback";
									</script>
                                    <p class="label label-danger">
                                        <strong>{{ $errors->first('embed_code') }}</strong>
                                    </p>
                                @endif
								</div>
								<div class="form-group" id="example_form">
                                    <label for="userName">Example</label>
                                    <textarea class="form-control" rows="5" name="example" id="description" required>{{ old('example') }}</textarea>
                                
								@if ($errors->has('example'))
                                    <script>
										document.getElementById("example_form").className = "form-group has-error has-feedback";
									</script>
                                    <p class="label label-danger">
                                        <strong>{{ $errors->first('example') }}</strong>
                                    </p>
                                @endif
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
@endsection