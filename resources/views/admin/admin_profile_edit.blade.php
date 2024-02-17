@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="container-full">

<section class="content">

    <!-- Basic Forms -->
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Thay đổi thông tin</h4>
            <h6 class="box-subtitle">Nhập thông tin mới và lưu lại</h6>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col">
                    <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                    	@csrf
                    	<input type="hidden" name="id" value="{{ $EditAdminData->id }}">
                        <div class="row">
                            	<div class="col-md-6">
                            	  	<div class="form-group">
	                                    <h5>User name <span class="text-danger">*</span></h5>
	                                    <div class="controls">
	                                        <input type="text" name="name" class="form-control" value="{{ $EditAdminData->name }}">
	                                        <div class="help-block"></div>
	                                    </div>
                                	</div>
                                </div>

                               	<div class="col-md-6">
                                	<div class="form-group">
                                    	<h5>Email <span class="text-danger">*</span></h5>
	                                    <div class="controls">
	                                        <input type="email" name="email" class="form-control" value="{{ $EditAdminData->email }}">
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
	                               <img id="showImage" src="{{( !empty($EditAdminData->profile_photo_path))?url('upload/admin_images/'.$EditAdminData->profile_photo_path):url('upload/no_image.jpg') }}" alt="avatar" style="width:100px;height:100px">
                                </div>


                              
                            </div>
                          
                    
                        
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info" value="Cập nhật">
                        </div>
                    </form>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
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