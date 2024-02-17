<!DOCTYPE html>
<html lang="vi">
@php
$setting = App\Models\SiteSetting::find(1);
@endphp
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="keywords" content="@yield('keyword')" />
<meta name="description" content="@yield('meta_description')" />
<link rel="canonical" href="{{ url()->current() }}"/>
@if($setting->google_analytic != NULL)
<script>
    {{ $setting->google_analytic }}
</script>
@endif
<title>@yield('title')</title>
@if($setting->pixel_facebook != NULL)
<script>
    {{ $setting->pixel_facebook }}
</script>
@endif
<meta content="index,follow" name="googlebot" />
<meta name="copyright" content="© Ladigitop" />
<meta name="robots" content="INDEX,FOLLOW"/>
<meta name="DC.title" lang="vi" content="@yield('title')" />
<meta name="DC.creator" content="ladigitop" />
<meta name="DCTERMS.issued" scheme="DCTERMS.W3CDTF" content="{{ now()->toW3cString() }}" />
<meta name="DC.identifier" scheme="DCTERMS.URI" content="{{ url()->current() }}" />
<link rel="DCTERMS.replaces" hreflang="vi" href="{{ url()->current() }}" />
<meta name="DCTERMS.abstract" content="@yield('meta_description')" />
<meta name="DC.format" scheme="DCTERMS.IMT" content="text/html" />
<meta name="DC.type" scheme="DCTERMS.DCMIType" content="Text" />
<meta property="og:title" content="@yield('title')" />
<meta property="og:description" content="@yield('meta_description')" />
<meta property="og:type" content="article" />
<meta property="og:image" content="@yield('meta_img')" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="">
<meta name="twitter:title" content="@yield('title')">
<meta name="twitter:description" content="@yield('meta_description')">
<link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.png') }}" type="image/x-icon">
<link rel="icon" href="{{ asset('frontend/assets/images/favicon.png') }}" type="image/x-icon">
@stack('scripts')
<!-- Stylesheets -->
<link href="{{ asset('frontend/assets/css/flaticon.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/owl.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/color.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/global.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/swiper.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/responsive.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

</head>

<!-- page wrapper -->
<body>
    <div class="boxed_wrapper">
        @include('frontend.body.header')
        @yield('content')        
        @include('frontend.body.footer')
    </div>


    <!-- jequery plugins -->
    <script src="{{ asset('frontend/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/appear.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/parallax-scroll.js') }}"></script>


    <!-- main-js -->
    <script src="{{ asset('frontend/assets/js/script.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
     @if(Session::has('message'))
     var type = "{{ Session::get('alert-type','info') }}"
     switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;

        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;

        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;

        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break; 
     }
     @endif 
    </script>
    <script>
    $(document).ready(function() {
        // Hiệu ứng show/hide cho TOC
        $('#tdtoc').click(function() {
            $('.toc-list').slideToggle();
            $('#tdtoc>i').toggleClass('quay')
        });
        $('.toc-list>li>a').click(function(event) {
        // Ngăn chặn hành vi mặc định của thẻ <a>
            event.preventDefault();
            
            // Lấy giá trị của thuộc tính href của thẻ <a>
            var target = $(this).attr('href');
            
            // Cuộn đến phần tử có id tương ứng với giá trị href của thẻ <a>
            $('html, body').animate({
                scrollTop: $(target).offset().top
            }, 400); // Thời gian cuộn (milliseconds)
        });

       
    });

       
 
</script>
</body><!-- End of .page_wrapper -->
</html>
