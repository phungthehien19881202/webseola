@extends('frontend.main_master')
@section('content')
<!-- service-page end-->
<div class="service__details p_relative ">
    <div class="auto-container">
        <div class="row">
        	 <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="service__right image">
                    <figure>
                        <img src="{{ asset($product->product_thambnail) }}" alt="{{ asset($product->product_name) }}">
                    </figure>
                </div>
                <br>
                <div class="contentsp">{!! $product->long_descp !!}</div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="service__details__left">
                    <div class="sidebar__widget">
                        <div class="all__service">
                            <h1 class="text-center tdsp">{{ $product->product_name }}</h1>
                        </div>
                         <ul class="service__details__1__cat">
                            <li><a href="#">Đơn giá: @if ($product->discount_price == NULL)
						    <span class="price">{{ number_format($product->selling_price) }} đ</span>
						    @else
						    <span class="price">{{ number_format($product->discount_price) }} đ</span>
							<span class="price-strike">{{ number_format($product->selling_price) }} đ</span>
						    @endif </a></li>
                           

                            <li> @if ($subcat!="")
                        		<a href="{{ url($cat->category_slug_vn).'/c' }}"> {{ $cat->category_name_vn }} </a><a href="{{ url($cat->category_slug_vn.'/'.$subcat->subcategory_slug) }}"> {{ $subcat->subcategory_name }}  <i class="icon-02"></i></a>
                        	@else
							<a href="{{ url($cat->category_slug_vn).'/c' }}">Danh mục : {{ $cat->category_name_vn }}</a> 
                        	@endif</li>
                            
                            <li><a href="#">Free Hosting Năm Đầu Tiên </a></li>                                
                            <li><a href="#">Tặng Tên Miền .com .net Năm Đầu Tiên </a></li>

                             @if($product->short_descp  )
                            <li><a href="#">{{ $product->short_descp }}</a></li>
                            @endif
                             @if($product->linkdemo)
                            <li class="active demo"><span id="myButton" class="nutdemo" data-link="{{ $product->linkdemo }}">Dùng Thử </span></li>
                            @endif
                        </ul>
                        @if(session('success'))
				            <div class="alert alert-success">
				                {{ session('success') }}
				            </div>
				        @endif
                        <h5 class="dattao">Đặt tạo website này</h5>
<div class="service__contact see__pad p_relative">
    <div class="auto-container">
        <div class="service__contact__block">
            <div class="row">

                <div class="col-md-12 chuaform">

                    <div class="form-inner">
                        <form method="post" action="{{ route('donhang') }}" class="default-form"> 
                        	@csrf
                            <div class="clearfix">

                                <div class="form-group">

                                	<input type="hidden" name="tensp" value="{{ $product->product_name }}">
                                	<input type="hidden" name="giasp" value="@if ($product->discount_price == NULL){{ number_format($product->selling_price) }} đ@else{{number_format($product->discount_price) }} đ@endif">
                                    <input type="name" name="tenkhach" placeholder="Điền tên của bạn *" required="">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="sdtkhach" placeholder="Số điện thoại " required="">
                                </div>
                                <div class="form-group">
                                    <textarea name="ghichu" placeholder="Lời Nhắn"></textarea>
                                </div>
                                <div class="form-group message-btn btn-box">
                                    <button class="theme-btn theme-btn-one" type="submit" name="submit-form">Đặt mẫu này</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="service__contact__img">
                    <figure>
                        <img src="{{ asset('frontend/assets/images/resource/man.png') }}" alt="ảnh nền">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>








<script type="text/javascript">
    var button = document.getElementById('myButton');
    button.addEventListener('click', function() {
    var link = this.getAttribute('data-link');
    window.open(link, '_blank');
    });
</script>
@endsection