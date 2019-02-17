@extends('layouts.MasterAdmin')
@section('content')
<section class="invoice">

	<div class="alert-success"></div>
		<p id=""></p>
		<button class="btn btn-success" data-toggle="modal" href='#modal-add-product' id="tagbtn">Add</button>
		{{-- <a href="/admin/product/create" class="btn btn-success">Add New</a> --}}
		<div class="table-responsive" style="margin-top: 10px;">
			<table class="table table-hover" id="products-table">
				<thead>
					<tr>
						<th>Code</th>
						<th>Thumbnail</th>
						<th>Name</th>
						<th>Price</th>
						<th>Category</th>
						

						
						<th>Action</th>
					</tr>
				</thead>
			</table>  
					

	
  				
<div class="modal fade" id="modal-add-product">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">

		<div class="modal-body">
		<section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>

                    
                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step3" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form action="/admin/product/store" role="form" method="post" id="addformproduct" enctype="multipart/form-data">
            	{{-- <form action="/admin/product/store" role="form" method="post" enctype="multipart/form-data"> --}}
            	@csrf
                <div class="tab-content">
                	
                	
                		
                	
                    <div class="tab-pane active" role="tabpanel" id="step1">
                    	<div class="row">{{-- row --}}
                    		<div class="col-md-8">{{-- col8 --}}
                    			<h3>Content</h3>
						 {{-- code --}}
						<div class="form-group">
					    <input type="text" class="form-control" placeholder="code" name="code" value="{{old('code')}}" id="code">
					    <span style="color: red;font-size: 15px;margin: 8px 0px 0px 15px;display: inline-block;" class="errorCode"></span>
					    
					 </div>
					  {{-- endcode --}}
					 {{-- title --}}
                        <div class="form-group">
					    <input type="text" class="form-control" placeholder="name" name="name" value="{{old('name')}}" id="name">
					    @if($errors->has('name'))   
				                 
					        <span style="color: red;font-size: 15px;margin: 8px 0px 0px 15px;display: inline-block;">{{ $errors->first('name') }}</span>
					   
					   
						@endif
					 </div>
						{{-- endtitle --}}
						{{-- description --}}
						<textarea class="form-control" placeholder="Description" name="description" id="description">{{old('description')}}</textarea><br>
					@if($errors->has('description'))		         
					  <span style="color: red;font-size: 15px;margin: 8px 0px 0px 15px;display: inline-block;">{{ $errors->first('description') }}</span>
					@endif
					{{-- enddescription --}}
					<textarea name="content" placeholder="Nội Dung" id="content">{{old('content')}}</textarea>
					@if($errors->has('content'))		         
					  <span style="color: red;font-size: 15px;margin: 8px 0px 0px 15px;display: inline-block;">{{ $errors->first('content') }}</span>
					@endif
                    		</div>{{-- endcol8 --}}
                        <div class="col-md-4">
							{{-- sale --}}
                        	{{-- <h4 style="color: #3c8dbc;"><i class="fa fa-bookmark"></i> &nbsp;Price</h4>
						<input type="text" name="price" class="form-control money" placeholder="Enter Price" id="price"> --}}
					 	<br>
					  		<input type="text" value="" name="sale_price" class="form-control money" placeholder="Enter Sale price" id="sale_price">
							
							{{-- endsale --}}
			
						<br>
						{{-- <h4 style="color: #3c8dbc;"><i class="fa fa-bookmark"></i> &nbsp;Quantity</h4>
						<input type="text" name="quantity" class="form-control money" placeholder="Enter Quantity" id="quantity"> --}}
                        	{{-- category --}}
                        	<h4 style="color: #3c8dbc;"><i class="fa fa-bars"></i> &nbsp;Categories</h4><hr>
						
								<select class="form-control" name="category" style="margin : 0px;" id="category">
								@foreach($categories as $category => $value)
							    <option value="{{$value->id}}">{{$value->name}}</option>
							  
							    @endforeach
							 	</select><br>
                        	{{-- endcategory --}}
                        	{{-- size --}}
                        	{{-- <h4 style="color: #3c8dbc;"><i class="fa fa-github-alt"></i> &nbsp;Size</h4>
								<div class="checkbox">
									@foreach($sizes as $size)
						  		<label><input type="checkbox" name="size[]" value="{{$size->id}}" class="size">{{$size->size}}&nbsp;</label>
						  			@endforeach
								</div> --}}
							{{-- endsize --}}
                        	{{-- color --}}
                        		{{-- <h4 style="color: #3c8dbc;"><i class="fa fa-adjust"></i> &nbsp;Color</h4>
								<div class="checkbox">
									@foreach($colors as $color)
						  		<label><input type="checkbox" name="color[]" value="{{$color->id}}" class="color">{{$color->color}}&nbsp;</label>
						  		@endforeach
								</div> --}}
							{{-- endcolor --}}
							
					
                        	
                        	
								
                        </div>
						
 					</div> {{-- endrow --}}
 					<div class="row" style="padding-right: 15px;">
 						 <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
 					</div>
                       
                       
                    </div>

                   
                    
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <h3>Step 2</h3>
						  
							  
							   {{-- <input type="file"  multiple></input> --}}
							 	
							 	<input name="thumbnail[]" id="thumbnail-upload" type="file" multiple>
								<div id="preview"></div>
							
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <h3>Complete</h3>
                        <p>You have successfully completed all steps.</p>
                         <ul class="list-inline pull-right">
                            <li><button type="submit" class="btn btn-primary btn-info-full next-step">Save</button></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
					</div>

				</div>
			</div>
		</div>
{{-- end-add --}}
 {{-- Modal show chi tiết todo --}}
				<div class="modal fade" id="user-show">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Show user</h4>
					</div>
					<div class="modal-body" style="text-align: center;">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th style="text-align: center;">Name</th>
									<th style="text-align: center;">Email</th>
									
								</tr>
							</thead>
							<tbody>
								<tr>
									<td id="name-show"></td>
									<td id="email-show"></td>
									
									
								</tr>
							</tbody>
						</table>
					</div> 
					<!-- modalbody -->

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>

			</div>
		</div>

