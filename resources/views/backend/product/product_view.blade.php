@extends('admin.admin_master')
@section('admin')
@php
use Illuminate\Support\Str;
@endphp

  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Danh sách sản phẩm <span class="badge badge-pill badge-danger"> {{ count($products) }} </span></h3>
				  <a style="float: right;" class="btn btn-success" href="{{ route('add-product') }}">Thêm sản phẩm mới</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image </th>
								<th>Danh mục </th>
								<th>Tên sản phẩm</th>
								<th>Giá bán</th>
								<th>Giá KM </th>
								<th>Mô tả ngắn </th>
								<th>Chi tiết </th>
								<th>Status </th>
								<th>Action</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($products as $item)
	 <tr>
		<td> <img src="{{ asset($item->product_thambnail) }}" style="width: 60px; height: 50px;">  </td>
	<td>{{ $item->category->category_name_vn }}<?php if($item->subcategory_id != 0){ echo ' > '.$item->subcategory->subcategory_name;  } ?> </td>
		<td>{{ $item->product_name }}</td>
		 <td>{{ $item->selling_price }}</td>

		 <td> 
		 	@if($item->discount_price == NULL)
		 	<span class="badge badge-pill badge-danger">No Discount</span>

		 	@else
		
   <span class="badge badge-pill badge-danger">{{ $item->discount_price  }} </span>

		 	@endif



		 </td>
		<td>
			{{ Str::limit($item->short_descp,20)  }}
		</td>
		<td>{{ Str::limit($item->long_descp,20)  }}</td>
		 <td>
		 	@if($item->status == 1)
		 	<span class="badge badge-pill badge-success"> Hiển thị </span>
		 	@else
           <span class="badge badge-pill badge-danger"> Không hiển thị </span>
		 	@endif

		 </td>


		<td width="30%">

			
 <a href="{{ route('product.edit',$item->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i> </a>

 <a href="{{ route('product.delete',$item->id) }}" class="btn btn-danger" id="delete">
 	<i class="fa fa-trash"></i></a>

@if($item->status == 1)
 <a href="{{ route('product.inactive',$item->id) }}" class="btn btn-danger"><i class="fa fa-arrow-down"></i> </a>
	 @else
 <a href="{{ route('product.active',$item->id) }}" class="btn btn-success"><i class="fa fa-arrow-up"></i> </a>
	 @endif




		</td>
							 
	 </tr>
	  @endforeach
						</tbody>
						 
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			          
			</div>
			<!-- /.col -->

 
 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection