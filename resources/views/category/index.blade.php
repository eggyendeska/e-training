@extends('admin_main')
@section('content')
<div class="panel-heading">
<a type="button" class="pull-right btn btn-primary waves-effect waves-light" href="{{ route('category.create') }}"><i class="fa fa-plus-square"></i> Add Category</span></a>
	<h3 class="panel-title">DataTable of Categories</h3>
</div>
<div class="panel-body">
   <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Created At</th>
                                        <th><i class="fa fa-spin fa-cog"></i></th>
                                    </tr>
                                </thead>

                                <tbody>
									@foreach($categories as $cat)
                                    <tr id="{{ $cat->id }}">
                                        <td>{{ $cat->name }}</td>
                                        <td>{{ $cat->description }}</td>
                                        <td>{{ $cat->created_at }}</td>
                                        <td>
											<a class="btn btn-icon waves-effect waves-light btn-warning btn-xs" href="{{ url('master/category/'.Crypt::encrypt($cat->id).'/edit') }}"> 
											<i class="fa fa-pencil"></i></a>
											<a class="btn btn-icon waves-effect waves-light btn-danger btn-xs" onclick="warning_hapus('Do you want to delete this category?','{{ Crypt::encrypt($cat->id) }}','{{ $cat->id }}')">
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
							type: 'POST',
							url: "{{url('master/category')}}/"+b+"/destroy/",
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