{{-- Modal sửa todo --}}

	<div class="modal fade" id="modal-edit-product">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
<div class="modal-body"> 
				<section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step-1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>

                    
                    <li role="presentation" class="disabled">
                        <a href="#step-2" data-toggle="tab" aria-controls="step3" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form action="" role="form" method="post" id="form-edit-prod">
            	@csrf
                <div class="tab-content">
                	
                	
                		
                	
                    <div class="tab-pane active" role="tabpanel" id="step-1">
                    	<div class="row">{{-- row --}}
                    		<div class="col-md-8">{{-- col8 --}}
                    			<h3>Content</h3>
						 {{-- code --}}
						<div class="form-group">
							<input type="hidden" class="form-control" placeholder="code" name="id-edit" value="{{old('code')}}" id="id-edit">
					    <input type="text" class="form-control" placeholder="code" name="code" value="{{old('code')}}" id="code-edit">
					    @if($errors->has('code'))   
				                 
					        <span style="color: red;font-size: 15px;margin: 8px 0px 0px 15px;display: inline-block;">{{ $errors->first('code') }}</span>
					   
					  
						@endif
					 </div>
					  {{-- endcode --}}
					 {{-- title --}}
                        <div class="form-group">
					    <input type="text" class="form-control" placeholder="name" name="name" value="{{old('name')}}" id="name-editt">
					    @if($errors->has('name'))   
				                 
					        <span style="color: red;font-size: 15px;margin: 8px 0px 0px 15px;display: inline-block;">{{ $errors->first('name') }}</span>
					   
					   
						@endif
					 </div>
						{{-- endtitle --}}
						{{-- description --}}
						<textarea class="form-control" placeholder="Description" name="description" id="description-editt">{{old('description')}}</textarea><br>
					@if($errors->has('description'))		         
					  <span style="color: red;font-size: 15px;margin: 8px 0px 0px 15px;display: inline-block;">{{ $errors->first('description') }}</span>
					@endif
					{{-- enddescription --}}
					<textarea placeholder="content" name="content" id="content-editt"></textarea><br>
					

					@if($errors->has('content'))		         
					  <span style="color: red;font-size: 15px;margin: 8px 0px 0px 15px;display: inline-block;">{{ $errors->first('content') }}</span>
					@endif
                    		</div>{{-- endcol8 --}}
                        <div class="col-md-4">
							{{-- sale --}}
                        	<h4 style="color: #3c8dbc;"><i class="fa fa-bookmark"></i> &nbsp;Price</h4>
						<input type="text" name="price" class="form-control money" placeholder="Enter Price" id="price-editt">
					 	<br>
					  		<input type="text" value="" name="sale_price" class="form-control" placeholder="Enter Sale price" id="sale_price_editt">
						
							{{-- endsale --}}
			
						<br>
						{{-- <h4 style="color: #3c8dbc;"><i class="fa fa-bookmark"></i> &nbsp;Quantity</h4>
						<input type="text" name="quantity" class="form-control money" placeholder="Enter Quantity" id="quantity"> --}}
                        	{{-- category --}}
                        	<h4 style="color: #3c8dbc;"><i class="fa fa-bars"></i> &nbsp;Categories</h4><hr>
						
								<select class="form-control" name="category" style="margin : 0px;" id="category-editt">
								@foreach($categories as $category)
							    <option value="{{$category->id}}">{{$category->name}}</option>
							  
							    @endforeach
							 	</select><br>
                        	{{-- endcategory --}}
                        	{{-- size --}}
                        	{{-- <h4 style="color: #3c8dbc;"><i class="fa fa-github-alt"></i> &nbsp;Size</h4>
								<div class="checkbox">
									@foreach($sizes as $size)
						  		<label><input type="checkbox" name="size[]" id="size{{$size->id}}" value="{{$size->id}}" class="size-edit">{{$size->size}}&nbsp;</label>
						  			@endforeach
								</div> --}}
							{{-- endsize --}}
                        	{{-- color --}}
                        		{{-- <h4 style="color: #3c8dbc;"><i class="fa fa-adjust"></i> &nbsp;Color</h4>
								<div class="checkbox">
									@foreach($colors as $color)
						  		<label><input type="checkbox" name="color[]" id="color{{$color->id}}" value="{{$color->id}}" class="color">{{$color->color}}&nbsp;</label>
						  		@endforeach
								</div> --}}
							{{-- endcolor --}}
							
								
                        	
                        	
								
                        </div>
						
 					</div> {{-- endrow --}}
 					<div class="row" style="padding-right: 15px;">
 						 <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
 					</div>
                       
                       
                    </div>

                   
                    
                    <div class="tab-pane" role="tabpanel" id="step-2">
                        <h3>Step 2</h3>
						  
							  
							  <input name="thumbnailedit[]" id="edit-upload" type="file" multiple>
								<div id="edit-preview"></div>
							 	
							
							<div class="append-img">
								
							</div>

                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <h3>Complete</h3>
                        <p>You have successfully completed all steps.</p>
                         <ul class="list-inline pull-right">
                            <li><button type="submit" class="btn btn-primary btn-info-full next-step">Save</button></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
           
        </div>
    </section>
    </div> 
				</div>{{-- body --}}
			</div>
		</div>	

{{-- Modal show chi tiết prodde --}}
		<div class="modal fade" id="prod-de-show">
					<div class="modal-dialog">
						<div class="modal-content" style="width: 892px">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Product detail</h4>
							</div>
							<div class="container" style="width: 100%; margin: auto;">
								<div class="row">
									<div class="col-md-8">
										
										<table class="table table-striped table-bordered table-hover" id="tableShow" style="width: 100%">
									      <thead>
									        <tr id="">									        	
									          <th class="stl-column color-column">Quantity</th>
									          <th class="stl-column color-column">Price</th>
									          <th class="stl-column color-column">Size</th>
									          <th class="stl-column color-column">Color</th>
									          <th class="stl-column color-column">Action</th>
									        </tr> 
									      </thead>
								     	 	<tbody>
								     	 		<tr>
								     	 			
								     	 			<td id="id-show"></td>
													<td id="quan-show"></td>
													<td id="price-show"></td>
													<td id="size-show"></td>
													<td id="color-show"></td>
														
								     	 		</tr>
								     	 	</tbody>
								    	</table>
									</div>
									<div class="col-md-4" >
										<input type="hidden" name="" id="prodeid" value="">
											<div id="formadd">
												<form action="" method="POST" id="addformprode" class="" role="form" >
												{{ csrf_field() }}
													<h3>Add</h3>
													<div class="form-group">
												
														
														<label class="control-label" for="tag">Quantity:</label>
														<input name="quantitydetail" type="text" class="form-control" id="quantitydetail" placeholder="" >
														
														<label class="control-label" for="tag">Size:</label>
														<div class="radio">
														@foreach($sizes as $size)
											  		<label><input type="radio" name="sizedetail[]" value="{{$size->id}}" id="sizedetail{{$size->id}}">{{$size->size}}&nbsp;</label>
											  			@endforeach
													</div>
												{{-- endsize --}}
														<label class="control-label" for="tag">Color:</label>
														<div class="radio">
															@foreach($colors as $color)
												  		<label><input type="radio" name="colordetail[]" value="{{$color->id}}" class="color">{{$color->color}}&nbsp;</label>
												  		@endforeach
														</div> 
													{{-- endcolor --}}
											
													</div>
									

													<button type="submit" class="btn btn-primary">Add</button>
												</form>
											</div>
											
									</div>

								</div>
								
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
		</div>
		{{-- edit-detail --}}
		<div class="modal fade" id="modal-edit-prode" style="z-index: '10';">
		<div class="modal-dialog">
			<div class="modal-content">

				<form action=""​ id="form-edit-prode" method="POST" role="form" >
					{{ csrf_field() }}
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Edit Prodetail</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<input type="hidden" class="form-control" id="idprode-edit" placeholder="id" name="id">
						</div>
						<div class="form-group">
							<label for="">Quantity</label>
							<input type="text" class="form-control" id="quantity-edit" placeholder="quantity" name="quantity">
						</div>
						{{-- <div class="form-group">
							<label for="">Price</label>
							<input type="text" class="form-control" id="price-detail" placeholder="price" name="price">
						</div> --}}
						<div class="form-group">
							{{-- size --}}
                        	<h4 style="color: #3c8dbc;"><i class="fa fa-github-alt"></i> &nbsp;Size</h4>
								<div class="radio">
									@foreach($sizes as $size)
						  		<label><input type="radio" name="size[]" id="size-detail{{$size->id}}" value="{{$size->id}}">{{$size->size}}&nbsp;</label>
						  			@endforeach
								</div>
							{{-- endsize --}}
                        	
						</div>
						<div class="form-group">
							{{-- color --}}
                        		<h4 style="color: #3c8dbc;"><i class="fa fa-adjust"></i> &nbsp;Color</h4>
								<div class="radio">
									@foreach($colors as $color)
						  		<label><input type="radio" name="color[]" id="color-detail{{$color->id}}" value="{{$color->id}}">{{$color->color}}&nbsp;</label>

						  		@endforeach
								</div>
							{{-- endcolor --}}
						</div>
					</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Edit</button>

						</div>

				</form>
			</div>
		</div>
	</div>
