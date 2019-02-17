@extends('layouts.MasterAdmin')
@section('content')
<section class="invoice">

	<div class="alert-success"></div>
		
		<div class="table-responsive" style="margin-top: 10px;">
			<table class="table table-hover" id="bill-table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Mobile</th>
						<th>Adress</th>
						<th>Created at</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>  
					
					
</section>
@endsection	
@section('footer')
<script>
	$(function() {
                $('#bill-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                  type: 'post',
                  url: '/admin/billtable',
                  data:{
                     _token: $('meta[name="csrf-token"]').attr('content')
                  }

                },
                columns: [
                    { data: 'bill_code', name: 'bill_code' },
                    { data: 'name', name: 'name' },
                    { data: 'mobile', name: 'mobile' },
                      { data: 'adress', name: 'adress' },
                    { data: 'created_at', name: 'created_at' },
                  	 { data: 'status', name: 'status' },
                  	  
                    { data: 'action', name: 'action' }

                ]
            });
        });
</script>
@endsection