@extends('layouts.MasterAdmin')
@section('content')
<section class="invoice">

	<div class="alert-success"></div>
		<p id=""></p>
		<button class="btn btn-success" data-toggle="modal" href='#modal-add-user' id="tagbtn">Add New User</button>
		<div class="table-responsive" style="margin-top: 10px;">
			<table class="table table-hover" id="users-table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Created at</th>
						<th>Updated at</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>  
					
					{{-- biến $todos được controller trả cho view
					chứa dữ liệu tất cả các bản ghi trong bảng todos. Dùng foreach để hiển
					thị từng bản ghi ra table này. --}}
					
					{{-- @foreach ($users as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td>{{$user->name}}</td> --}}
						{{-- <td><img src="{{ asset($post->thumbnail) }}" alt="" style="width: 110px;height: 100px;"></td> --}}
						{{-- <td>{{$user->email}}</td>	

						<td>{{$user->created_at->diffForHumans()}}</td>
						<td>{{$user->updated_at->diffForHumans()}}</td>
						<td style="width: 150px;"> --}}
							{{-- <a style="display: inline-block; width: 67px;" class="btn btn-warning btn-edit" data-toggle="modal" href="#modal-edit" data-id="{{$post->id}}" >Edit</a> --}}

								{{-- <a  href="{{ route('detail.show',$post->id) }}" style="display: inline-block; width: 67px;" class="btn btn-info btn-show">Detail</a>
								<a class="btn btn-primary btn-edit-user" data-url="{{ route('user.edit',$user->id) }}"​ onclick="addUser()"><i class="fa fa-edit"></i></a>

								<a class="btn btn-info btn-show-user" data-url="{{ route('user.show',$user->id) }}"​><i class="fa fa-eye"></i></a>

								<a class="btn btn-danger btn-delete-user" data-url="{{ route('user.destroy',$user->id) }}"​ ><i class="fa fa-times"></i></a> --}}
								{{-- <a href="/admin/a/tag/{{$tag->id}}">del</a>
								 --}}
							
							{{-- <button type="button" class="btn btn-warning btn-edit">Edit</button> --}}
							

							{{-- <a style="display: inline-block; width: 67px;" href="{{ route('todos.edit',$todo->id) }}" class="btn btn-warning">Edit</a>
							<form style="display: inline-block;" action="{{ route('todos.destroy',$todo->id) }}" method="post" accept-charset="utf-8">
								@csrf
								{{method_field('delete')}}
								<button type="submit" class="btn btn-danger">Delete</button>
							</form> --}}
						{{-- </td>
					</tr>
					@endforeach
				</tbody> --}}
			
			
			{{-- {{$users->Links()}} --}}

			
{{-- ajax --}}
{{-- add --}}
<div class="modal fade" id="modal-add-user">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-body">
						<form action="" method="POST" id="addformuser" class="" role="form" data-url="{{ route('user.store') }}">
							{{ csrf_field() }}
							<div class="form-group">
								<legend>Add user</legend>
							</div>

							<div class="form-group">
								<label class="control-label" for="user">Tên:</label>
								
								<input name="name" type="text" class="form-control" id="name" placeholder="Enter User">
								
							</div>
							<div class="form-group">
								<label class="control-label" for="user">email:</label>
								
								<input name="email" type="text" class="form-control" id="email" placeholder="Enter Email">
								
							</div>
							<div class="form-group">
								<label class="control-label" for="user">password:</label>
								
								<input name="password" type="password" class="form-control" id="password" placeholder="Enter password">
								
							</div>

							<button type="submit" class="btn btn-primary">Add</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</form>
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

	<div class="modal fade" id="modal-edit-user">
		<div class="modal-dialog">
			<div class="modal-content">

				<form id="form-edit-user" method="put" role="form">
					{{ csrf_field() }}
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Edit Tag</h4>
					</div>

					<div class="modal-body">
						<input type="hidden" id="id_edit">
						<div class="form-group">
							<label for="">Tên</label>
							<input type="text" class="form-control" id="name-edit" placeholder="Name">
						</div>
						<div class="form-group">
							<label class="control-label" for="email">Email:</label>
							<input name="email" type="text" class="form-control" id="email-edit" placeholder="Email">

						</div>
						<div class="form-group">
							<label class="control-label" for="email">New Password (if you want to change or doing nothing)</label>
							<input name="new_password" type="password" class="form-control" id="new_password-edit" placeholder="new password">

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

