@extends('customer.layout.layout_login')
@section('title', 'Email quên mật khẩu')
@section('main_content')
<div class="">
    <div class="form-log-container" style="margin-top: 140px;">
        <div class="form-base">
            <div class="form-base-header">
                <h4>Nhập email của bạn</h4>
            </div>
            <div class="form-base-body">
                <div class="form-base-content">
                    <div class="icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <form class="log__form" id="form-forgot-pass" action="gui-mail" method="POST">
                        <input type="text" id="check-mail-forgot" name="email_check" onblur="checkEmailForgotPass()" oninput="checkEmailForgotPass()" placeholder="Email">
                        <span class="alert-mess check-mail-forgot mess-margin"></span>
                        <div class="btn-base-log-section">
                            <button class="base-logn__btn btn-primary" type="reset">Nhập lại</button>
                            <button class="base-logn__btn btn-primary" type="submit">Gửi</button>
                        </div>
                    </form>
                    <a href="dang-nhap-dang-ky" class="form-link">Quay lại</a>
                    @if(isset($_SESSION['notifi']))
                    <p style="margin-top:30px;font-size:15px;text-align:center;color:#8E0007;">{{$_SESSION['notifi']}}</p>
                    <!-- <?php unset($_SESSION['notifi']); ?> -->
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./public/js/customerJs/validateFormLog.js"></script>
@endsection