@extends('frontend.main_master')

@section('content')
<!-- banner-one -->
<section class="banner__one ">
    <div class="pattern-layer">
        <div class="banner__icon pattern-1 p_absolute" data-parallax='{"x": 100}' style="background-image: url({{ asset('frontend/assets/images/banner/banner-shap-01.png') }});"></div>
    </div>
    <div class="banner__data p_relative">
        <div class="banner__bg" style="background-image: url({{ asset('frontend/assets/images/banner/banner-bg.png') }});"></div>
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="banner__left">
                        <div class="sub__title">
                            <h4>Better Future</h4>
                        </div>
                        <div class="banner__title">
                            <h1>Advancing with <span>Technology</span> </h1>
                        </div>
                        <div class="text">
                            <p>Providing legal advice, contract drafting, compliance assistance, intellectual property protection, and other legal support for businesses. </p>
                        </div>
                        <div class="btn-box">
                            <a href="contact.html" class="theme-btn theme-btn-one"><i class="icon-02"></i> Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-4 col-md-12 ">
                    <div class="banner__right p_relative">
                        <div class="image__one">
                            <figure class="image-box wow slideInUp animated animated animated animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="visibility: visible;">
                                <img src="{{ asset('frontend/assets/images/banner/banner-01.png') }}" alt="">
                            </figure>
                        </div>
                        <div class="icon__image__banner">
                            <div class="circle-main">
                                <div class="circle">
                                    <img src="{{ asset('frontend/assets/images/resource/02.png') }}" alt="">
                                    <div class="round-text">
                                        <div class="text_1">
                                            <p class="text_2">years experience  years experience</p>
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
</section>
<!-- banner-one end -->

<!-- service -->
<section class="service__section p_relative">
    <div class="auto-container">
        <div class="service__data">
            <div class="title__data">
                <div class="sub__title">
                    <h4>Better Future</h4>
                </div>
                <div class="title">
                    <h2>Explore Our Services</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="service__block">
                        <div class="service__icon">
                            <i class="icon-04"></i>
                            <div class="service__icon__two"></div>
                        </div>
                        <div class="service__text">
                            <h4><a href="service-details.html">SEO Marketing</a></h4>
                            <p>Providing legal advice, contract drafting, compliance assistance.</p>
                        </div>
                        <div class="service__button">
                            <a href="service-details.html"><i class="icon-05"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 wow fadeInUp animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="service__block">
                        <div class="service__icon">
                            <i class="icon-08"></i>
                            <div class="service__icon__two"></div>
                        </div>
                        <div class="service__text">
                            <h4><a href="service-details.html">UX / UI Design</a></h4>
                            <p>Providing legal advice, contract drafting, compliance assistance.</p>
                        </div>
                        <div class="service__button">
                            <a href="service-details.html"><i class="icon-05"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 wow fadeInUp animated" data-wow-delay="400ms" data-wow-duration="1500ms">
                    <div class="service__block">
                        <div class="service__icon">
                            <i class="icon-12"></i>
                            <div class="service__icon__two"></div>
                        </div>
                        <div class="service__text">
                            <h4><a href="service-details.html">Digital Marketing</a></h4>
                            <p>Providing legal advice, contract drafting, compliance assistance.</p>
                        </div>
                        <div class="service__button">
                            <a href="service-details.html"><i class="icon-05"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- service-end -->

