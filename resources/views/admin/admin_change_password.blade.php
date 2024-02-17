@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="container-full">

<section class="content">

    <!-- Basic Forms -->
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Đổi mật khẩu</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col">
                    <form method="post" action="{{ route('update.change.password') }}">
                    	@csrf
                        <div class="row">
                          

                            	<div class="col-md-12">
                            	  	<div class="form-group">
	                                    <h5>Mật khẩu hiện tại <span class="text-danger">*</span></h5>
	                                    <div class="controls">
	                                        <input type="password" id="current_password" name="oldpassword" class="form-control">
	                                        <div class="help-block"></div>
	                                    </div>
                                	</div>
                                </div>

                               	<div class="col-md-12">
                                	<div class="form-group">
                                    	<h5>Mật khẩu mới <span class="text-danger">*</span></h5>
	                                    <div class="controls">
	                                        <input id="password" type="password" name="password" class="form-control">
	                                        <div class="help-block"></div>
	                                    </div>
                                	</div>
                                </div>
                                <div class="col-md-12">
                                	<div class="form-group">
                                    	<h5>Nhập lại mật khẩu <span class="text-danger">*</span></h5>
	                                    <div class="controls">
	                                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control">
	                                        <div class="help-block"></div>
	                                    </div>
                                	</div>
                                </div>
                               	
                        </div>
                        
                    
                        
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info" value="Lưu">
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