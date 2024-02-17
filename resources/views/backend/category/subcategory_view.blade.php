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
					<h4 class="box-title">Danh sách danh mục con</h4>
					<a style="float: right;" class="btn btn-success" href="{{ route('add.subcategory') }}">Thêm danh mục con mới</a>
				</div>
				<div class="box-body">
					<div class="table-responsive">
						<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
							<thead>
								<tr>
									<th>Tên</th>
									<th>Đường dẫn</th>
									<th>Thuộc danh mục cha</th>
									<th>Nội dung</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($subcategory as $subcat)
								<tr>
									<td>{{ $subcat->subcategory_name }}( {{
										$products->where('subcategory_id', $subcat->id)->count();
									}} Sp )</td>
									<td>{{ $subcat->subcategory_slug }}</td>
									<td>{{ $subcat['category']['category_name_vn'] }}</td>
									<td>{{ Str::limit($subcat->subcategory_content,20) }}</td>
									<td>
										<a href="{{ route('subcategory.edit',$subcat->id) }}" class="btn btn-info">Sửa</a>
										<a href="{{ route('subcategory.delete',$subcat->id) }}" class="btn btn-danger" id="delete">Xóa</a>
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