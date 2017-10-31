@extends('admin_main')
@section('content')
<div class="panel-heading">
	<h3 class="panel-title">Category's Form</h3>
</div>
<div class="panel-body">
						<form class="form-horizontal" method="POST" action="{{ route('category.store') }}/{{ $category->id }}">
                        {{ csrf_field() }} {{ method_field('PUT') }}                              
								<div class="form-group" id="name_form">
                                    <label for="userName">Name</label>
                                    <input type="text" name="name" parsley-trigger="change" required
                                           placeholder="Enter category's name" class="form-control" id="name" value="{{ $category->name }}">
								@if ($errors->has('name'))
                                    <script>
										document.getElementById("name_form").className = "form-group has-error has-feedback";
									</script>
                                    <p class="label label-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </p>
                                @endif
                                </div>
								<div class="form-group" id="description_form">
                                    <label for="userName">Description</label>
                                    <input type="text" name="description" parsley-trigger="change"
                                           placeholder="Enter category's description" class="form-control" id="description" value="{{ $category->description }}">
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