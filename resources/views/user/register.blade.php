@extends('admin_main')
@section('content')
<div class="panel-heading">
	<h3 class="panel-title">User's Form</h3>
</div>
<div class="panel-body">
						<form class="form-horizontal" method="POST" action="{{ route('user.register') }}">
                        {{ csrf_field() }}
                                <div class="form-group" id="username_form">
                                    <label for="userName">Username</label>
                                    <input type="text" name="username" parsley-trigger="change" required autofocus
                                           placeholder="Enter Username" value="{{ old('username') }}" class="form-control" id="userName">
								@if ($errors->has('username'))
                                    <script>
										document.getElementById("username_form").className = "form-group has-error has-feedback";
									</script>
                                    <p class="label label-danger">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </p>
                                @endif
                                </div>
								<div class="form-group" id="name_form">
                                    <label for="userName">Name</label>
                                    <input type="text" name="name" parsley-trigger="change" required
                                           placeholder="Enter Name" class="form-control" id="name" value="{{ old('name') }}">
								@if ($errors->has('name'))
                                    <script>
										document.getElementById("name_form").className = "form-group has-error has-feedback";
									</script>
                                    <p class="label label-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </p>
                                @endif
                                </div>
                                <div class="form-group" id="email_form">
                                    <label for="emailAddress">Email address</label>
                                    <input type="email" name="email" parsley-trigger="change" required
                                           placeholder="Enter email" class="form-control" id="emailAddress" value="{{ old('email') }}">
								@if ($errors->has('email'))
                                    <script>
										document.getElementById("email_form").className = "form-group has-error has-feedback";
									</script>
                                    <p class="label label-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </p>
                                @endif
                                </div>
								<div class="form-group" id="role_form">
                                    <label for="role">Role</label>
                                    <select class="form-control select2" name="role" id="role" required>
										<option>Choose Role</option>
										<option value="researcher" @if(old('role') == "researcher") Selected @endif>Researcher</option>
										<option value="admin" @if(old('role') == "admin") Selected @endif>Administrator</option>
									</select>

								@if($errors->has('role'))
									<script>
										document.getElementById("role_form").className = "form-group has-error has-feedback";
									</script>
                                    <p class="label label-danger">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </p>
                                @endif
                                </div>
                                <div class="form-group" id="password_form">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" placeholder="Password" required name="password"
                                           class="form-control" value="{{ old('password') }}">

								@if($errors->has('password'))
									<script>
										document.getElementById("password_form").className = "form-group has-error has-feedback";
									</script>
                                    <p class="label label-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </p>
                                @endif
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm">Confirm Password</label>
                                    <input data-parsley-equalto="#password" type="password" required
                                           placeholder="Password" class="form-control" id="password-confirm" name="password_confirmation">
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