</section>

@endsection	
@section('footer')
<script>
   $(function() {
                $('#products-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                  type: 'post',
                  url: '/admin/productajax',
                  data:{
                     _token: $('meta[name="csrf-token"]').attr('content')
                  }

                },
                columns: [
                    { data: 'code', name: 'code' },
                    { data: 'thumbnail', name: 'thumbnail' },
                    { data: 'name', name: 'name' },
                    { data: 'sale_price', name: 'sale_price' },
                    { data: 'description', name: 'description' },
                    
                   
                    { data: 'action', name: 'action' }

                ]
            });
        });
  
$(document).on('submit', '#addformproduct', function(event) {
      
      event.preventDefault();
      // size = new Array();
      // $("input[name='size[]']").each(function(){
      //   size.push(this.value);
      //  });

      // color = new Array();
      // $("input[name='color[]']").each(function(){
      //   color.push(this.value);
      //  });
      var thumbnail = $('#thumbnail-upload')[0].files;
  //     for (var i = 0; i < files.length; i++)
		// {
		// var uploadimages = files[i].name;
		
		// }
		var form_data = new FormData();
        form_data.append('code', $('#code').val());
        form_data.append('name', $('#name').val());
        form_data.append('description', $('#description').val());
        form_data.append('content', $('#content').val());
        form_data.append('price', $('#price').val());
        form_data.append('sale_price', $('#sale_price').val());
        form_data.append('category', $('#category').val());
        for (var i = 0; i < thumbnail.length; i++) {
			    form_data.append('thumbnail[]', thumbnail[i]);
			}
        // form_data.append('thumbnail', thumbnail);
        form_data.append('_token', $('meta[name="csrf-token"]').attr('content'));
        console.log(thumbnail);
      $.ajax({
        url: '/admin/product/store',
        type: 'post',
         data: form_data,
        // data: {

        //   code: $('#code').val(), 
        //   name: $('#name').val(), 
        //   description : $('#description').val(), 
        //   content : $('#content').val(),
        //   price : $('#price').val(),
        //   sale_price : $('#sale_price').val(),
        //   thumbnail : thumbnail,
        //   category : $('#category').val(),

        //   // size_id : size,
        //   // color_id : color,

        //   _token: $('meta[name="csrf-token"]').attr('content'),   
        // },
       	 contentType: false,
            cache: false, 
            processData: false,
        success: function (response) {
        	// alert($('#thumbnail-upload').val());
        	console.log(response.error);
                //thông báo xoá thành công bằng toastr
                $('#modal-add-product').modal('hide');
                toastr.success('ADD success!');
                $('#products-table').DataTable().ajax.reload();
               

              },
                error: function (jqXHR,textStatus, errorThrow) {
                 $('.errorCode').text(jqXHR.responseJSON.error.code);
                }

              });
       })    
