@extends('layouts.MasterAdmin')
@section('content')
<section class="invoice">
	
	<button class="btn btn-success" data-toggle="modal" href='#modal-add-prodetail' id="tagbtn">Add</button>
	<table class="table table-bordered" id="prode-table">
		<thead>
			<th>product id</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Size</th>
			<th>Color</th>
			<th>Action</th>
      <th>sizes</th>

		</thead>
	</table>

	
</section>
@endsection
@section('footer')

    <script type="text/javascript">
    	$(function(){
			$('#prode-table').DataTable({
				processing : true,
				serverSide: true,
				ajax:{
					type: 'post',
					url: '/admin/product-detail-ajax/',
				},
				columns: [
	            { data: 'product_id', name: 'product_id' },
	            { data: 'quantity', name: 'quantity' },
	            { data: 'price', name: 'price' },
	            { data: 'size_id', name: 'size_id' },
	            { data: 'color_id', name: 'color_id' },
	            { data: 'action', name: 'action' }
             

	        ]
			});
		});


		// $(document).on('submit', '#addformdetail', function(event) {
      
  //     event.preventDefault();
  //     size = new Array();
  //     $("input[name='size[]']").each(function(){
  //       size.push(this.value);
  //      });

  //     color = new Array();
  //     $("input[name='color[]']").each(function(){
  //       color.push(this.value);
  //      });

  //     $.ajax({
  //       url: '/admin/product/store',
  //       type: 'post',

  //       data: {
  //         code: $('#code').val(), 
  //         name: $('#name').val(), 
  //         description : $('#description').val(), 
  //         content : $('#content').val(),
  //         price : $('#price').val(),
  //         sale_price : $('#sale_price').val(),

  //         category : $('#category').val(),

  //         size_id : size,
  //         color_id : color,

  //         _token: $('meta[name="csrf-token"]').attr('content'),   
  //       },
  //       success: function (response) {
  //               //thông báo xoá thành công bằng toastr
  //               $('#modal-add-product').modal('hide');
  //               toastr.warning('delete success!');
  //               $('#products-table').DataTable().ajax.reload();
               

  //             },
  //               error: function (jqXHR, textStatus, errorThrown) {
                 
  //               }

  //             });
       // })    
    </script>

    @endsection