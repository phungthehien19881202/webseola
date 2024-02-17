@extends('frontend.main_master')
@section('title','LADIGITOP chuyên cung cấp các dịch vụ digital marketing')
@section('keyword','ladigitop,marketing')
@section('meta_description','Công ty LADIGITOP chuyên cung cấp các dịch vụ về digital marketing như seo, chạy quảng cáo google, facebook, thiết kế web, viết content chăm sóc web.')
@section('meta_img',asset('frontend/assets/images/ladigitop-logo.png'))
 @php
 $setting = App\Models\SiteSetting::find(1);
  @endphp
@push('scripts')
<script type="application/ld+json">{
        "@context": "http://schema.org",
        "@type": "LocalBusiness",
        "@id":"{{ url()->current() }}",
        "url": "{{ url()->current() }}",
        "additionaltype": ["https://en.wikipedia.org/wiki/Swimsuit","https://vi.wikipedia.org/wiki/%C4%90%E1%BB%93_b%C6%A1i"],
        "logo": "{{ asset('frontend/assets/images/ladigitop-logo.png') }}",
        "image":"{{ asset('frontend/assets/images/ladigitop-logo.png') }}",
        "priceRange":"1,000,000 vnđ - 1,800,000 vnđ",
        "hasMap": "https://www.google.com/maps/place/229+P.+Mi%E1%BA%BFu+Hai+X%C3%A3,+D%C6%B0+H%C3%A0ng,+L%C3%AA+Ch%C3%A2n,+H%E1%BA%A3i+Ph%C3%B2ng+180000,+Vietnam/@20.8412752,106.6766536,17z/data=!3m1!4b1!4m6!3m5!1s0x314a7a872081ff25:0x2e43d1fba9dfaa19!8m2!3d20.8412702!4d106.6792285!16s%2Fg%2F11nfs7ny33?entry=ttu", 
        "email": "mailto:{{ $setting->email != NULL ? $setting->email : '' }}",
        "hasOfferCatalog":  {
        "@type": "OfferCatalog",
        "itemListElement": 
        [{"@type":"Offer","itemOffered":"Product","name":"catelogy name","url":"catelogy-name.html"}]    },

    "address": {
    "@type": "PostalAddress",
    "addressLocality": "Lê Chân",
    "addressCountry": "VIỆT NAM",
    "addressRegion": "Hải Phòng",
    "postalCode":"180000",
    "streetAddress": "Cty TNHH Digital Marketing Ladigitop <br> 202 Miếu Hai Xã, Lê Chân, Tp Hải Phòng"
},

"description": "Công ty LADIGITOP chuyên cung cấp các dịch vụ về digital marketing như seo, chạy quảng cáo google, facebook, thiết kế web, viết content chăm sóc web.",
"name": "LADIGITOP chuyên cung cấp các dịch vụ digital marketing",
"telephone": "{{ $setting->phone_one }}",
"geo": {
"@type": "GeoCoordinates",
"latitude": 20.8412752,
"longitude": 106.6766536
},

"openingHoursSpecification": [{
"@type": "OpeningHoursSpecification",
"dayOfWeek": [
"Monday",
"Wednesday",
"Tuesday",
"Thursday",
"Friday"
],

"opens": "08:30",
"closes": "21:00"
},{

"@type": "OpeningHoursSpecification",
"dayOfWeek": [
"Saturday",
"Sunday"

],

"opens": "08:30",
"closes": "22:00"

}],

"sameAs": [
"https://www.facebook.com/ladigitop/",
"https://www.instagram.com/ladigitop/"
]
}