</script>
	<script>
   $(document).on('click', '.btn-delete-product', function(e) { 
   e.preventDefault(); 
    var id = $(this).attr('data-id');

          if (confirm("Are you sure?")){
            $.ajax({
              //phương thức delete
              type: 'delete',
              url: "/admin/product/"+id,
              data:{
                _token: $('meta[name="csrf-token"]').attr('content') 
              },
              success: function (response) {
                //thông báo xoá thành công bằng toastr
                toastr.warning('delete success!');
                $('#products-table').DataTable().ajax.reload();
               

              },
              error: function (error) {
                
              }
            })
          }
   })  
   

          //lấy dữ liệu từ attribute data-url lưu vào biến url
         
       
</script>
<script>
  $(document).on('click', '.btn-edit-product', function(event) {
     $('#modal-edit-product').modal('show');
    var id = $(this).attr('data-id');
   

     $.ajax({
         
          type: 'get',
          url: "/admin/product/"+id+"/edit",
          success: function (response) {
       	
          for (var i = 0; i < response.product_img.length; i++) {
           console.log(response.product_img[i].thumbnail);
          }
           $('#id-edit').val(response.data.id);

            $('#code-edit').val(response.data.code);
            $('#name-editt').val(response.data.name);
            $('#description-editt').val(response.data.description);
     
             CKEDITOR.instances['content-editt'].setData(response.data.content);
       
            $('#sale_price_editt').val(response.data.sale_price);
            $('#category-editt').val(response.data.category_id);
           	

            	$('.append-img').html('<div style="margin-top:10px;">Old Images</div>'+response.img);
           
            // $('#price-edit').val(response.product_detail[0].price);
            // for (var i = 0; i < response.product_detail.length; i++)
            // {
            //   console.log(response.product_detail.length);
            //  $('#size'+ response.product_detail[i].size_id).prop('checked', 'checked');
            //  $('#color'+ response.product_detail[i].color_id).prop('checked', 'checked');
            // }
            // $(".size-edit").prop('checked', 'checked');

          },
          error: function (error) {
            
          }
        })
  })
  
