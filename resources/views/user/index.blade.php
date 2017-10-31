@extends('admin_main')
@section('content')
<div class="panel-heading">
	<a type="button" class="pull-right btn btn-primary waves-effect waves-light" href="{{ route('user.register') }}"><i class="fa fa-user-plus"></i> Add User</span></a>
	<h3 class="panel-title">DataTable of Users</h3>        
</div>
<div class="panel-body">
   <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Last Login</th>
                                        <th><i class="fa fa-spin fa-cog"></i></th>
                                    </tr>
                                </thead>

                                <tbody>
									@foreach($users as $user)
                                    <tr id="{{ $user->id }}">
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
										@if($user->role=="admin")
											<span class="label label-inverse">{{ $user->role }}</span>
										@else
											<span class="label label-purple">{{ $user->role }}</span>
										@endif
										</td>
                                        <td>
										@if(is_null($user->last_login))
											-
										@else
											{{ date_format(date_create($user->last_login), 'l jS \of F Y h:i:s A') }}
										@endif
										</td>
                                        <td>
											<a class="btn btn-icon waves-effect waves-light btn-warning btn-xs" href=""> <i class="fa fa-pencil"></i></a>
											<a class="btn btn-icon waves-effect waves-light btn-danger btn-xs" onclick="warning_hapus('Do you want to delete this user?','{{ Crypt::encrypt($user->id) }}','{{ $user->id }}')">
											<i class="fa fa-trash"></i></a>
										</td>
                                    </tr>
									@endforeach
                                </tbody>
                            </table>

</div>
<script>
	function warning_hapus(a,b,c) {
                swal({
                    title: "Are you sure?",
                    text: a,
                    type: "danger",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger waves-effect waves-light",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel",
                    closeOnConfirm: true,
                    closeOnCancel: true
                }, function (isConfirm) {
                    if (isConfirm) {
					  $.ajax({
							type: 'POST',
							url: "{{url('user')}}/"+b+"/destroy/",
							success: function(data) {
							if(data=='1'){
								swal("Deleted!", "Data has been deleted!", "success");
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