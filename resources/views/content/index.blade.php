@extends('admin_main')
@section('content')
<div class="panel-heading">
<a type="button" class="pull-right btn btn-primary waves-effect waves-light" href="{{ route('content.create') }}"><i class="fa fa-plus-square"></i> Add Content</span></a>
	<h3 class="panel-title">DataTable of Contents</h3>
</div>
<div class="panel-body">
   <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>User</th>
                                        <th>Source</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Tags</th>
                                        <th><i class="fa fa-eye"></th>
                                        <th><i class="fa fa-spin fa-cog"></i></th>
                                    </tr>
                                </thead>

                                <tbody>
									@foreach($contents as $content)
                                    <tr id="{{ $content->id }}">
                                        <td>{{ $content->title }}</td>
                                        <td>{{ $content->users_name }}</td>
                                        <td>{{ $content->sources_name }}</td>
                                        <td>{{ $content->description }}</td>
                                        <td>{{ $content->categories_name }}</td>
                                        <td>
										<?php $tags=explode(',', $content->tags); ?>
										
										@foreach($tags as $tag) 
										<span class="label label-purple">{{ $tag }}</span>
										@endforeach
										
										</td>
                                        <td>{{ $content->watch_count }}</td>
                                        <td>
											<a class="btn btn-icon waves-effect waves-light btn-primary btn-xs" href="{{ url('master/content/'.Crypt::encrypt($content->id)) }}"> 
											<i class="fa fa-search"></i></a>
											<a class="btn btn-icon waves-effect waves-light btn-warning btn-xs" href="{{ url('master/content/'.Crypt::encrypt($content->id).'/edit') }}"> 
											<i class="fa fa-pencil"></i></a>
											<a class="btn btn-icon waves-effect waves-light btn-danger btn-xs" onclick="warning_hapus('Do you want to delete this content?','{{ Crypt::encrypt($content->id) }}','{{ $content->id }}')">
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
							url: "{{url('master/content')}}/"+b+"/destroy/",
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