<!-- about -->
<section class="about__section p_relative see__pad">
    <div class="pattern-layer">
        <div class="pattern-2 p_absolute" data-parallax='{"x": -50}' style="background-image: url({{ asset('frontend/assets/images/shapes/shape-02.png') }});"></div>
    </div>
    <div class="boild__text">
        <h1>DataMatrix</h1>
    </div>
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="about__block p_relative">
                    <figure class="wow zoomIn animated" data-wow-delay="100ms" data-wow-duration="1500ms">
                        <img src="{{ asset('frontend/assets/images/resource/about-us.png') }}" alt="">
                    </figure>
                    <div class="funfact__content about" style="background-image: url({{ asset('frontend/assets/images/shapes/shape-01.png') }});">
                        <div class="count-outer count-box">
                            <h1 class="count-text" data-speed="1500" data-stop="2">0</h1>
                            <span>K+</span>
                        </div>
                        <p>World wide Client</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-5 col-md-12">
                <div class="about__text__block">
                    <div class="sub__title">
                        <h4>About Company</h4>
                    </div>
                    <div class="title two">
                        <h2>Enhancing Real-world Experiences with AR <span>Technology</span>.</h2>
                    </div>
                    <div class="texts">
                        <p>The applications of AR are vast and diverse. From entertainment and gaming, where users can see virtual characters in their surroundings, to education, where complex subjects can be visualized and explained in an immersive way,.</p>
                    </div>
                    <div class="btn-box">
                        <a href="about.html" class="theme-btn theme-btn-one"><i class="icon-02"></i> About more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about-end -->

<!-- choose -->
<section class="choose__us p_relative">
    <div class="choose__us__data">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="choose__block">
                        <figure>
                            <img src="{{ asset('frontend/assets/images/resource/choose-01.png') }}" alt="">
                        </figure>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="choose__block__right">
                        <div class="title__data">
                            <div class="sub__title">
                                <h4>Why choose us</h4>
                            </div>
                            <div class="title">
                                <h2>We Provide Your Best Work </h2>
                            </div>
                        </div>
                        <div class="team__data">
                            <div class="team__data__left">
                                <img src="{{ asset('frontend/assets/images/resource/choose-02.svg') }}" alt="">
                            </div>
                            <div class="team__data__right">
                                <h3>Expert Team :</h3>
                                <p>Our dedicated team of technology professionals comprises experienced engineers, developers, and researchers who are passionate about pushing the boundaries of technology.</p>
                            </div>
                        </div>
                        <div class="team__data">
                            <div class="team__data__left">
                                <img src="{{ asset('frontend/assets/images/resource/choose-02.svg') }}" alt="">
                            </div>
                            <div class="team__data__right">
                                <h3>Expert Team :</h3>
                                <p>Our dedicated team of technology professionals comprises experienced engineers, developers, and researchers who are passionate about pushing the boundaries of technology.</p>
                            </div>
                        </div>
                        <div class="team__data three">
                            <div class="team__data__left">
                                <img src="{{ asset('frontend/assets/images/resource/choose-02.svg') }}" alt="">
                            </div>
                            <div class="team__data__right">
                                <h3>Expert Team :</h3>
                                <p>Our dedicated team of technology professionals comprises experienced engineers, developers, and researchers who are passionate about pushing the boundaries of technology.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- choose-end -->

