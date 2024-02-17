@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <div class="container-full">
	<!-- Main content -->
	<section class="content">
	  <div class="row">
		<div class="col-12">
			<div class="box">
				<div class="box-header">						
					<h4 class="box-title">Sửa danh mục</h4>
				</div>
				<div class="box-body">
					 <form method="post" action="{{ route('category.update',$category->id) }}" enctype="multipart/form-data">
                    	@csrf
                    	<input type="hidden" name="id" value="{{ $category->id }}">	
	 				<input type="hidden" name="old_image" value="{{ $category->category_icon }}">
                        <div class="row">
                          

                            	<div class="col-md-6">
                            	  	<div class="form-group">
	                                    <h5>Tên danh mục <span class="text-danger">*</span></h5>
	                                    <div class="controls">
	                                        <input type="text" name="category_name_vn" class="form-control" value="{{ $category->category_name_vn }}">
	                                         @error('category_name_vn') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror 
	                                        <div class="help-block"></div>
	                                    </div>
                                	</div>
                                </div>

                               
                               	
                        </div>
                        <div class="row">
                               	<div class="col-md-6">
	                                <div class="form-group">
	                                    <h5>Ảnh đại diện <span class="text-danger">*</span></h5>
	                                    <div class="controls">
	                                        <input id="image" type="file" name="category_icon" class="form-control">
	                                         @error('category_icon') 
											 <span class="text-danger">{{ $message }}</span>
											 @enderror 
	                                        <div class="help-block"></div>
	                                    </div>
	                                </div>
                                </div>
                                <div class="col-md-6">
	                               <img id="showImage" src="{{( !empty($category->category_icon))?asset($category->category_icon):url('upload/no_image.jpg') }}" alt="avatar" style="width:100px;height:100px">
                                </div>


                              
                            </div>
                          
                    <div class="row">
                    		<div class="col-md-12">
                    			<div class="form-group">
                              	<h5>Bài viết <span class="text-danger">*</span></h5>
                                <div class="controls">
                                      <textarea id="editor1" name="category_content" rows="10" cols="80">{{ $category->category_content }}</textarea>  
                                    <div class="help-block"></div>
                                </div>
                          	</div>

                    		</div>
                    	
                    </div>
                        
                        <div class="text-xs-right">
												<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Cập nhật">					 
                        </div>
                    </form>
				</div>
			</div>
		</div>

		

		
		<!-- /.col -->
	  </div>
	  <!-- /.row -->
	</section>
	<!-- /.content -->
  
  </div>

<script type="text/javascript">
	$(document).ready(function () {
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});

</script>

@endsection