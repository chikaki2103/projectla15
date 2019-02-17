<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">​
  <title>AdminLTE 2 | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  {{-- <meta name="csrf-token" content="{{ csrf_token() }}">​ --}}
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('admin_assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin_assets/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('admin_assets/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin_assets/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{asset('admin_assets/dist/css/skins/skin-blue.min.css')}}">
   <link rel="stylesheet" href="{{asset('admin_assets/dist/css/profile.css')}}">
   <link rel="stylesheet" href="{{asset('admin_assets/dist/css/step.css')}}">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">


  <!-- Google Font -->
<link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css" />
<style>
.label-info {
    background-color: #795548!important;
    font-size: 12px!important;
}
.btn-app {
    border-radius: 3px;
    position: relative;
    padding: 8px 7px !important;
    min-width: 51px !important;
    height: 38px !important;
    text-align: center;
    color: #666;
    border: 1px solid #ddd;
    background-color: #f4f4f4;
    font-size: 12px;
}



</style>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" style="position: absolute;top: 0px;width: 100%">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{asset('admin_assets/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{Auth::User('admin')->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{asset('admin_assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                <p>
                 {{Auth::User('admin')->name}} - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/admin/profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                 {{--  @guest --}}
                  <a href="{{ route('admin.logout') }}"class="btn btn-default btn-flat"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                    {{-- @endguest --}}

                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('admin_assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::User('admin')->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        {{-- <li ><a href="{{asset('admin/user')}}"><i class="fa fa-user"></i><span>Admins</span></a></li> --}}
        <li ><a href="{{asset('admin/user')}}"><i class="fa fa-user"></i><span>Users</span></a></li>
         <li ><a href="{{asset('admin/product')}}"><i class="fa fa-magnet"></i><span>Products</span></a></li>
          <li ><a href="{{asset('admin/statistic')}}"><i class="fa fa-bar-chart"></i><span>Statistic</span></a></li>
           <li ><a href="{{asset('admin/bill')}}"><i class="fa fa-paper-plane-o"></i><span>Bill</span></a></li>
       {{--  <li><a href="{{asset('admin/tag')}}"><i class="fa fa-tags"></i> <span>Tags</span></a></li>
         <li><a href="{{asset('admin/category')}}"><i class="fa fa-reorder"></i> <span>Categories</span></a></li> --}}
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
      
    @yield('content')
  

    <!-- Main content -->
    <section class="content container-fluid">

     

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

 
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->


<script src="{{asset('admin_assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('admin_assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin_assets/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('admin_assets/dist/js/step.js')}}"></script>
<script src="{{asset('admin_assets/dist/js/format.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
{{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> --}}
{{-- <script src="//cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
 --}}
 {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script> --}}
{{-- <script>
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
{{-- user --}}
  <script type="text/javascript" charset="utf-8">
    
  $(function() {
                $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                  type: 'post',
                  url: '/admin/userajax',
                  data:{
                     _token: $('meta[name="csrf-token"]').attr('content')
                  }

                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'action', name: 'action' }

                ]
            });
        });
  

      $('#addformuser').submit(function(event) {
      event.preventDefault();

      $.ajax({
        url: '/admin/user',
        type: 'post',

        data: {
          name: $('#name').val(), 
           email: $('#email').val(),
           password: $('#password').val(),
          
          _token: $('meta[name="csrf-token"]').attr('content')   
        },
        success: function(response){
        
                  //ẩn modal add đi

                   console.log('sai vc');
                  $('#modal-add-user').modal('hide');
                  $('#users-table').DataTable().ajax.reload();
                   toastr.success('Add new student success!')
                },
                error: function (jqXHR, textStatus, errorThrown) {
                 
                }

              });


    });
  
    
           



  </script>
