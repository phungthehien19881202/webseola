@extends('frontend.main_master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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
                                        <h4>Cập nhật</h4>
                                        <br>
                                        <br>
                                    </div>
                                    
                                     <form method="POST" class="default-form" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                                        @csrf
                                    <div class="row clearfix thongtin">
                                        <div class="col-lg-12 form-group">
                                            <p>Tên: </p><input type="text" id="name" name="name" value="{{ $user->name }}">
                                            
                                        </div>
                                          <br>
                                          <br>
                                          <div class="col-lg-12 form-group">
                                             <p>Phone:</p>
                                            <input type="text" id="phone" name="phone" value="{{ $user->phone }}">
                                        </div>
                                          <br>
                                          <br>
                                        <div class="col-lg-12 form-group">
                                            <p>Email:</p>
                                            <input type="email" id="email" name="email" value="{{ $user->email }}">
                                        </div>
                                        <br>
                                        <br>
                                        <div class="col-lg-12 form-group">
                                            <p>Ảnh đại diện:</p>
                                            <input id="image" type="file" name="profile_photo_path" class="form-control">
                                        </div>
                                        <br>
                                        <br>
                                        <div class="col-xl-12 form-group message-btn btn-box">
                                            <button class="theme-btn theme-btn-one" type="submit" name="submit-form">Cập nhật</button>
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
        <script type="text/javascript">
        $(document).ready(function () {
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });

    </script>
@endsection