</script>
<script>
 
      $(document).on('submit','#form-edit-prod',function(e){
		        e.preventDefault();
		        
		        var id=$('#id-edit').val();
		        var thumbnailedit = $('#edit-upload')[0].files;
 				console.log(thumbnailedit);
				var form_data = new FormData();
		        form_data.append('code', $('#code-edit').val());
		        // form_data.append('code', $('#code').val());

		        form_data.append('name', $('#name-editt').val());
		        form_data.append('description', $('#description-editt').val());
		        form_data.append('content', $('#content-editt').val());
		        form_data.append('price', $('#price').val());
		        form_data.append('sale_price', $('#sale_price_editt').val());
		        form_data.append('category', $('#category-editt').val());
		        for (var i = 0; i < thumbnailedit.length; i++) {
		        	
					    form_data.append('thumbnailedit[]', thumbnailedit[i]);
					}
					
					 console.log(form_data);
	         form_data.append('id', id);
	        form_data.append('_token', $('meta[name="csrf-token"]').attr('content'));
		        console.log(id);
		        $.ajax({
		          //phương thức put
		          type: 'post',
		          url: '/admin/product/update',
		          //lấy dữ liệu trong form
		          data: form_data,
		          contentType: false,
			            cache: false, 
			            processData: false,
		          success: function (response) {
		             
		            //thông báo update thành công
		            $('#edit-upload').val('');
		            $('#edit-preview').text('');
		             $('#modal-edit-product').modal('hide');
			            toastr.success('edit student success!');
			           $('#products-table').DataTable().ajax.reload();
			             
		            // for (var i = 0; i < ; i++) {
		            // 	Things[i]
		            // }
		          },
		          error: function (jqXHR, textStatus, errorThrown) {
		            //xử lý lỗi tại đây
		             toastr.success('edit student success!');
		          }
		        })
		        
	})       
</script>
{{-- product-detail --}}
<script>
	function showdetail(id){
	 	$('#prod-de-show').modal('show');
	 	// alert(id);
	 	
	 	$('#prodeid').val(id);
			 	var table = $('#tableShow').DataTable({
					  destroy: true,
				      processing: true,
				      serverSide: true,
				      // order: [],
				      // 
				      ordering: false,
				    
				      ajax: {
							url: '/admin/product-detail/' + id,
							
						},
				        pageLength: 30,
				        lengthMenu: [[30, 50, 100, 200, 500], [30, 50, 100, 200, 500]],
				        columns: [
				        {data: 'quantity', name: 'quantity'},
				        {data: 'price', name: 'price' }, 				        
				        {data: 'size_id', name: 'size_id'},
				        {data: 'color_id', name: 'color_id'},
				        {data: 'action', name: 'action', orderable: false, searchable: false, 'class':'text-center'},
				        ]
				});
	}
// cop di van thế à
	$('#addformprode').submit(function(event) {
      event.preventDefault();
      sizedetail = $("input[name='sizedetail[]']:checked").val();
                // $("input[name='sizedetail[]']:checked").each(function() {
                //     sizedetail.push(this.value);
                // });
                console.log(sizedetail);
           
      colordetail = $("input[name='colordetail[]']:checked").val();
      // $("input[name='colordetail[]']:checked").each(function(){
      //   colordetail.push(this.value);
      //  });
      $.ajax({
        url: '/admin/product-detail/store',
        type: 'post',
        data: {
	        product_id: $('#prodeid').val(),
	        quantity: $('#quantitydetail').val(),
	        // price: $('#pricedetail').val(), 
	        size_id: sizedetail, 
	        color_id: colordetail, 
	        _token: $('meta[name="csrf-token"]').attr('content')   
        },
        success: function(response){
          toastr.success('Add new student success!');
                  //ẩn modal add đi
                  $('#modal-add-prode').modal('hide');
                  $('#addformprode')[0].reset();
                  $('#tableShow').DataTable().ajax.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                  //xử lý lỗi tại đây
                }
              });
    });
    // edit-detail
    // $(document).on('click','.edit-prodetail-btn',function(e){
    // 	e.preventDefault();
    	
    	
    // 	$('#modal-edit-prode').modal('show');
    // 	var id=$(this).attr('data-id');
    	
    // 	 $.ajax({
    //         //sử dụng phương thức get
    //         type: 'get',
    //         url: '/admin/product-detail/edit'+id,
    //         //nếu thực hiện thành công thì chạy vào success
    //         success: function (response) {
    //           // console.log(response);
    //           //hiển thị dữ liệu được controller trả về vào trong modal
    //           $('#idprode-edit').val(response.data.id);
    //           $('#quantity-edit').val(response.data.quantity);
    //           $('#price-edit').val(response.data.price);
    //           $('#size-edit').val(response.data.size_id);
    //           $('#color_id-edit').val(response.data.color_id);
    //         },
    //         error: function (jqXHR, textStatus, errorThrown) {
             
    //         }
    //     });
	          
   	// })