<script type="text/javascript">
   $(document).on('click', '.btn-show-user', function(e) {
              e.preventDefault();
              //hiện modal show lên
             console.log('aa');
              $('#user-show').modal('show');
          //lấy dữ liệu từ attribute data-url lưu vào biến url
          var id = $(this).attr('data-id');
          $.ajax({
            //sử dụng phương thức get
            type: 'get',
            url: "/admin/user/"+id,
            //nếu thực hiện thành công thì chạy vào success
            success: function (response) {
              // console.log(response);
              //hiển thị dữ liệu được controller trả về vào trong modal
              $('#name-show').text(response.data.name);
              $('#email-show').text(response.data.email);

            },
            error: function (jqXHR, textStatus, errorThrown) {
             
            }
          })
        })  
</script>
<script>
   $(document).on('click', '.btn-delete-user', function(e) { 
   e.preventDefault(); 
    var id = $(this).attr('data-id');

          if (confirm("Are you sure?")){
            $.ajax({
              //phương thức delete
              type: 'delete',
              url: "/admin/user/"+id,
              data:{
                _token: $('meta[name="csrf-token"]').attr('content') 
              },
              success: function (response) {
                //thông báo xoá thành công bằng toastr
                toastr.warning('delete student success!');
                $('#users-table').DataTable().ajax.reload();
               

              },
              error: function (error) {
                
              }
            })
          }
   })  
   

          //lấy dữ liệu từ attribute data-url lưu vào biến url
         
       
</script>
<script>
  $(document).on('click', '.btn-edit-user', function(event) {
     $('#modal-edit-user').modal('show');
    var id = $(this).attr('data-id');
     $.ajax({
         
          type: 'get',
          url: "/admin/user/"+id+"/edit",
          success: function (response) {
            console.log(response);
          
            $('#name-edit').val(response.data.name);
            $('#email-edit').val(response.data.email);
            $('#id_edit').val(response.data.id);

           

            
          },
          error: function (error) {
            
          }
        })
  })
  
</script>
<script type="text/javascript">
   $(document).on('submit', '#form-edit-user', function(event) {
    event.preventDefault();
    //console.log('aaaa');
        var id = $('#id_edit').val();

        $.ajax({
          //phương thức put
          type: 'put',
          url: "/admin/user/"+id,
          //lấy dữ liệu trong form
          data: {
            name: $('#name-edit').val(),
            email: $('#email-edit').val(),
            new_password: $('#new_password-edit').val(),
            _token: $('meta[name="csrf-token"]').attr('content'),
            
          },

          success: function (response) {
            
            //thông báo update thành công
           
            //ẩn modal edit
            $('#modal-edit-user').modal('hide');
            toastr.success('edit student success!')
           $('#users-table').DataTable().ajax.reload();
             
          },
          error: function (jqXHR, textStatus, errorThrown) {
           toastr.warning('New Password cannot be same as your current password')
          }
         })
      })    
</script>
{{-- enduser --}}
{{-- product --}}
{{-- <script>
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
                    { data: 'name', name: 'name' },
                    { data: 'sale_price', name: 'sale_price' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'action', name: 'action' }

                ]
            });
        });
  
$(document).on('submit', '#addformproduct', function(event) {
      
      event.preventDefault();
      size = new Array();
      $("input[name='size[]']").each(function(){
        size.push(this.value);
       });

      color = new Array();
      $("input[name='color[]']").each(function(){
        color.push(this.value);
       });

      $.ajax({
        url: '/admin/product/store',
        type: 'post',

        data: {
          code: $('#code').val(), 
          name: $('#name').val(), 
          description : $('#description').val(), 
          content : $('#content').val(),
          price : $('#price').val(),
          sale_price : $('#sale_price').val(),

          category : $('#category').val(),

          size_id : size,
          color_id : color,

          _token: $('meta[name="csrf-token"]').attr('content'),   
        },
        success: function(response){
        
                  //ẩn modal add đi

                   console.log('success');
                  // $('#modal-add-user').modal('hide');
                  // $('#products-table').DataTable().ajax.reload();
                  //  toastr.success('Add new student success!')
                },
                error: function (jqXHR, textStatus, errorThrown) {
                 
                }

              });
       })    