<!-- team-section -->
<section class="team__section see__pad p_relative">
    <div class="pattern-layer">
        <div class="pattern-3 p_absolute" data-parallax='{"y": 50}' style="background-image: url({{ asset('frontend/assets/images/shapes/shape-03.png') }});"></div>
    </div>
    <div class="auto-container">
        <div class="title__data">
            <div class="sub__title">
                <h4>Team Members</h4>
            </div>
            <div class="title">
                <h2>We Have Expert Member</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="team__block wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="team__img">
                        <figure>
                            <img src="{{ asset('frontend/assets/images/resource/team-01.png') }}" alt="">
                        </figure>
                    </div>
                    <div class="team__name">
                        <h3>Annette Black</h3>
                    </div>
                    <div class="team__media">
                        <ul>
                            <li><a href="#">FB.</a></li>
                            <li><a href="#">TW.</a></li>
                            <li><a href="#">LI</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="team__block wow fadeInUp animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="team__img">
                        <figure>
                            <img src="{{ asset('frontend/assets/images/resource/team-02.png') }}" alt="">
                        </figure>
                    </div>
                    <div class="team__name">
                        <h3>Kristin Watson</h3>
                    </div>
                    <div class="team__media">
                        <ul>
                            <li><a href="#">FB.</a></li>
                            <li><a href="#">TW.</a></li>
                            <li><a href="#">LI</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="team__block wow fadeInUp animated" data-wow-delay="400ms" data-wow-duration="1500ms">
                    <div class="team__img">
                        <figure>
                            <img src="{{ asset('frontend/assets/images/resource/team-03.png') }}" alt="">
                        </figure>
                    </div>
                    <div class="team__name">
                        <h3>Devon Lane</h3>
                    </div>
                    <div class="team__media">
                        <ul>
                            <li><a href="#">FB.</a></li>
                            <li><a href="#">TW.</a></li>
                            <li><a href="#">LI</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="team__block wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="team__img">
                        <figure>
                            <img src="{{ asset('frontend/assets/images/resource/team-04.png') }}" alt="">
                        </figure>
                    </div>
                    <div class="team__name">
                        <h3>Kristin Watson</h3>
                    </div>
                    <div class="team__media">
                        <ul>
                            <li><a href="#">FB.</a></li>
                            <li><a href="#">TW.</a></li>
                            <li><a href="#">LI</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accomplised__section">
        <div class="auto-container">
            <div class="accomplised__data p_relative">
                <div class="pattern-layer">
                    <div class="pattern-4 p_absolute" data-parallax='{"x": 100}' style="background-image: url(frontend/assets/images/shapes/shape-04.png);"></div>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-md-12">
                        <div class="title__data">
                            <div class="sub__title">
                                <h4>What we've accomplised</h4>
                            </div>
                            <div class="title">
                                <h2>We pride ourselves on <br> our excellent support <br> and servic</h2>
                            </div>
                        </div>
                        <div class="btn-box">
                            <a href="contact.html" class="theme-btn theme-btn-one"><i class="icon-02"></i> Contact Us</a>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-4 col-md-12">
                        <div class="funfact__data">
                            <div class="funfact__content one">
                                <div class="count-outer count-box">
                                    <span>+</span>
                                    <h1 class="count-text" data-speed="1500" data-stop="4.9">0</h1>
                                    <span class="two">*</span>
                                </div>
                                <p> Customer Satisfaction</p>
                            </div>
                            <div class="funfact__content two">
                                <div class="count-outer count-box">
                                    <span>+</span>
                                    <h1 class="count-text" data-speed="1500" data-stop="4.9">0</h1>
                                    <span class="two">k</span>
                                </div>
                                <p>Active our Members</p>
                            </div>
                            <div class="funfact__content three">
                                <div class="count-outer count-box">
                                    <span>+</span>
                                    <h1 class="count-text" data-speed="1500" data-stop="30">0</h1>
                                    <span class="two">%</span>
                                </div>
                                <p>Same day resolution</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- team-section-end -->

