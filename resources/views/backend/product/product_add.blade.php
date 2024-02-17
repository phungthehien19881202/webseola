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
			  <h4 class="box-title">Thêm sản phẩm</h4>
			   
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

  <form method="post" action="{{ route('product-store') }}" enctype="multipart/form-data" >
		 	@csrf

					  <div class="row">
	<div class="col-12">	


		<div class="row"> <!-- start 1st row  -->


			<div class="col-md-6">

				 <div class="form-group">
	<h5>Danh mục <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="category_id" class="form-control" required="" >
			<option value="" selected="" disabled="">Chọn danh mục</option>
			@foreach($categories as $category)
 <option value="{{ $category->id }}">{{ $category->category_name_vn }}</option>	
			@endforeach
		</select>
		@error('category_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>
				
			</div> <!-- end col md 4 -->


			<div class="col-md-6">

				 <div class="form-group">
	<h5>Danh mục con <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="subcategory_id" class="form-control">
			<option value="" selected="" disabled="">Chọn danh mục con</option>
			 
		</select>
		@error('subcategory_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>
				
			</div> <!-- end col md 4 -->
			
		</div> <!-- end 1st row  -->
<br>


<div class="row"> <!-- start 2nd row  -->
			

			<div class="col-md-3">

				 <div class="form-group">
			<h5>Tên sản phẩm <span class="text-danger">*</span></h5>
			<div class="controls">
				<input type="text" name="product_name" class="form-control" required="">
     @error('product_name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 	  </div>
		</div>
				
			</div> <!-- end col md 3 -->
		<div class="col-md-3">

	  <div class="form-group">
			<h5>Mã sản phẩm <span class="text-danger">*</span></h5>
			<div class="controls">
				<input type="text" name="product_code" class="form-control">
     @error('product_code') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 	  </div>
		</div>
				
			</div> <!-- end col md 3 -->
			<div class="col-md-3">

				<div class="form-group">
			<h5>Giá <span class="text-danger">*</span></h5>
			<div class="controls">
				<input type="text" name="selling_price" class="form-control">
     @error('selling_price') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 	  </div>
		</div>
				
			</div> <!-- end col md 3 -->
						<div class="col-md-3">

	    <div class="form-group">
			<h5>Giá khuyến mãi <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="text" name="discount_price" class="form-control">
     @error('discount_price') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
		</div>
				
			</div> <!-- end col md 3 -->
			
		</div> <!-- end 2nd row  -->
<br>

<div class="row"> <!-- start 6th row  -->


			<div class="col-md-6">

	    <div class="form-group">
			<h5>Ảnh đại diện <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="file" name="product_thambnail" class="form-control" onChange="mainThamUrl(this)" required="">
     @error('product_thambnail') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 <img src="" id="mainThmb">
	 		 </div>
		</div>
				 
				
			</div> <!-- end col md 6 -->

			<div class="col-md-6">

	    <div class="form-group">
			<h5>Ảnh kèm theo <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg">
     @error('multi_img') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		<div class="row" id="preview_img"></div>

	 		 </div>
		</div>
				 
				
			</div> <!-- end col md 6 -->
			
		</div> <!-- end 6th row  -->

<br>

<div class="row"> <!-- start 7th row  -->
	 <div class="col-md-12">
	 	<div class="form-group">
			<h5> Link xem thử</h5>
			<div class="controls">
	<input type="text" name="linkdemo" class="form-control"> 
	 		 </div>
		</div>

	 </div>
			<div class="col-md-12">

	    <div class="form-group">
			<h5> Mô tả ngắn</h5>
			<div class="controls">
	<textarea name="short_descp" id="textarea" class="form-control"></textarea>     
	 		 </div>
		</div>
				
			</div> <!-- end col  -->
	
			
		</div> <!-- end row  -->
		<br>
		 
<div class="row"> <!-- start 8th row  -->
			<div class="col-md-12">

	    <div class="form-group">
			<h5>Mô tả dài</h5>
			<div class="controls">
	<textarea id="editor1" name="long_descp" rows="10" cols="80">
		
						</textarea>  
	 		 </div>
		</div>
				
			</div> <!-- end col md 6 -->			
		</div> <!-- end 8th row  -->
						 
						<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Thêm sản phẩm">
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
		<!-- /.content -->
	  </div>
 
 <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    	$('select[name="subcategory_id"]').html('');
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
    </script>


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