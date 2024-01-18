@extends('frontend.main_master')

@section('content')
<section class="contact__page p_relative see__pad">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-8" style="margin: auto;">
                <div class="form__title">
                    <div class="title__data">
                        <div class="sub__title">
                            <h4>Đăng Nhập</h4>
                        </div>
                        
                    </div>
                </div>
                <div class="form-inner">
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                     <div class="col-lg-12 form-group">
                                <a href="{{ route('register') }}">Bạn chưa đăng ký?</a>
                            </div>
                        <form method="POST" class="default-form" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
                            @csrf
                        <div class="row clearfix">
                            
                            <div class="col-lg-12 form-group">
                                <input type="email" id="email" name="email" placeholder="Email *" required="">
                            </div>
                            <div class="col-lg-12 form-group">
                                <input type="password" name="password" placeholder="Password " required="">
                            </div>
                           
                            <div class="col-xl-6 col-lg-12 form-group">
                                <label><input type="checkbox" name="remember" id="remember_me"> Ghi nhớ đăng nhập!</label>
                            </div>

                             @if (Route::has('password.request'))
                             <div class="col-xl-6 col-lg-12 form-group">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Quên mật khẩu?') }}
                                </a>
                            </div>
                            @endif
                            <div class="col-xl-12 form-group message-btn btn-box">
                                <button class="theme-btn theme-btn-one" type="submit" name="submit-form">Đăng nhập</button>
                            </div>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection