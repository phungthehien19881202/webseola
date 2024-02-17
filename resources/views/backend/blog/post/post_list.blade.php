@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Danh sách bài viết <span class="badge badge-pill badge-danger"> {{ count($blogpost) }} </span></h3>
<a href="{{ route('add.post') }}" class="btn btn-success" style="float: right;">Thêm bài viết</a>				  
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								 
								<th>Chuyên mục  </th>
								<th>Ảnh đại diện </th>
								<th>Tiêu đề </th>
								<th>Đường dẫn </th>
								<th>Action</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($blogpost as $item)
	 <tr>
		 
		 <td>{{ $item->category->blog_category_name }}</td>
		 <td> <img src="{{ asset($item->post_image) }}" style="width: 60px; height: 60px;"> </td>
		<td>{{ $item->post_title}}</td>
		<td>{{ $item->post_slug}}</td>
		<td width="20%">
 <a target="_blank" href="{{ url($item->post_slug).'.html' }}" class="btn btn-info"><i class="fa fa-eye"></i> </a>
 <a href="{{ route('blog.post.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
 <a href="{{ route('blog.post.delete',$item->id) }}" class="btn btn-danger" id="delete">
 	<i class="fa fa-trash"></i></a>
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