<!-- testimonial-section -->
<section class="testimonial__section p_relative">
    <div class="auto-container">
        <div class="testimonial__top">
            <div class="title__data">
                <div class="sub__title">
                    <h4>Testimonial </h4>
                </div>
                <div class="title">
                    <h2>What Our Client Says</h2>
                </div>
            </div>
            <div class="swiper__button">
                <div class="button_next"><i class="icon-06"></i></div>
                <div class="button_prev"><i class="icon-05"></i></div>
            </div>
        </div>
    </div>
    <div class="swiper-container two-item-carousel">
        <div class="swiper-wrapper">
            <div class="swiper-slide testimonials__block__one">
                <div class="test__bg"></div>
                <div class="testimonials__info">
                    <div class="authore__img">
                        <figure class="image">
                            <img src="frontend/assets/images/resource/author-01.png" alt="">
                        </figure>
                    </div>
                    <div class="authore__rating">
                        <ul>
                            <li><i class="icon-13"></i></li>
                            <li><i class="icon-13"></i></li>
                            <li><i class="icon-13"></i></li>
                            <li><i class="icon-13"></i></li>
                            <li><i class="icon-13"></i></li>
                        </ul>
                    </div>
                    <div class="authore__info">
                        <h5>Wade Warren</h5>
                        <p>Manager</p>
                    </div>
                    <div class="testimonials__text">
                        <p>Our technologies are designed to seamlessly integrate with your existing systems, minimizing disruption and maximizing productivity.</p>
                    </div>
                </div>
                <div class="quote">
                    <span class="icon-03"></span>
                </div>
            </div>
            <div class="swiper-slide testimonials__block__one">
                <div class="test__bg"></div>
                <div class="testimonials__info">
                    <div class="authore__img">
                        <figure class="image">
                            <img src="frontend/assets/images/resource/author-02.png" alt="">
                        </figure>
                    </div>
                    <div class="authore__rating">
                        <ul>
                            <li><i class="icon-13"></i></li>
                            <li><i class="icon-13"></i></li>
                            <li><i class="icon-13"></i></li>
                            <li><i class="icon-13"></i></li>
                            <li><i class="icon-13"></i></li>
                        </ul>
                    </div>
                    <div class="authore__info">
                        <h5>Robert Fox</h5>
                        <p>Technology</p>
                    </div>
                    <div class="testimonials__text">
                        <p>Our technologies are designed to seamlessly integrate with your existing systems, minimizing disruption and maximizing productivity.</p>
                    </div>
                </div>
                <div class="quote">
                    <span class="icon-03"></span>
                </div>
            </div>
            <div class="swiper-slide testimonials__block__one">
                <div class="test__bg"></div>
                <div class="testimonials__info">
                    <div class="authore__img">
                        <figure class="image">
                            <img src="frontend/assets/images/resource/author-03.png" alt="">
                        </figure>
                    </div>
                    <div class="authore__rating">
                        <ul>
                            <li><i class="icon-13"></i></li>
                            <li><i class="icon-13"></i></li>
                            <li><i class="icon-13"></i></li>
                            <li><i class="icon-13"></i></li>
                            <li><i class="icon-13"></i></li>
                        </ul>
                    </div>
                    <div class="authore__info">
                        <h5>Eleanor Pena</h5>
                        <p>CTO</p>
                    </div>
                    <div class="testimonials__text">
                        <p>Our technologies are designed to seamlessly integrate with your existing systems, minimizing disruption and maximizing productivity.</p>
                    </div>
                </div>
                <div class="quote">
                    <span class="icon-03"></span>
                </div>
            </div>
            <div class="swiper-slide testimonials__block__one">
                <div class="test__bg"></div>
                <div class="testimonials__info">
                    <div class="authore__img">
                        <figure class="image">
                            <img src="frontend/assets/images/resource/author-04.png" alt="">
                        </figure>
                    </div>
                    <div class="authore__rating">
                        <ul>
                            <li><i class="icon-13"></i></li>
                            <li><i class="icon-13"></i></li>
                            <li><i class="icon-13"></i></li>
                            <li><i class="icon-13"></i></li>
                            <li><i class="icon-13"></i></li>
                        </ul>
                    </div>
                    <div class="authore__info">
                        <h5>JGuy Hawkins</h5>
                        <p>Ex CTO</p>
                    </div>
                    <div class="testimonials__text">
                        <p>Our technologies are designed to seamlessly integrate with your existing systems, minimizing disruption and maximizing productivity.</p>
                    </div>
                </div>
                <div class="quote">
                    <span class="icon-03"></span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- testimonial-section-end -->

