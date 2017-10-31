@extends('admin_main')
@section('content')
<div class="panel-heading">
<a type="button" class="pull-right btn btn-primary waves-effect waves-light" href="{{ route('source.create') }}"><i class="fa fa-plus-square"></i> Add Source</span></a>
	<h3 class="panel-title">DataTable of Sources</h3>
</div>
<div class="panel-body">
   <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>URL</th>
                                        <th>Embed Code</th>
                                        <th>Created At</th>
                                        <th><i class="fa fa-spin fa-cog"></i></th>
                                    </tr>
                                </thead>

                                <tbody>
									@foreach($sources as $source)
                                    <tr id="{{ $source->id }}">
                                        <td>{{ $source->name }}</td>
                                        <td>{{ $source->url }}</td>
                                        <td>{{ $source->embed_code }}</td>
                                        <td>{{ $source->created_at }}</td>
                                        <td>
											<a class="btn btn-icon waves-effect waves-light btn-warning btn-xs" href="{{ url('master/source/'.Crypt::encrypt($source->id).'/edit') }}"> 
											<i class="fa fa-pencil"></i></a>
											<a class="btn btn-icon waves-effect waves-light btn-danger btn-xs" onclick="warning_hapus('Do you want to delete this source?','{{ Crypt::encrypt($source->id) }}','{{ $source->id }}')">
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
							url: "{{url('master/source')}}/"+b+"/destroy/",
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