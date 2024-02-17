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
					<h4 class="box-title">Sửa admin</h4>
				</div>
				<div class="box-body">
					 <form method="post" action="{{ route('admin.update') }}" enctype="multipart/form-data" autocomplete="off">
                    	@csrf
                    	<input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="row">

                            	<div class="col-md-6">
                            	  	<div class="form-group">
	                                    <h5>Tên <span class="text-danger">*</span></h5>
	                                    <div class="controls">
	                                       <input type="text" name="name" class="form-control" value="{{ $user->name }}">
	                                        <div class="help-block"></div>
	                                    </div>
                                	</div>
                                </div>
                                <div class="col-md-6">
                            	  	<div class="form-group">
	                                    <h5>Email <span class="text-danger">*</span></h5>
	                                    <div class="controls">
	                                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
	                                        
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
                    <input id="image" type="file" name="profile_photo_path" class="form-control">
                  
                    <div class="help-block"></div>
	                                    </div>
	                                </div>
                                </div>
                                <div class="col-md-6">
	                               <img id="showImage" src="{{( !empty($user->profile_photo_path))?url('upload/admin_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" alt="avatar" style="width:100px;">
                                </div>


                              
                            </div>
										
		                    </div>

	                  </div>
                     
					
		                      <div class="form-group">
		                      	<div class="box-body">
                      	<h4>Quyền</h4>
													<div class="demo-checkbox">
													
														<input type="checkbox" id="category" class="filled-in" name="category" value="1" <?php if($user->category == 1){echo "checked";} ?>>
														<label for="category">Category</label>

														<input type="checkbox" id="product" class="filled-in" name="product" value="1" <?php if($user->product == 1){echo "checked";} ?>>
														<label for="product">Product</label>

														<input type="checkbox" id="blog" class="filled-in" name="blog" value="1" <?php if($user->blog == 1){echo "checked";} ?>>
														<label for="blog">Blog</label>

														<input type="checkbox" id="page" class="filled-in" name="page" value="1" <?php if($user->page == 1){echo "checked";} ?>>
														<label for="page">Page</label>

														<input type="checkbox" id="setting" class="filled-in" name="setting" value="1" <?php if($user->setting == 1){echo "checked";} ?>>
														<label for="setting">Setting</label>

														<input type="checkbox" id="role" class="filled-in" name="role" value="1" <?php if($user->role == 1){echo "checked";} ?>>
														<label for="role">Role</label>
													</div>

											
                     
                          
                   
                        
                        <div class="text-xs-right">
												<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Lưu lại">					 
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