</script>
 --}}
{{-- <script>
  $(document).on('click', '.btn-edit-product', function(event) {
     $('#modal-edit-product').modal('show');
    var id = $(this).attr('data-id');
   

     $.ajax({
         
          type: 'get',
          url: "/admin/product/"+id+"/edit",
          success: function (response) {
          console.log(response.data.content);
          for (var i = 0; i < response.product_detail.length; i++) {
           
          }
            $('#code-edit').val(response.data.code);
            $('#name-editt').val(response.data.name);
            $('#description-edit').val(response.data.description);
     
             CKEDITOR.instances['content-editt'].setData(response.data.content);
       
            $('#sale_price_edit').val(response.data.sale_price);
            $('#category-edit').val(response.data.category_id);
            $('#price-edit').val(response.product_detail[0].price);
            for (var i = 0; i < response.product_detail.length; i++)
            {
              console.log(response.product_detail.length);
             $('#size'+ response.product_detail[i].size_id).prop('checked', 'checked');
             $('#color'+ response.product_detail[i].color_id).prop('checked', 'checked');
            }
            // $(".size-edit").prop('checked', 'checked');

          },
          error: function (error) {
            
          }
        })
  })
  
</script> --}}
<script type="text/javascript">
   $(document).on('submit', '#form-edit-product', function(event) {
    event.preventDefault();
    //console.log('aaaa');
        var id = $('#id_edit').val();

        $.ajax({
          //phương thức put
          type: 'put',
          url: "/admin/user/"+id,
          //lấy dữ liệu trong form
          data: {
            name: $('#name-edit').val(),
            email: $('#email-edit').val(),
            new_password: $('#new_password-edit').val(),
            _token: $('meta[name="csrf-token"]').attr('content'),
            
          },

          success: function (response) {
            
            //thông báo update thành công
           
            //ẩn modal edit
            $('#modal-edit-user').modal('hide');
            toastr.success('edit student success!')
           $('#users-table').DataTable().ajax.reload();
             
          },
          error: function (jqXHR, textStatus, errorThrown) {
           toastr.warning('New Password cannot be same as your current password')
          }
         })
      })    
</script>
<script>
  
 CKEDITOR.config.autoParagraph = false;
//   CKEDITOR.replace( 'content', {
//     on: {
//         instanceReady: function( ev ) {
//             // Output paragraphs as <p>Text</p>.
//             this.dataProcessor.writer.setRules( 'p', {
//                 indent: false,
//                 breakBeforeOpen: true,
//                 breakAfterOpen: false,
//                 breakBeforeClose: false,
//                 breakAfterClose: true
                
//             });
//         }
//     }
// } );
CKEDITOR.replace('content-editt', {
      height: 100
    });
CKEDITOR.replace('content', {
      height: 100
    });
 
  </script>
  {{-- <script type="text/javascript">
       function readURL(input) {

          if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
              $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
          }
        }

        $("#imgInp").change(function() {
          readURL(this);
        });
      </script> --}}


{{-- <script>
  $(document).ready(function() {
    const cateOldValue = '{{ old('category_id') }}';
    
    if(cateOldValue !== '') {
      $('#cate').val(cateOldValue);
    }
  });
</script> --}}
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->


     {{-- **upload ajax** --}}
    {{--  <script>
    $('#file').change(function () {

      if ($(this).val() != '') {
        
      var form_data = new FormData();
      form_data.append('file', this.files[0]);
      form_data.append('_token', '{{csrf_token()}}');
      $.ajax({
        url: "{{url('ajax-image-upload')}}",
        data: form_data,
        type: 'POST',
        contentType: false,
        processData: false,
        success: function (data) {
          $('#image').attr('src', '{{asset('storage')}}/' + data);
          toastr.success('upload image done');
        },
        error: function (xhr, status, error) {
          $('#image').attr('src', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQVCnWZ3qX7QRykEwVMvRxNDVxUrH31FOhwhNTTzcM7t7BX5WgSA');
        }
      });
    }
  });
  </script> --}}
     {{-- **upload ajax** --}}
    <script>
     $('.money').simpleMoneyFormat();
    </script>
     @yield('footer')
</body>
</html>




