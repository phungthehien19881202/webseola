@extends('admin.admin_master')
@section('admin')
@php
use Illuminate\Support\Str;
@endphp
  <div class="container-full">
	<!-- Main content -->
	<section class="content">
	  <div class="row">
		  
		<div class="col-12">
			<div class="box">
				<div class="box-header">						
					<h4 class="box-title">Danh sách danh mục</h4>
					<a style="float: right;" class="btn btn-success" href="{{ route('add.category') }}">Thêm danh mục mới</a>
				</div>
				<div class="box-body">
					<div class="table-responsive">
						<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
							<thead>
								<tr>
									<th>Tên</th>
									<th>Ảnh đại diện</th>
									<th>Đường dẫn</th>
									<th>Nội dung</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								@foreach($category as $cat)
								<tr>
									<td>{{ $cat->category_name_vn }}( {{
										$products->where('category_id', $cat->id)->count();
									}} Sp )</td>
									<td><img src="<?php 
										if($cat->category_icon!=''){
											echo asset($cat->category_icon);
										}else{
											echo asset('upload/no_image.jpg');
										}
									 ?>" width="80" height="50"></td>
									<td>{{ $cat->category_slug_vn }}</td>
									<td>{{ Str::limit($cat->category_content, 20) }}</td>
									<td>
										<a href="{{ route('category.edit',$cat->id) }}" class="btn btn-info">Sửa</a>
										<a href="{{ route('category.delete',$cat->id) }}" class="btn btn-danger" id="delete">Xóa</a>
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