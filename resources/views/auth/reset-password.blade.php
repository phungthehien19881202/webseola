@extends('frontend.main_master')

@section('content')
<section class="contact__page p_relative see__pad">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-8" style="margin: auto;">
                <div class="form__title">
                    <div class="title__data">
                        <div class="sub__title">
                            <h4>Đặt lại mật khẩu</h4>
                        </div>
                        
                    </div>
                </div>
                <div class="form-inner">
                   <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                       <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="row clearfix">
                            
                            <div class="col-lg-12 form-group">
                                <input type="email" id="email" name="email">
                            </div>

                            <div class="col-lg-12 form-group">
                                <input id="password" type="password" name="password" placeholder="Password mới">
                            </div>
                            <div class="col-lg-12 form-group">
                                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Nhập lại password">
                            </div>
                            

                            
                            <div class="col-xl-12 form-group message-btn btn-box">
                                <button class="theme-btn theme-btn-one" type="submit">Lưu lại</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection