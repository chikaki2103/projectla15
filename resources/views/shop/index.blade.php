@extends('layouts.shop')
@section('cart')
<!-- Cart -->

	<div class="wrap-header-cart js-panel-cart" id="js-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full addcart">
					@if(Cart::content()!=null)
					@foreach(Cart::content() as $cart)
					<li class="header-cart-item flex-w flex-t m-b-12">
						
							<div class="header-cart-item-img delete-cart" data-id="{{$cart->rowId}}">
							<img src="{{asset($cart->options->thumbnail)}}" alt="IMG">
						</div>
					
						

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								{{$cart->name}}
							</a>

							<span class="header-cart-item-info">
								{{$cart->qty}} x ${{$cart->price}}  
							</span>
							<p>{{$cart->options->color}} x {{$cart->options->size}}</p>
						</div>
					</li>
					@endforeach
					@endif
				</ul>
				
				<div class="w-full">
					{{-- <div class="header-cart-total w-full p-tb-40">
						Total: $75.00
					</div> --}}

					<div class="header-cart-buttons flex-w w-full">
						<a href="/shoppingcart" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="/shoppingcart" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
@endsection
@section('content')
	
		<div class="row isotope-grid">
			@foreach($products as $product)
				
					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
						<!-- Block2 -->
						<div class="block2">

							<div class="block2-pic hov-img0 label-new" data-label="New">
								
								
								{{-- @if($product->id == $product_images->product_id) --}}
								
								<img src="{{$product->img}}" alt="IMG-PRODUCT">
									
								{{-- @endif --}}
								
								
								{{-- <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" data-id="{{$product->id}}">
									Quick View
								</a> --}}
								<a href="/shop/quickview/{{$product->id}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" id="quickview" data-id="{{$product->id}}">
									Quick View
								</a>
							</div>
							
							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<input type="hidden" value="{{$product->id}}" id="product-id">
									<a href="/detail/{{$product->id}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										{{$product->name}}
									</a>

									<span class="stext-105 cl3">
										{{-- @foreach($product_detail as $pdetail)
										@if($pdetail->product_id == $product-.)

										@endif	
										@endforeach --}}
										{{$product->sale_price}}
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="shop_assets/images/icons/icon-heart-01.png" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="shop_assets/images/icons/icon-heart-02.png" alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div>	
					
					@endforeach				
			</div>
@endsection
@section('modal')
<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="shop_assets/images/icons/icon-close.png" alt="CLOSE">
				</button>

				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w" >
								{{-- <div class="wrap-slick3-dots"></div> --}}
								<div class="wrap-slick3"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb"  >
									
								<div class="show-image"></div>
									{{-- <div class="item-slick3" data-thumb="shop_assets/images/product-detail-03.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="shop_assets/images/product-detail-03.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="shop_assets/images/product-detail-03.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
									<div class="item-slick3" data-thumb="shop_assets/images/product-detail-02.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="shop_assets/images/product-detail-02.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="shop_assets/images/product-detail-02.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div> --}}



								</div>{{-- showimg --}}

							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<input type="hidden" value="" id="product-view-id">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14" id="product-name">
								{{-- Lightweight Jacket --}}
							</h4>
							<span class="mtext-106 cl2">
								$
							</span>
							<span class="mtext-106 cl2" id="product-price">
								{{-- 58.79 --}}
							</span>

							<p class="stext-102 cl3 p-t-23">
								Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
							</p>
							
							<!--  -->
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6" >
										Size
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time" id="select-size">
												<option>Choose an option</option>
												
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Color
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time" id="select-color">
												<option>Choose an option</option>
												
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1" id="savequan">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" id="add2cart">
											Add to cart
										</button>
									</div>
								</div>	
							</div>

							<!--  -->
							<div class="flex-w flex-m p-l-100 p-t-40 respon7">
								<div class="flex-m bor9 p-r-10 m-r-11">
									<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
										<i class="zmdi zmdi-favorite"></i>
									</a>
								</div>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
									<i class="fa fa-facebook"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
									<i class="fa fa-twitter"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
									<i class="fa fa-google-plus"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer')

<script>
 $(document).on('click','#quickview',function(e){
    // $('#modal-edit-prode').modal('show');
    
    var id = $(this).attr('data-id');
   // alert(id);
// console.log(id);
     $.ajax({
         
          type: 'get',
          url: "/quickview/"+id,
          success: function (response) {
         console.log(response);
           $('#product-view-id').val(response.product.id);
           $('#product-name').text(response.product.name);
            $('#product-price').text(response.product.price);

             $('#select-size').empty();
            for (i = 0; i < response.size.length; i++)
			{ 

			     $('#select-size').append( '<option value="'+response.size+'">'+'Size '+response.size[i]+'</option>' );

			}
 			$('#select-color').empty();
			 for (i = 0; i < response.size.length; i++)
			{ 
			     $('#select-color').append( '<option value="'+i+'">'+'Color '+response.color[i]+'</option>' );
			}
			
			     $('.show-image').html('<div class="item-slick3" data-thumb="'+response.product_images[0].thumbnail+'"><div class="wrap-pic-w pos-relative"><img src="'+response.product_images[0].thumbnail+'" alt="IMG-PRODUCT"><a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="'+response.product_images[0].thumbnail+'"><i class="fa fa-expand"></i></a></div></div>');
			




              // $('#quantity-edit').val(response.data.quantity);
              // $('#price-detail').val(response.productdetail.price);
              // $('#size-edit').val(response.data.size_id);
              // $('#color_id-edit').val(response.data.color_id);
              // $(".size-edit").prop('checked', 'checked');
              
        
             // $('#size-detail'+ response.productdetail.size_id).prop('checked', 'checked');
             // $('#color-detail'+ response.productdetail.color_id).prop('checked', 'checked');
            
    
          },
          error: function (error) {
            
          }

        })
  })
  
</script>

<script>
	

</script>

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
@endsection