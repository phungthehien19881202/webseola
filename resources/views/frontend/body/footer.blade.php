 @php
 $setting = App\Models\SiteSetting::find(1);
  @endphp
<footer class="main__footer">
    
    <div class="footer__one">
        <div class="footer-widget-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget footer-logo-widget wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <figure class="footer-logo">
                            <img src="{{ asset($setting->logo) }}" alt="logo">
                            </figure>
                            
                           
                        </div>
                    </div>
                
                    <div class="col-lg-8 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget office-widget wow fadeInUp animated" data-wow-delay="400ms" data-wow-duration="1500ms">
                            
                            <div class="widget-content">
                                <div class="text">
                                    <p style="margin-top:15px ">{{ $setting->company_address }} - {{ $setting->phone_one }} - {{ $setting->email }}</p>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="bottom-inner">
                    <div class="copyright">
                        <p>© 2023 <a href="{{ url('/') }}">LaDigiTop</a>  All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-one end -->

<!--Scroll to top-->
<div class="scroll-to-top">
    <div>
        <div class="scroll-top-inner">
            <div class="scroll-bar">
                <div class="bar-inner"></div>
            </div>
            <div class="scroll-bar-text g_color">Lên đầu trang</div>
        </div>
    </div>
</div>
<!-- Scroll to top end -->