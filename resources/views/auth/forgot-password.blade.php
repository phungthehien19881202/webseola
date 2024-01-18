@extends('frontend.main_master')

@section('content')
<section class="contact__page p_relative see__pad">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-8" style="margin: auto;">
                <div class="form__title">
                    <div class="title__data">
                        <div class="sub__title">
                            <h4>Quên mật khẩu</h4>
                        </div>
                        
                    </div>
                </div>
                <div class="form-inner">
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                        <div class="row clearfix">
                            
                            <div class="col-lg-12 form-group">
                                <input type="email" id="email" name="email" placeholder="Nhập mail đăng ký của bạn">
                                @error('email')
                                   <span class="loiroi">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                   @enderror
                            </div>
                            

                            
                            <div class="col-xl-12 form-group message-btn btn-box">
                                <button class="theme-btn theme-btn-one" type="submit">Gửi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection