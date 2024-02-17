@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<!-- Main content -->
		<section class="content">
 
		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Sửa bài viết </h4>
			   
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

  <form method="post" action="{{ route('post-update') }}">
		 	@csrf
	<input type="hidden" name="id" value="{{ $post->id }}">
					  <div class="row">
	<div class="col-12">	
		<div class="row"> <!-- start 2nd row  -->
			<div class="col-md-12">
				<div class="form-group">
					<h5>Tiêu đề <span class="text-danger">*</span></h5>
					<div class="controls">
					<input type="text" name="post_title" class="form-control" value="{{ $post->post_title }}">
				     @error('post_title') 
					 <span class="text-danger">{{ $message }}</span>
					 @enderror
	 	  			</div>
				</div>
			</div> 
			<div class="col-md-12">
				<div class="form-group">
					<h5>Title seo <span class="text-danger">*</span></h5>
					<div class="controls">
					<input type="text" name="tieu_de_seo" class="form-control" value="{{ $post->tieu_de_seo }}">
				     @error('tieu_de_seo') 
					 <span class="text-danger">{{ $message }}</span>
					 @enderror
	 	  			</div>
				</div>
			</div> 

			<div class="col-md-12">
				<div class="form-group">
					<h5>Keywords<span class="text-danger">*</span></h5>
					<div class="controls">
					<input type="text" name="keyword" class="form-control" value="{{ $post->keyword }}">
				     @error('keyword') 
					 <span class="text-danger">{{ $message }}</span>
					 @enderror
	 	  			</div>
				</div>
		</div> 
		<div class="col-md-12">
				<div class="form-group">
					<h5>Meta description <span class="text-danger">*</span></h5>
					<div class="controls">
					<textarea type="text" name="meta_des" class="form-control">{{ $post->meta_des }}
					</textarea>
				     @error('meta_des') 
					 <span class="text-danger">{{ $message }}</span>
					 @enderror
	 	  			</div>
				</div>
		</div> 

		</div> <!-- end 2nd row  -->
<div class="row"> <!-- start 6th row  -->
			<div class="col-md-6">

	 <div class="form-group">
	<h5>Thuộc chuyên mục <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="category_id" class="form-control" required="" >
			<option value="" selected="" disabled="">Hãy chọn chuyên mục</option>
			@foreach($categories as $category)
 <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected': '' }} >{{ $category->blog_category_name }}</option>	
			@endforeach
		</select>
		@error('category_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 

	 </div>
		 </div>
				
			</div> <!-- end col md 6 -->

			

			 
			
		</div> <!-- end 6th row  -->



		
		 
		 
	 
<div class="row"> <!-- start 8th row  -->
			<div class="col-md-12">

	    <div class="form-group">
			<h5>Chi tiết bài viết <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea id="editor1" name="post_details" rows="10" cols="80" required="">
		{!! $post->post_details !!}
						</textarea>  
	 		 </div>
		</div>
				
			</div> <!-- end col md 6 -->

				 
			
		</div> <!-- end 8th row  -->

	 
	 <hr>

	 	<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Lưu lại">
						</div>
					</form>
 


	 
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
<section class="content">
 	<div class="row">

<div class="col-md-12">
				<div class="box bt-3 border-info">
				  <div class="box-header">
		 <h4 class="box-title">Cập nhật ảnh đại diện</h4>
				  </div>

			
		<form method="post" action="{{ route('update-post-thambnail') }}" enctype="multipart/form-data">
        @csrf

     <input type="hidden" name="id" value="{{ $post->id }}">
    <input type="hidden" name="old_img" value="{{ $post->post_image }}">

			<div class="row row-sm">
				 
				<div class="col-md-3">

<div class="card">
  <img src="{{ asset($post->post_image) }}" class="card-img-top">
  <div class="card-body">
     
    <p class="card-text"> 
    	<div class="form-group">
    		<label class="form-control-label">Thay đổi ảnh <span class="tx-danger">*</span></label>
    <input required type="file" name="post_image" class="form-control" onChange="mainThamUrl(this)">
     <img src="" id="mainThmb">
    	</div> 
    </p>
   
  </div>
</div> 		
				
				</div><!--  end col md 3		 -->	
				 

			</div>			

			<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Cập nhật ảnh đại diện">
		 </div>
<br><br>



		</form>		   





				</div>
			  </div>
 

 		
 	</div> <!-- // end row  -->
 	
 </section>		


<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box bt-3 border-info">
			<div class="box-header">
				<h4 class="box-title">Cập nhật ảnh kèm theo</h4>
			</div>
			<form method="post" action="{{ route('add-multil-image-blog') }}" enctype="multipart/form-data">
				@csrf
					<div class="row">
						
						<div class="col-md-3">
							<div id="preview_img"></div>
							<div class="card">
								
								<div class="card-body">
									<p class="card-text"> 
									<div class="form-group">
									<label class="form-control-label">Thêm ảnh kèm theo<span class="tx-danger">*</span></label>
									<input type="hidden" name="id" value="{{ $post->id }}">
									<input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg" required>
									</div> 
									</p>
									<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-success mb-5" value="Thêm">
							</div>		
								</div>
							</div> 
						</div>
					</div> 
			</form>	
			@if(count($multiImgs)!=0)
			<form method="post" action="{{ route('update-product-image-blog') }}" enctype="multipart/form-data">
				@csrf
					<!-- id="preview_img" -->
					<div class="row"> 
						
						@foreach($multiImgs as $img)
						<div class="col-md-3">
						<div class="card">
						<img src="{{ asset($img->photo_name) }}" class="card-img-top">
						<div class="card-body">
						<h5 class="card-title">
						<a href="{{ route('post.multiimg.delete',$img->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i> </a>
						</h5>
						<p class="card-text"> 
						<div class="form-group">
						<label class="form-control-label">Thay đổi<span class="tx-danger">*</span></label>
						<input class="form-control" type="file" name="multi_img[{{ $img->id }}]">
						<!-- id="multiImg" -->
						</div> 
						</p>

						</div>
						</div> 		
						</div>	
						@endforeach
						
					</div>			

					<div class="text-xs-right">
						<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Lưu thay đổi">
					</div>
				</form>	
			@else
			    <p>Không có ảnh nào.</p>
			@endif
			</div>
		</div>
	</div> <!-- // end row  -->
</section>








	  </div>
 
  


<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>

<script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>
 



@endsection