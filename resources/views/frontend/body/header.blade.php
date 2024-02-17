   @php
 $setting = App\Models\SiteSetting::find(1);
  @endphp

<!-- mouse-pointer -->
        <div class="mouse-pointer" id="mouse-pointer">
            <div class="icon"><i class="icon-06"></i><i class="icon-05"></i></div>
        </div>
        <!-- mouse-pointer end -->

        <!-- preloader -->
        <div class="loader-wrap">
            <div class="hendel__preloder">
                <div class="preloader">
                    <div class="preloader-ring">LA DIGITAL TOP</div>    
                    <div class="preloader-ring">LA DIGITAL TOP</div>
                </div>
            </div>
        </div>
        <!-- preloader end -->

        <!-- main header -->
        <header class="main-header header__style__one ">
            <!-- header-top-one -->
            <div class="header-top-one">
                <div class="auto-container">
                    <div class="top__inner">
                        <div class="top__hrader__left">
                            <ul>
                                <li><span>Hotline :</span>  {{ $setting->phone_one }}{{ $setting->phone_two != NULL ? ' - ' . $setting->phone_two : '' }}</li>
                                <li>/</li>
                                <li><span>Email :</span> {{ $setting->email != NULL ? $setting->email : '' }}</li>
                            </ul>
                        </div>
                        <div class="top__hrader__right">
                            <ul>
                                <li><i class="icon-10"></i></li>
                                <li><i class="icon-14"></i></li>
                                <li><i class="icon-01"></i></li>
                                <li><i class="icon-11"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
             <!-- header-lower -->
            <div class="header-lower">
                <div class="auto-container">
                    <div class="outer-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="{{ url('/') }}"><img src="{{ asset($setting->logo) }}" alt="logo"></a></figure>
                        </div>
                        <div class="menu-area clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix home-menu">

                                      <li><a href="{{ url('/') }}">Home</a>
                                        </li>
                                        <li><a href="{{ route('thietke') }}">Thiết Kế Website  </a></li>
                                       
                                        <li><a href="{{ route('dichvu') }}">Dịch Vụ Seo</a></li> 
                                        <li class="dropdown"><a href="#">Quảng cáo ADS</a>
                                            <ul>
                                                <li><a href="{{ route('qcgoole') }}">Chạy Google Ads</a></li>
                                                <li><a href="{{ route('qcfb') }}">Chạy Facebook Ads</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#">Viết Nội Dung</a>
                                            <ul>
                                                <li><a href="{{ route('fanpage') }}">Chăm Sóc Fanpge</a></li>
                                                <li><a href="{{ route('csweb') }}">Chăm Sóc Website</a></li>
                                            </ul>
                                        </li> 


                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="btn-box">
                          
                        </div>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="outer-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="{{ url('/') }}"><img src="{{ asset($setting->logo) }}" alt="logo"></a></figure>
                        </div>
                        <div class="menu-area clearfix">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                        <div class="btn-box">
                           
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="icon-fa-times"></i></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="{{ url('/') }}"><img src="{{ asset($setting->logo) }}" alt="logo"></a></div>
                <div class="menu-outer"></div>
                <div class="contact-info">
                    <h4>Liên hệ</h4>
                    <ul>
                        <li>{{ $setting->phone_one }}{{ $setting->phone_two != NULL ? ' - ' . $setting->phone_two : '' }}</li>
                        <li>{{ $setting->email != NULL ? $setting->email : '' }}</li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End Mobile Menu -->