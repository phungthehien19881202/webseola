@extends('admin.admin_master')
@section('admin')

  <div class="container-full">
	<!-- Main content -->
	<section class="content">
	  <div class="row">
		  
		<div class="col-12">
			<div class="box">
				<div class="box-header">						
					<h4 class="box-title">Danh sách user</h4>
					<a style="float: right;" class="btn btn-success" href="{{ route('create.admin') }}">Tạo user mới</a>
				</div>
				<div class="box-body">
					<div class="table-responsive">
						<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
							<thead>
								<tr>
									<th>Tên</th>
									<th>Ảnh đại diện</th>
									<th>Mail</th>
									<th>Quyền</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								@foreach($user as $us)
								<tr>
									<td>{{ $us->name }}</td>
									<td>
										
										 <img width="90" class="rounded-circle" src="{{( ($us->profile_photo_path != NULL))?url('upload/admin_images/'.$us->profile_photo_path):url('upload/no_image.jpg') }}" alt="Admin">
									</td>
									
									<td>{{ $us->email }}</td>
									<td>
										@if($us->category==1)
										<span class="badge badge-pill badge-danger">Category</span>
										@endif
										@if($us->product==1)
										<span class="badge badge-pill badge-danger">Product</span>
										@endif

									@if($us->blog==1)
										<span class="badge badge-pill badge-danger">Blog</span>
										@endif

										@if($us->setting==1)
										<span class="badge badge-pill badge-danger">Setting</span>
										@endif

										@if($us->page==1)
										<span class="badge badge-pill badge-danger">Page</span>
										@endif

										@if($us->role==1)
										<span class="badge badge-pill badge-danger">User</span>
										@endif


									</td>
									<td>
										<a href="{{ route('admin.edit',$us->id) }}" class="btn btn-info">Sửa</a>
										<a href="{{ route('admin.delete',$us->id) }}" class="btn btn-danger" id="delete">Xóa</a>
									</td>
								</tr>
								@endforeach

							</tbody>
						
						</table>
					</div>
				</div>
			</div>
		</div>

		

		
		<!-- /.col -->
	  </div>
	  <!-- /.row -->
	</section>
	<!-- /.content -->
  
  </div>



@endsection