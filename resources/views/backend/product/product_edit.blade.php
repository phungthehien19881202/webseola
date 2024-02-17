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
			  <h4 class="box-title">Sửa sản phẩm</h4>
			   
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

  <form method="post" action="{{ route('product-update') }}" enctype="multipart/form-data" >
		@csrf
			<input type="hidden" name="id" value="{{ $products->id }}">

					  <div class="row">
	<div class="col-12">	


		<div class="row"> <!-- start 1st row  -->


			<div class="col-md-6">

				 <div class="form-group">
	<h5>Danh mục <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="category_id" class="form-control" required="" >
			<option value="" selected="" disabled="">Select Category</option>
			@foreach($categories as $category)
 <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected': '' }}> {{ $category->category_name_vn }} </option>	
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
			
			 @foreach($subcategory as $sub)
				 @if($products->subcategory_id)
				 <option value="{{ $sub->id }}" {{ $sub->id == $products->subcategory_id ? 'selected': '' }} >{{ $sub->subcategory_name }}</option>	
				 	@endif
			@endforeach

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
				<input type="text" name="product_name" class="form-control" required="" value="{{ $products->product_name }}">
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
			 <input type="text" name="product_code" class="form-control" required="" value="{{ $products->product_code }}">
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
			  <input type="text" name="selling_price" class="form-control" required="" value="{{ $products->selling_price }}">
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
	  <input type="text" name="discount_price" class="form-control" value="{{ $products->discount_price }}">
     @error('discount_price') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
		</div>
				
			</div> <!-- end col md 3 -->
			
		</div> <!-- end 2nd row  -->
<br>

<div class="row"> <!-- start 7th row  -->
	<div class="col-md-12">
	 	<div class="form-group">
			<h5> Link xem thử</h5>
			<div class="controls">
	<input type="text" name="linkdemo" class="form-control" value="{{ $products->linkdemo }}"> 
	 		 </div>
		</div>

	 </div>
			<div class="col-md-12">

	    <div class="form-group">
			<h5> Mô tả ngắn</h5>
			<div class="controls">
		<textarea name="short_descp" id="textarea" class="form-control">{{ $products->short_descp }}</textarea> 
	 		 </div>
		</div>
				
			</div> <!-- end col md 6 -->
	 
			
		</div> <!-- end 7th row  -->
		<br>
		 
<div class="row"> <!-- start 8th row  -->

			<div class="col-md-12">

	    <div class="form-group">
			<h5>Mô tả dài</h5>
			<div class="controls">
	<textarea id="editor1" name="long_descp" rows="10" cols="80">{!! $products->long_descp !!}</textarea>       
	 		 </div>
		</div>
				
			</div> <!-- end col md 6 -->			
		</div> <!-- end 8th row  -->
						 
						<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Cập nhật">
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
<!-- ///////////////// Start Thambnail Image Update Area ///////// -->

 <section class="content">
 	<div class="row">

<div class="col-md-12">
				<div class="box bt-3 border-info">
				  <div class="box-header">
		 <h4 class="box-title">Cập nhật ảnh đại diện</h4>
				  </div>

			
		<form method="post" action="{{ route('update-product-thambnail') }}" enctype="multipart/form-data">
        @csrf

     <input type="hidden" name="id" value="{{ $products->id }}">
    <input type="hidden" name="old_img" value="{{ $products->product_thambnail }}">

			<div class="row row-sm">
				 
				<div class="col-md-3">

<div class="card">
  <img src="{{ asset($products->product_thambnail) }}" class="card-img-top">
  <div class="card-body">
     
    <p class="card-text"> 
    	<div class="form-group">
    		<label class="form-control-label">Thay đổi ảnh <span class="tx-danger">*</span></label>
    <input required type="file" name="product_thambnail" class="form-control" onChange="mainThamUrl(this)">
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

<!-- ///////////////// End Start Multiple Image Update Area ///////// -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box bt-3 border-info">
			<div class="box-header">
				<h4 class="box-title">Cập nhật ảnh kèm theo</h4>
			</div>
			<form method="post" action="{{ route('add-multil-image') }}" enctype="multipart/form-data">
				@csrf
					<div class="row">
						
						<div class="col-md-3">
							<div id="preview_img"></div>
							<div class="card">
								
								<div class="card-body">
									<p class="card-text"> 
									<div class="form-group">
									<label class="form-control-label">Thêm ảnh kèm theo<span class="tx-danger">*</span></label>
									<input type="hidden" name="id" value="{{ $products->id }}">
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
			<form method="post" action="{{ route('update-product-image') }}" enctype="multipart/form-data">
				@csrf
					<!-- id="preview_img" -->
					<div class="row"> 
						
						@foreach($multiImgs as $img)
						<div class="col-md-3">
						<div class="card">
						<img src="{{ asset($img->photo_name) }}" class="card-img-top">
						<div class="card-body">
						<h5 class="card-title">
						<a href="{{ route('product.multiimg.delete',$img->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i> </a>
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