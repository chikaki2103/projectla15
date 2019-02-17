@extends('layouts.detailProd')
@section('content')
<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" action="/order" method="POST">
		@csrf
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>

								@if(Cart::content()!=null)
								@foreach(Cart::content() as $cart)
								<tr class="table_row" id="cart-{{$cart->rowId}}">
									<td class="column-1">
										<div class="how-itemcart1 delete-cart" data-id="{{$cart->rowId}}">
											<img src="{{asset($cart->options->thumbnail)}}" alt="IMG">
										</div>
									</td>
									<td class="column-2">{{$cart->name}}</td>
									<td class="column-3">$ {{$cart->price}}  </td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" id="minus-cart" data-rowid="{{$cart->rowId}}">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product2" id="quan-{{$cart->rowId}}" value="{{$cart->qty}}">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m"  id="plus-cart" data-rowid="{{$cart->rowId}}">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									
									<td class="column-5" id="subtol-{{$cart->rowId}}">$ {{$cart->total()}}</td>
									
									
								</tr>
								@endforeach
								@endif
							</table>
						</div>
						
						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5" id="cart-total">
								
								ToTal: 
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Total price" value="{{Cart::total()}}">
							</div>

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</div>
							
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<form class="bg0 p-t-75 p-b-85">

					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Information
						</h4>
						
						<div class="flex-w flex-t bor12 p-b-13">
							
								<input class="form-control" type="text" placeholder="Nhập Name" name="name_cus" id="email">
							@if($errors->has('name_cus'))
							<span style="color: red">{{$errors->first('name_cus')}}</span>
							@endif
								<span id="result1"></span>
							
						</div>
						<div class="flex-w flex-t bor12 p-b-13">
							
								<input class="form-control" type="text" placeholder="Nhập Số Điện Thoại" name="mobile_cus">
								@if($errors->has('mobile_cus'))
							<span style="color: red">{{$errors->first('mobile_cus')}}</span>
							@endif
								<span id="result2"></span>
							
							
						</div>

						<div class="flex-w flex-t bor12 p-b-13">
							
								<input class="form-control" type="text" placeholder="Nhập Địa Chỉ" name="adress_cus" id="adress_cus">
								@if($errors->has('adress_cus'))
							<span style="color: red">{{$errors->first('adress_cus')}}</span>
							@endif
								<span id="result3"></span>
									
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							
								<input class="form-control" type="text" placeholder="Nhập Email Của Bạn" name="email" id="adress">
								<span id="result4"></span>

						
						</div>
						
						
						
						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" type="submit">
							Đặt Hàng
							
						</button>
						

					</div>
					</form>
				</div>
			</div>
		</div>
	</form>
@endsection
@section('footer')
<script>
   $(document).on('click', '.delete-cart', function(e) { 
   e.preventDefault(); 
    var id = $(this).attr('data-id');

          if (confirm("Are you sure?")){
            $.ajax({
              //phương thức delete
              type: 'post',
              url: "/delete-cart/"+id,
              data:{
              	id : id,
                _token: $('meta[name="csrf-token"]').attr('content') 
              },
              success: function (response) {
                //thông báo xoá thành công bằng toastr
                // toastr.warning('delete success!');
                location.reload();
              	

              },
              error: function (error) {
                
              }
            })
          }
   })  
   

          //lấy dữ liệu từ attribute data-url lưu vào biến url
         
       
</script>
<script>
   $(document).on('click', '#plus-cart', function(e) { 
   e.preventDefault(); 
   // alert('a');
    var id = $(this).attr('data-rowid');
    var quan = $('#quan-'+id+'').val();
     
        // alert($('#quan').val());
            $.ajax({
              //phương thức delete
              type: 'get',
              url: "/updatecart/"+id,
              data:{
              	quantity : quan, 
              	id : id,
                _token: $('meta[name="csrf-token"]').attr('content') 
              },
              success: function (response) {
             		// $('#cart-total').html("");
               		$('#cart-total').html('Total: <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Total price" value="'+response.total+'">');
              		$('#subtol-'+response.cart.rowId+'').html('$ <span>'+response.cart.price*response.cart.qty+'</span>');
              
              },
              error: function (error) {
                
              }
            })
         
   })     
     
   $(document).on('click', '#minus-cart', function(e) { 
   e.preventDefault(); 
   // alert('a');
    var id = $(this).attr('data-rowid');
    var quan = $('#quan-'+id+'').val();
        // alert($('#quan').val());
            $.ajax({
              //phương thức delete
              type: 'get',
              url: "/updatecart/"+id,
              data:{
              	quantity : quan, 
              	id : id,
              },
              success: function (response) {
               	console.log(response.qty);
	            if (response.qty == 0) {
	              	$('#cart-'+response.rowId+'').remove();
	            }
	            $('#subtol-'+response.cart.rowId+'').html('$ <span>'+response.cart.price*response.cart.qty+'</span>');
	            $('#cart-total').html('Total: <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Total price" value="'+response.total+'">');
              },
              error: function (error) {
                
              }
            })
         
   })                 
</script>

@endsection