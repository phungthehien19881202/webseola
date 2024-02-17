@extends('frontend.main_master')
@section('content')

<section class="page__title p_relative">
    <div class="bg-layer" style="background-image:url({{ asset('frontend/assets/images/resource/page-title-bg.jpg') }})"></div>
    <div class="auto-container">
        <div class="content__box p_relative">
            <ul class="bread__crumb">
                <li><a href="{{ url('/') }}">Home </a></li>
                <li> <span> -</span>{{ $categories->category_name_vn }} </li>
            </ul>
            <h1 class="title">{{ $categories->category_name_vn }}</h1>
        </div>
    </div>
</section>


<div class="project__page p_relative see__pad">
    <div class="row">
		@foreach($products as $product)
        <div class="col-lg-3 col-md-6 col-6">
            <div class="portfolio__block p_relative">
                <div class="portfolio__image">
                    <figure>
                        <img src="{{ asset($product->product_thambnail) }}" alt="{{ $product->product_name }}">
                    </figure>
                </div>
                <div class="lower__content p_absolute">
                    <div class="protfolio__text">
                        <div class="text__block">
                            <h4>{{ $product->product_name }}</h4>
                        </div>
                        <div class="text__block_two">
                           
                        </div>
                    </div>
                    <div class="protfolio__button">
                        <a href="{{ url($categories->category_slug_vn.'/'.$product->product_slug.'/sp/'.$product->id ) }}" class="theme-btn theme-btn-one"> Xem chi tiết<i class="icon-02"></i></a>
                    </div>
                </div>
            </div>
        </div>
         @endforeach
    </div>
    {{ $products->links('pagination.custom') }}
</div>
<div class="auto-container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="service__center">
                {!! $categories->category_content !!}
                
            </div>
        </div>
    </div>
</div>
@endsection