@extends('frontend.main_master')

@section('content')
<section class="contact__page p_relative see__pad">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-8" style="margin: auto;">
                <div class="form__title">
                    <div class="title__data">
                        <div class="sub__title">
                            <h4>Đăng Ký</h4>
                        </div>
                        
                    </div>
                </div>
                <div class="form-inner">
                  
                        <form method="POST" class="default-form" action="{{ route('register') }}">
                            @csrf
                        <div class="row clearfix">
                            <div class="col-lg-12 form-group">
                                <input type="text" id="name" name="name" placeholder="Tên *">
                                @error('name')
                                   <span class="loiroi">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                   @enderror
                            </div>
                            <div class="col-lg-12 form-group">
                                <input type="text" id="phone" name="phone" placeholder="Phone *">
                                    @error('phone')
                                   <span class="loiroi">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                   @enderror
                            </div>
                            <div class="col-lg-12 form-group">
                                <input type="email" id="email" name="email" placeholder="Email *">
                                @error('email')
                                   <span class="loiroi">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                   @enderror
                            </div>
                            <div class="col-lg-12 form-group">
                                <input id="password" type="password" name="password" placeholder="Password ">
                                @error('password')
                                   <span class="loiroi">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                   @enderror
                            </div>
                            <div class="col-lg-12 form-group">
                                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Nhập lại Password ">
                                @error('password_confirmation')
                                   <span class="loiroi">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                   @enderror
                            </div>

                            <div class="col-xl-6 col-lg-12 form-group">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                    {{ __('Bạn đã có tài khoản?') }}
                                </a>
                            </div>

                            <div class="col-xl-12 form-group message-btn btn-box">
                                <button class="theme-btn theme-btn-one" type="submit" name="submit-form">Đăng ký</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection