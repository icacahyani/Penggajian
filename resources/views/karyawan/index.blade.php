@extends('layouts.master')

@section('content')
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="{{ url('home') }}">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Karyawan</span>
    </li>
</ul>
 <div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-diamond"></i>Data Karyawan </div>
        <div class="tools">
            <a href="javascript:;" class="collapse"> </a>
            <a href="javascript:;" class="reload" onclick="myFunction()"> </a>
        </div>
    </div>
    <div class="portlet-body">
    	<a href="{{ route('karyawan.create') }}">
	    	<div class="btn-group btn-group-devided">
	            <label class="btn btn-outline btn-circle btn-sm blue"><span class="icon-plus"></span>&nbsp;&nbsp;Tambah Data</label>
	        </div>
        </a>
        <hr>
        <div class="table-scrollable">
            <table class="table table-striped table-bordered table-advance table-hover">
                <thead>
					<tr>
						<th><center>No</center></th>
						<th><center>Kode Karyawan</center></th>
						<th><center>Nama Karyawan</center></th>
						<th><center>Jabatan</center></th>
						<th><center>Photo</center></th>
						<th colspan="3"><center>Action</center></th>
					</tr>
				</thead>
                <tbody>
					@if(count($karyawan) == 0)
						<tr>
							<td colspan="8"><center>Data Kosong!!</center></td>
						</tr>
					@else
						<?php
							$no = 1;
						?>
						@foreach($karyawan as $data)
							<tr>
								<td><center>{{ $no++ }}</center></td>
								<td>{{ $data->Kode_karyawan }}</td>
								<td>{{ $data->Nama_karyawan }}</td>
								<td>{{ $data->Jabatan->Nama_jabatan }}</td>
								<td></td>
								<td><center><a href="{{ url('karyawan', $data->id) }}" class="btn btn-outline btn-circle dark btn-sm black">
								<i class="fa fa-eye"></i> Show </a></td>
								<td><center><a href="{{ route('karyawan.edit', $data->id) }}" class="btn btn-outline btn-circle btn-sm purple"><i class="fa fa-edit"></i> Edit </a></center></td>
								<td><center>
									{!! Form::open(['class' => 'button', 'method' => 'DELETE', 'route' => ['karyawan.destroy', $data->id]]) !!}
										<button class="btn btn-outline btn-circle red btn-sm black remove">
                                            <i class="fa fa-trash-o"></i> Delete 
										</button>
									{!! Form::close() !!}
								</center></td>
							</tr>
						@endforeach
					@endif
				</tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')
	<script>
		function myFunction() {
		    location.reload();
		}

		$(document).on('click', '.button', function (e) {
		    e.preventDefault();
		    var id = $(this).data('id');
		    swal({
		            title: "Are you sure?",
		            text: "You will not be able to recover this imaginary file!",
		            type: "warning",
		            showCancelButton: true,
				  	confirmButtonColor: "#DD6B55",
				  	confirmButtonText: "Yes, delete it!",
				  	cancelButtonText: "No, cancel please!",
				  	closeOnConfirm: false,
				  	closeOnCancel: false
		    },
	        function(isConfirm){
			  	if (isConfirm) {
			  		$.ajax({
		                type: "POST",
		                success:  swal("Deleted!", "Your imaginary file has been deleted.", "success"); 

		            });
				    // swal("Deleted!", "Your imaginary file has been deleted.", "success");
				} 
			 	else {
			    	swal("Cancelled", "Your imaginary file is safe :)", "error");
				}	
			});		        
		});
	</script>
@endsection