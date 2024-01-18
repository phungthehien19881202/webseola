@extends('frontend.main_master')

@section('content')

<section class="contact__page p_relative see__pad">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-ms-12">
                <div class="contact__left">
                    <figure>
                        <img id="showImage" src="{{( !empty($user->profile_photo_path))?url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" alt="avata">
                    </figure>
                    <h4>Cập nhật thông tin: {{ Auth::user()->name }}</h4>
                    <div class="contact__info">
                        <div class="contact__block">
                            <div class="icon">
                                <i class="icon-19"></i>
                            </div>
                            <div class="contact__text">
                                <a href="tell:{{ Auth::user()->phone }}">{{ Auth::user()->phone }}</a> <br>
                                <a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a> 
                            </div>
                        </div>
                        <div class="contact__block">
                            <div class="icon two">
                                <i class="icon-20"></i>
                            </div>
                            <div class="contact__text">
                                 <a href="{{ route('dashboard') }}">Dashboard</a> <br>
                                <a href="{{ route('user.profile') }}">Đổi Thông tin</a> <br>
                                <a href="{{ route('change.password') }}">Đổi mật khẩu</a> <br>
                                <a href="{{ route('user.logout') }}">Đăng xuất</a> <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="contact__right">
                    <div class="form__title">
                        <div class="title__data">
                            <div class="sub__title">
                                <h4>Đổi mật khẩu</h4>
                                <br>
                                <br>
                            </div>
                             <form method="POST" class="default-form" action="{{ route('user.update.password') }}">
                                @csrf
                            <div class="row clearfix thongtin">
                                <div class="col-lg-12 form-group">
                                    <p>Mật khẩu hiện tại: </p>
                                    <input type="password" id="current_password" name="oldpassword">
                                </div>
                                  <br>
                                  <br>
                                  <div class="col-lg-12 form-group">
                                    <p>Mật khẩu mới: </p>
                                    <input type="password" id="password" name="password">
                                </div>
                                  <br>
                                  <br>
                                <div class="col-lg-12 form-group">
                                    <p>Nhập lại mật khẩu mới: </p>
                                    <input type="password" id="password_confirmation" name="password_confirmation">
                                </div>
                                <br>
                                <br>
                                
                                <div class="col-xl-12 form-group message-btn btn-box">
                                    <button class="theme-btn theme-btn-one" type="submit">Cập nhật</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection