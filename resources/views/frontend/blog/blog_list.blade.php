@extends('frontend.main_master')
@section('content')
<section class="page__title p_relative">
    <div class="bg-layer" style="background-image:url({{ asset('frontend/assets/images/resource/page-title-bg.jpg') }})"></div>
    <div class="auto-container">
        <div class="content__box p_relative">
            <ul class="bread__crumb">
                <li><a href="{{ url('/') }}">Home </a></li>
                <li> <span> -</span>{{ $blogcategory->blog_category_name }} </li>
            </ul>
            <h1 class="title">{{ $blogcategory->blog_category_name }}</h1>
        </div>
    </div>
</section>

<!-- blog-page -->
<div class="blog__page p_relative see__pad">
    <div class="auto-container">
        <div class="row">

        	@foreach($blogposts as $blogpost)
            <div class="col-lg-4 col-md-6 col-sm-12 news__block">
                <div class="news___block wow slideInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="visibility: visible;">
                    <div class="inner-box p_relative">
                        <div class="image-box p_relative d_block">
                            <figure class="image p_relative d_block">
                                <a href="{{ url($blogpost->post_slug).'.html' }}"><img src="{{ asset($blogpost->post_image) }}" alt="{{ $blogpost->post_title }}"></a>
                            </figure>
                            <div class="post__date">
                                <ul>
                                    <li> <i class="icon-15"></i>{{ $blogpost->created_at->format('d-m-Y') }}</li>
                                    <li class="two"></li>
                                    <li><i class="icon-09"></i> Admin</li>
                                </ul>
                            </div>
                        </div>
                        <div class="lower___content p_relative">
                            <h4><a href="{{ url($blogpost->post_slug).'.html' }}">{{ $blogpost->post_title }}</a></h4>
                            
                            <div class="btn__box__two">
                                <a href="{{ url($blogpost->post_slug).'.html' }}" class="theme__btn__two"><i class="icon-02"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
         {{ $blogposts->links('pagination.custom') }}
    </div>
</div>

@endsection