<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">​
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        {{-- <table class="table table-hover" id="users-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                                 
            </table>   --}}

<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Subtotal</th>
        </tr>
    </thead>

    <tbody>

        <?php foreach(Cart::content() as $row) :?>

            <tr>
                <td>
                    <p><strong><?php echo $row->name; ?></strong></p>
                    <p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
                </td>
                <td><input type="text" value="<?php echo $row->qty; ?>"></td>
                <td>$<?php echo $row->price; ?></td>
                <td>$<?php echo $row->total; ?></td>
            </tr>

        <?php endforeach;?>

    </tbody>
    
    <tfoot>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td>Subtotal</td>
            <td><?php echo Cart::subtotal(); ?></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td>Tax</td>
            <td><?php echo Cart::tax(); ?></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td>Total</td>
            <td><?php echo Cart::total(); ?></td>
        </tr>
    </tfoot>
</table>

        
        <script src="//code.jquery.com/jquery.js"></script>
       <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script>
            $(document).on('submit', '#store', function(event) {
                event.preventDefault();
               var _this = $('#store');
               $.ajax({
               url: '/welcomestore',
               type: 'post',
               dataType: 'json',
               data: _this.serialize(),

                   success : function(response){

                   },
                   error : function(jqXHR,textStatus, errorThrow){
                     $('.errorName').text(jqXHR.responseJSON.errors.name[0]);
                   }
               })
             
              
               
            });


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
        </script>
    </body>
</html>