</script>
<script>
 $(document).on('click','.edit-prodetail-btn',function(e){
    $('#modal-edit-prode').modal('show');
    var id = $(this).attr('data-id');
   

     $.ajax({
         
          type: 'get',
          url: "/admin/product-detail/"+id+"/edit",
          success: function (response) {
          console.log(response);
           $('#idprode-edit').val(response.productdetail.id);
              $('#quantity-edit').val(response.productdetail.quantity);
              // $('#price-detail').val(response.productdetail.price);
              // $('#size-edit').val(response.data.size_id);
              // $('#color_id-edit').val(response.data.color_id);
              // $(".size-edit").prop('checked', 'checked');
              
              console.log(response.productdetail);
             $('#size-detail'+ response.productdetail.size_id).prop('checked', 'checked');
             $('#color-detail'+ response.productdetail.color_id).prop('checked', 'checked');
            
    		$("input[name='color[]']:not(:checked)").attr('disabled', true);
    		$("input[name='size[]']:not(:checked)").attr('disabled', true);
          },
          error: function (error) {
            
          }

        })
  })
  
</script>
<script>
	$(document).on('submit','#form-edit-prode',function(e){
		        e.preventDefault();
		        size = new Array();
                $("input[name='size[]']:checked").each(function() {
                    size.push(this.value);
                });
                color = new Array();
			      $("input[name='color[]']:checked").each(function(){
			        color.push(this.value);
			       });
			      console.log(color);
		        //lấy data-url của form edit
		        var id=$('#idprode-edit').val();
		        // console.log(id);
		        $.ajax({
		          //phương thức put
		          type: 'post',
		          url: '/admin/product-detail/update/' + id,
		          //lấy dữ liệu trong form
		          data: {
		            id: $('#idprode-edit').val(),
		            quantity: $('#quantity-edit').val(),
		            // price: $('#price-detail').val(),
		            size_id: size,
		            color_id: color,
		            _token: $('meta[name="csrf-token"]').attr('content'),		            
		          },
		          success: function (response) {
		             console.log('aaa');
		            //thông báo update thành công
		            toastr.success('Update Product Detail success!')
		            //ẩn modal edit
		            $('#modal-edit-prode').modal('hide');
		            $('#addformprode')[0].reset();
                  	$('#tableShow').DataTable().ajax.reload();
		            
		          },
		          error: function (jqXHR, textStatus, errorThrown) {
		            //xử lý lỗi tại đây
		          }
		        })
		        
	})    
</script>
<script>
   $(document).on('click', '.del-prod-btn', function(e) { 
   e.preventDefault(); 
    var id = $(this).attr('data-id');

          if (confirm("Are you sure?")){
            $.ajax({
              //phương thức delete
              type: 'delete',
              url: "/admin/product-detail/delete/"+id,
              data:{
                _token: $('meta[name="csrf-token"]').attr('content') 
              },
              success: function (response) {
                //thông báo xoá thành công bằng toastr
                toastr.warning('delete success!');
                $('#tableShow').DataTable().ajax.reload();
               

              },
              error: function (error) {
                
              }
            })
          }
   })  
   

          //lấy dữ liệu từ attribute data-url lưu vào biến url
         
       
</script>
<script>
function previewImages() {

  var $preview = $('#preview').empty();
  if (this.files) $.each(this.files, readAndPreview);

  function readAndPreview(i, file) {
    
    if (!/\.(jpe?g|png|gif)$/i.test(file.name)){
      return alert(file.name +" is not an image");
    } // else...
    
    var reader = new FileReader();

    $(reader).on("load", function() {
      $preview.append($("<img/>", {src:this.result, height:100}));
    });

    reader.readAsDataURL(file);
    
  }

}

$('#thumbnail-upload').on("change", previewImages);
</script>


<script>
	function previewImagess() {

  var $previeww = $('#edit-preview').empty();
  if (this.files) $.each(this.files, readAndPreviews);

  function readAndPreviews(i, file) {
    
    if (!/\.(jpe?g|png|gif)$/i.test(file.name)){
      return alert(file.name +" is not an image");
    } // else...
    
    var readerr = new FileReader();

    $(readerr).on("load", function() {
      $previeww.append($("<img/>", {src:this.result, height:100}));
    });

    readerr.readAsDataURL(file);
    
  }

}

$('#edit-upload').on("change", previewImagess);
</script>
@endsection	