<!-- brand-section -->
<div class="brand__section p_relative see__pad">
    <div class="pattern-layer">
        <div class="pattern-3 p_absolute" data-parallax='{"y": -50}' style="background-image: url(frontend/assets/images/shapes/shape-05.png);"></div>
    </div>
    <div class="brand-carousel owl-carousel owl-theme  nav-style-one owl-loaded owl-drag">
        <div class="brand__content">
            <div class="brand__name">
                <h1>IT Services *</h1>
            </div>
        </div>
        <div class="brand__content">
            <div class="brand__name">
                <h1>Development *</h1>
            </div>
        </div>
        <div class="brand__content">
            <div class="brand__name">
                <h1>Technology *</h1>
            </div>
        </div>
        <div class="brand__content">
            <div class="brand__name">
                <h1>IT Services *</h1>
            </div>
        </div>
    </div>
</div>
<!-- brand-section-end -->

<!-- blog-section -->
<section class="blog__section see__pad p_relative">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="title__data">
                    <div class="sub__title">
                        <h4>Latest News </h4>
                    </div>
                    <div class="title">
                        <h2>Learn From Blog</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="normaol__text">
                    <p>Our dedicated team of technology professionals comprises experienced engineers, developers, and researchers who are passionate about pushing the boundaries of technology.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 news__block">
                <div class="news___block wow slideInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="visibility: visible;">
                    <div class="inner-box p_relative">
                        <div class="image-box p_relative d_block">
                            <figure class="image p_relative d_block">
                                <a href="blog-details.html"><img src="frontend/assets/images/news/news-1.jpg" alt=""></a>
                            </figure>
                            <div class="post__date">
                                <ul>
                                    <li> <i class="icon-15"></i>26 July 2023</li>
                                    <li class="two"></li>
                                    <li><i class="icon-09"></i> Admin</li>
                                </ul>
                            </div>
                        </div>
                        <div class="lower___content p_relative">
                            <h4><a href="blog-details.html">4 Cybersecurity Takeaways from China’s Largest Data Breach</a></h4>
                            
                            <div class="btn__box__two">
                                <a href="blog-details.html" class="theme__btn__two"><i class="icon-02"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 news__block">
                <div class="news___block wow slideInUp animated animated" data-wow-delay="200ms" data-wow-duration="1500ms" style="visibility: visible;">
                    <div class="inner-box p_relative">
                        <div class="image-box p_relative d_block">
                            <figure class="image p_relative d_block">
                                <a href="blog-details.html"><img src="frontend/assets/images/news/news-2.jpg" alt=""></a>
                            </figure>
                            <div class="post__date">
                                <ul>
                                    <li> <i class="icon-15"></i>26 July 2023</li>
                                    <li class="two"></li>
                                    <li><i class="icon-09"></i> Admin</li>
                                </ul>
                            </div>
                        </div>
                        <div class="lower___content p_relative">
                            <h4><a href="blog-details.html">4 Cybersecurity Takeaways from China’s Largest Data Breach</a></h4>
                            
                            <div class="btn__box__two">
                                <a href="blog-details.html" class="theme__btn__two"><i class="icon-02"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 news__block">
                <div class="news___block wow slideInUp animated animated" data-wow-delay="400ms" data-wow-duration="1500ms" style="visibility: visible;">
                    <div class="inner-box p_relative">
                        <div class="image-box p_relative d_block">
                            <figure class="image p_relative d_block">
                                <a href="blog-details.html"><img src="frontend/assets/images/news/news-3.jpg" alt=""></a>
                            </figure>
                            <div class="post__date">
                                <ul>
                                    <li> <i class="icon-15"></i>26 July 2023</li>
                                    <li class="two"></li>
                                    <li><i class="icon-09"></i> Admin</li>
                                </ul>
                            </div>
                        </div>
                        <div class="lower___content p_relative">
                            <h4><a href="blog-details.html">4 Cybersecurity Takeaways from China’s Largest Data Breach</a></h4>
                            
                            <div class="btn__box__two">
                                <a href="blog-details.html" class="theme__btn__two"><i class="icon-02"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog-section-end -->

@endsection