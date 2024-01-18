  <!-- mouse-pointer -->
        <div class="mouse-pointer" id="mouse-pointer">
            <div class="icon"><i class="icon-06"></i><i class="icon-05"></i></div>
        </div>
        <!-- mouse-pointer end -->

        <!-- preloader -->
        <div class="loader-wrap">
            <div class="hendel__preloder">
                <div class="preloader">
                    <div class="preloader-ring">Thiết Kế Web Seo LA</div>    
                    <div class="preloader-ring">Thiết Kế Web Seo LA</div>
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
                                <li><span>Hotline :</span>  0396599059</li>
                                <li>/</li>
                                <li><span>Email :</span> <a href="mailto:info@company.com">info@company.com</a></li>
                            </ul>
                        </div>
                        <div class="top__hrader__right">
                            <ul>
                                <li><a href="#"><i class="icon-10"></i></a></li>
                                <li><a href="#"><i class="icon-14"></i></a></li>
                                <li><a href="#"><i class="icon-01"></i></a></li>
                                <li><a href="#"><i class="icon-11"></i></a></li>
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
                            <figure class="logo"><a href="{{ url('/') }}"><img src="{{ asset('frontend/assets/images/logo.png') }}" alt="Logo Webseola"></a></figure>
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
                                        <li><a href="{{ url('/') }}">Trang chủ</a>
                                        </li>
                                        <li><a href="about.html">About  </a></li>
                                        <li class="dropdown"><a href="#">Services </a>
                                            <ul>
                                                <li><a href="services.html">Services </a></li>
                                                <li><a href="service-details.html">Services Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="#">Page</a>
                                            <ul>
                                                <li class="dropdown"><a href="#">Projects </a>
                                                    <ul>
                                                        <li><a href="projects.html">Projects </a></li>
                                                        <li><a href="projects-details.html">Projects Details</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="pricing.html">Pricing</a></li>
                                                <li><a href="team.html">Team</a></li>
                                                <li><a href="testimonial.html">Testimonial</a></li>
                                                <li><a href="404.html">404 Page</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="#">Blog</a>
                                            <ul>
                                                <li><a href="blog.html">Blog </a></li>
                                                <li><a href="blog-details.html">Blog Details</a>
                                            </ul>
                                        </li>  
                                        @auth
                                         <li><a href="{{ route('dashboard') }}"> <i class="icon-18"></i> Hồ sơ cá nhân</a></li> 
                                        @else
                                         <li><a href="{{ route('login') }}">Đăng nhập</a></li> 
                                        @endauth
                                       
                                    
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="btn-box">
                            <a href="contact.html" class="theme-btn theme-btn-one"><i class="icon-02"></i> Discuses</a>
                        </div>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="outer-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="index-2.html"><img src="frontend/assets/images/logo.png" alt=""></a></figure>
                        </div>
                        <div class="menu-area clearfix">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                        <div class="btn-box">
                            <a href="contact.html" class="theme-btn theme-btn-one"><i class="icon-02"></i> Discuses</a>
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
                <div class="nav-logo"><a href="index-2.html"><img src="frontend/assets/images/logo.png" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <div class="contact-info">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>Chicago 12, Melborne City, USA</li>
                        <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                        <li><a href="mailto:info@example.com">info@example.com</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End Mobile Menu -->