@extends('admin.admin_master')
@section('admin')
<div class="container-full">
<!-- Main content -->
<section class="content">
  <div class="row">
	  
	<div class="col-12">
		<div class="box">
			<div class="box-header">						
				<h4 class="box-title">Sửa danh mục con</h4>
			</div>
			<div class="box-body">
				 <form method="post" action="{{ route('subcategory.update') }}">
                	@csrf
                    <div class="row">
                      <input type="hidden" name="id" value="{{ $subcategory->id }}">			
                        	<div class="col-md-6">
                        	  	<div class="form-group">
                                    <h5>Tên danh mục con<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subcategory_name" class="form-control" value="{{ $subcategory->subcategory_name }}">
                                         @error('subcategory_name') 
										<span class="text-danger">{{ $message }}</span>
										@enderror 
                                        <div class="help-block"></div>
                                    </div>
                            	</div>
                            </div>
                            <div class="col-md-6">
                        	  	<div class="form-group">
                                    <h5>Thuộc danh mục cha<span class="text-danger">*</span></h5>
                                    <div class="controls">
										<select name="category_id" class="form-control"  >
											<option value="" selected="" disabled="">Chọn danh mục</option>
											@foreach($categories as $category)
											 <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected': ''}} >{{ $category->category_name_vn }}</option>	
											@endforeach
										</select>
										@error('category_id') 
									 <span class="text-danger">{{ $message }}</span>
									 @enderror 
									 </div>
                            	</div>
                            </div>



                           
                           	
                    </div>
                 
                      
                <div class="row">
                		<div class="col-md-12">
                			<div class="form-group">
                          	<h5>Bài viết <span class="text-danger">*</span></h5>
                            <div class="controls">
                                 <textarea id="editor1" name="subcategory_content" rows="10" cols="80">{{ $subcategory->subcategory_content }}</textarea>  
                                <div class="help-block"></div>
                            </div>
                      	</div>

                		</div>
                	
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



@endsection