</script>
@endpush

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
                            <h4>Chiến lược tiên tiến</h4>
                        </div>
                        <div class="banner__title">
                            <h1>Digital Marketing<span>LADIGITOP</span> </h1>
                        </div>
                        <div class="text">
                            <p>Bộ dịch vụ toàn diện của chúng tôi được thiết kế để nâng sự hiện diện trực tuyến của bạn lên một tầm cao mới. </p>
                        </div>
                        <div class="btn-box">
                            <a href="javascript:0" class="theme-btn theme-btn-one"><i class="icon-02"></i> {{ $setting->phone_one }}{{ $setting->phone_two != NULL ? ' - ' . $setting->phone_two : '' }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-4 col-md-12 ">
                    <div class="banner__right p_relative">
                        <div class="image__one">
                            <figure class="image-box wow slideInUp animated animated animated animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="visibility: visible;">
                                <img src="{{ asset('frontend/assets/images/banner/banner-01.png') }}" alt="ladigitop">
                            </figure>
                        </div>
                        <div class="icon__image__banner">
                            <div class="circle-main">
                                <div class="circle">
                                    <img src="{{ asset('frontend/assets/images/resource/02.png') }}" alt="ladigitop">
                                    <div class="round-text">
                                        <div class="text_1">
                                            <p class="text_2">  Kinh nghiệm  Dự án thực tế</p>
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
                    <h4>Xu hướng tương lai</h4>
                </div>
                <div class="title">
                    <h2>Dịch vụ cốt lõi</h2>
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
                            <h4><a href="{{ route('dichvu') }}">Dịch vụ seo</a></h4>
                            <p>Tối ưu hóa sự hiện diện trực tuyến của bạn thông qua các kỹ thuật SEO chiến lược.</p>
                        </div>
                        <div class="service__button">
                            <a href="{{ route('dichvu') }}"><i class="icon-05"></i></a>
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
                            <h4><a href="{{ route('thietke') }}">Thiết kế webiste</a></h4>
                            <p>Tạo các trang web thân thiện với người dùng và hấp dẫn trực quan, đạt tiêu chuẩn của Google.</p>
                        </div>
                        <div class="service__button">
                            <a href="{{ route('thietke') }}"><i class="icon-05"></i></a>
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
                            <h4><a href="{{ route('fanpage') }}">Viết content</a></h4>
                            <p>Chuyên tạo nội dung Fanpage và Website giúp bạn tiếp cận đối tượng của mình một cách hiệu quả.</p>
                        </div>
                        <div class="service__button">
                            <a href="{{ route('csweb') }}"><i class="icon-05"></i></a>
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
        <h1>Ladigitop</h1>
    </div>
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="about__block p_relative">
                    <figure class="wow zoomIn animated" data-wow-delay="100ms" data-wow-duration="1500ms">
                        <img src="{{ asset('frontend/assets/images/resource/about-us.png') }}" alt="ladigitop">
                    </figure>
                    <div class="funfact__content about" style="background-image: url({{ asset('frontend/assets/images/shapes/shape-01.png') }});">
                        <div class="count-outer count-box">
                            <h1 class="count-text" data-speed="1500" data-stop="2">0</h1>
                            <span>00+</span>
                        </div>
                        <p>Khách hàng</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-5 col-md-12">
                <div class="about__text__block">
                    <div class="sub__title">
                        <h4>Mục tiêu của chúng tôi</h4>
                    </div>
                    <div class="title two">
                        <h2>Thu hút nhiều khách hàng hơn và cuối cùng là  <span>tăng doanh thu của bạn</span></h2>
                    </div>
                    <div class="texts">
                        <p>Tại LADIGITOP, trọng tâm của chúng tôi mở rộng ra ngoài các dịch vụ cốt lõi để bao gồm các giải pháp tiếp thị kỹ thuật số toàn diện được thiết kế để nâng cao sự hiện diện trực tuyến của bạn và thúc đẩy tăng trưởng kinh doanh.</p>
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
                            <img src="{{ asset('frontend/assets/images/resource/choose-01.png') }}" alt="ladigitop">
                        </figure>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="choose__block__right">
                        <div class="title__data">
                            <div class="sub__title">
                                <h4>Tại sao nên chọn Ladigitop</h4>
                            </div>
                            <div class="title">
                                <h2>Cách mạng hóa chuyển đổi kỹ thuật số của bạn </h2>
                            </div>
                        </div>
                        <div class="team__data">
                            <div class="team__data__left">
                                <img src="{{ asset('frontend/assets/images/resource/choose-02.svg') }}" alt="ladigitop">
                            </div>
                            <div class="team__data__right">
                                <h3>Khác biệt so với các công ty tiếp thị kỹ thuật số khác</h3>
                                <p>Khi tìm kiếm một đại lý tiếp thị kỹ thuật số có sự đổi mới và sáng tạo chưa từng có, bạn muốn một đại lý vượt qua các ranh giới, tạo ra các chiến lược độc đáo và mang lại kết quả nổi bật.</p>
                            </div>
                        </div>
                        <div class="team__data">
                            <div class="team__data__left">
                                <img src="{{ asset('frontend/assets/images/resource/choose-02.svg') }}" alt="ladigitop">
                            </div>
                            <div class="team__data__right">
                                <h3>Luôn cập nhật các xu hướng và thay đổi mới nhất</h3>
                                <p>Luôn cập nhật những xu hướng và thay đổi mới nhất trong tiếp thị kỹ thuật số, thường xuyên tham dự các hội nghị trong ngành để nắm bắt.</p>
                            </div>
                        </div>
                        <div class="team__data three">
                            <div class="team__data__left">
                                <img src="{{ asset('frontend/assets/images/resource/choose-02.svg') }}" alt="ladigitop">
                            </div>
                            <div class="team__data__right">
                                <h3>Phù hợp với nhu cầu và mục tiêu của khách hàng cá nhân</h3>
                                <p>Nhóm của chúng tôi sẽ hợp tác chặt chẽ với bạn để hiểu các yêu cầu cụ thể của bạn và tạo ra các chiến lược phù hợp với mục tiêu của bạn.</p>
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
                <h4>Đội ngũ</h4>
            </div>
            <div class="title">
                <h2>Ladigitop sở hữu các chuyên gia</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="team__block wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="team__img">
                        <figure>
                            <img src="{{ asset('frontend/assets/images/resource/team-01.png') }}" alt="ladigitop">
                        </figure>
                    </div>
                    <div class="team__name">
                        <h3>Chuyên gia IT</h3>
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
                            <img src="{{ asset('frontend/assets/images/resource/team-02.png') }}" alt="ladigitop">
                        </figure>
                    </div>
                    <div class="team__name">
                        <h3>Chuyên gia ADS</h3>
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
                            <img src="{{ asset('frontend/assets/images/resource/team-03.png') }}" alt="ladigitop">
                        </figure>
                    </div>
                    <div class="team__name">
                        <h3>Đội content</h3>
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
                            <img src="{{ asset('frontend/assets/images/resource/team-04.png') }}" alt="ladigitop">
                        </figure>
                    </div>
                    <div class="team__name">
                        <h3>Design Ảnh</h3>
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
                                <h4>Kho giao diện web phong phú</h4>
                            </div>
                            <div class="title">
                                <h2>Đa dạng ngành nghề <br> với hơn 300 giao diện web đủ lĩnh vực</h2>
                            </div>
                        </div>
                        <div class="btn-box">
                            <a href="{{ url('giao-dien-web/c') }}" class="theme-btn theme-btn-one"><i class="icon-02"></i> Xem toàn bộ giao diện</a>
                        </div>
                        
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-4 col-md-12">
                        <div class="funfact__data">
                            <div class="funfact__content one">
                                <div class="count-outer count-box">
                                    <span>+</span>
                                    <h1 class="count-text" data-speed="1500" data-stop="100"></h1>
                                    <span class="two"></span>
                                </div>
                                <p> Lĩnh vực bán hàng</p>
                            </div>
                            <div class="funfact__content two">
                                <div class="count-outer count-box">
                                    <span>+</span>
                                    <h1 class="count-text" data-speed="1500" data-stop="100">0</h1>
                                    <span class="two"></span>
                                </div>
                                <p>Bất động sản</p>
                            </div>
                            <div class="funfact__content three">
                                <div class="count-outer count-box">
                                    <span>+</span>
                                    <h1 class="count-text" data-speed="1500" data-stop="100">0</h1>
                                    <span class="two"></span>
                                </div>
                                <p>Ngành nghề dịch vụ</p>
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
                    <h4>Câu hỏi</h4>
                </div>
                <div class="title">
                    <h2>Thắc mắc thường gặp của khách hàng</h2>
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
                            <img src="frontend/assets/images/resource/author-01.png" alt="ladigitop">
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
                        <p>LADIGITOP khác biệt như thế nào so với các công ty tiếp thị khác trong ngành?</p>
                    </div>
                    <div class="testimonials__text">
                        <p>Bạn sẽ trải nghiệm các giải pháp phù hợp, kỹ thuật tiên tiến và đội ngũ tận tâm đặt mục tiêu kinh doanh của bạn lên hàng đầu trong mọi chiến dịch.</p>
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
                            <img src="frontend/assets/images/resource/author-01.png" alt="ladigitop">
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
                        <p>Có thể tùy chỉnh kế hoạch tiếp thị của mình với LADIGITOP để phù hợp với nhu cầu và mục tiêu cụ thể không?</p>
                    </div>
                    <div class="testimonials__text">
                        <p>Có, bạn có thể tùy chỉnh kế hoạch tiếp thị của mình với LADIGITOP để phù hợp với nhu cầu và mục tiêu riêng của bạn.</p>
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
                            <img src="frontend/assets/images/resource/author-01.png" alt="ladigitop">
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
                        <p>LADIGITOP xử lý khiếu nại và phản hồi của khách hàng như thế nào để cải thiện dịch vụ của họ?</p>
                    </div>
                    <div class="testimonials__text">
                        <p>Khi bạn đưa ra phản hồi hoặc khiếu nại, Ladigitop sẽ xử lý kịp thời, phân tích để nâng cao dịch vụ. Ý kiến của bạn rất quan trọng, giúp định hình những cải tiến.</p>
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
                            <img src="frontend/assets/images/resource/author-01.png" alt="ladigitop">
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
                        <p>Các chiến lược tiếp thị cụ thể được LADIGITOP sử dụng để thu hút và giữ chân khách hàng là gì?</p>
                    </div>
                    <div class="testimonials__text">
                        <p>- Các chiến dịch truyền thông xã hội được nhắm mục tiêu- Tiếp thị qua email được cá nhân hóa- Các chương trình lòng trung thành</p>
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



@endsection