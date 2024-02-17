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
			  <h4 class="box-title">Thêm bài viết </h4>
			   
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

  <form method="post" action="{{ route('post-store') }}" enctype="multipart/form-data" >
		 	@csrf

					  <div class="row">
	<div class="col-12">	
		<div class="row"> <!-- start 2nd row  -->
			<div class="col-md-12">
				<div class="form-group">
					<h5>Tiêu đề <span class="text-danger">*</span></h5>
					<div class="controls">
					<input type="text" name="post_title" class="form-control" required="">
				     @error('post_title') 
					 <span class="text-danger">{{ $message }}</span>
					 @enderror
	 	  			</div>
				</div>
			</div> 

			<div class="col-md-12">
				<div class="form-group">
					<h5>Title seo<span class="text-danger">*</span></h5>
					<div class="controls">
					<input type="text" name="tieu_de_seo" class="form-control">
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
					<input type="text" name="keyword" class="form-control">
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
					<textarea type="text" name="meta_des" class="form-control"></textarea>
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
		 @foreach($blogcategory as $category)
         <option value="{{ $category->id }}">{{ $category->blog_category_name }}</option>
			@endforeach
		</select>
		@error('category_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>
				
			</div> <!-- end col md 6 -->

			<div class="col-md-6">

	    <div class="form-group">
			<h5>Ảnh đại diện  <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="file" name="post_image" class="form-control" onChange="mainThamUrl(this)" required="" >
     @error('post_image') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 <img src="" id="mainThmb">
	 		 </div>
		</div>
				 
				
			</div> <!-- end col md 6 -->


			 
			
		</div> <!-- end 6th row  -->

<div class="row">
	<div class="col-md-12">

	    <div class="form-group">
			<h5>Ảnh kèm theo <span class="text-danger">*</span></h5>
			<div class="controls">
	 		<input type="file" name="multi_img_post[]" class="form-control" multiple="" id="multiImg">
		     @error('multi_img_post') 
			 <span class="text-danger">{{ $message }}</span>
			 @enderror
	 		<div class="row" id="preview_img"></div>
				<br>
	 		</div>
		</div>
	</div> <!-- end col -->	
</div>

 

		
		 
		 
	 
<div class="row"> <!-- start 8th row  -->
			<div class="col-md-12">

	    <div class="form-group">
			<h5>Chi tiết bài viết <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea id="editor1" name="post_details" rows="10" cols="80" required="">
						</textarea>  
	 		 </div>
		</div>
				
			</div> <!-- end col md 6 -->

				 
			
		</div> <!-- end 8th row  -->

	 
	 <hr>

	 	<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Thêm ngay">
						</div>
					</form>
 


	 
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
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