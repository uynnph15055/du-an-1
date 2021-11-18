@extends('customer.layout.layout_login')
@section('title', 'Đăng nhập')
@section('main_content')
<div class="form-log-container form-log-width" id="form-log-container">
    <div class="form-container-item sign-up-container">
        <form class="log__form" action="dang-ky" method="POST">
            <h3 class="form__title">Đăng ký</h3>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>- hoặc sử dụng email để đăng ký</span>

            <input type="text" name="student_name" placeholder="Tên" />
            <span></span>
            <input type="email" name="student_email" id="email-sign-up" placeholder="Email" />
            <span id="error-email" style="color:#E80007;font-size:12px"></span>
            <input type="password" name="student_password" placeholder="Mật khẩu" />
            <span class="error-sign-up"></span>
            <button class="btn__log btn-primary">Đăng ký</button>
            <a class="form-link" href="./">Trang chủ</a>
        </form>
    </div>
    <div class="form-container-item sign-in-container">
        <form class="log__form" method="POST" action="dang-nhap">
            <h3 class="form__title">Đăng nhập</h3>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>- hoặc sử dụng tài khoản</span>

            <input id="email-sign-in" name="student_email" type="email" placeholder="Email" />
            <span id="error-sign-in" style="color:#E80007;font-size:12px" class="alert-mess alert-mess--error"></span>

            <input type="password" name="student_password" placeholder="Mật khẩu" />
            <span class="alert-mess alert-mess--error"></span>

            <button class="btn__log btn-primary">Đăng nhập</button>
            <a class="form-link" href="#">Quên mật khẩu?</a>
            <a class="form-link" href="./">Trang chủ</a>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1 class="form__title">Chào mừng bạn trở lại!</h1>
                <p class="form__subtitle">Để kết nối với chúng tôi, hãy đăng nhập ngay!</p>
                <button class="btn__log btn__log-2 ghost" id="signIn">Đăng nhập</button>
                <span class="shape oval"></span>
                <span class="poly poly-1"></span>
                <span class="poly poly-2"></span>
                <span class="shape reg"></span>
            </div>
            <div class="overlay-panel overlay-right">
                <h1 class="form__title">Bạn chưa có tài khoản?</h1>
                <p class="form__subtitle">Đăng ký và nhập thông tin để tham gia các khóa học của chúng tôi!</p>
                <button class="btn__log btn__log-2 ghost" id="signUp">Đăng ký</button>
                <span class="shape oval"></span>
                <span class="poly poly-1"></span>
                <span class="poly poly-2"></span>
                <span class="shape reg"></span>
            </div>
        </div>
    </div>
</div>
<script src="./public/js/customerJs/form-log.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $(document).ready(function() {
        $('#email-sign-up').blur(function() {
            var emailVal = $(this).val();
            $.post("check-email-dang-ky", {
                email_val: emailVal
            }, function($data) {
                $('#error-email').html($data);
            })
        });

        $('#email-sign-in').blur(function() {
            var emailInVal = $(this).val();

            $.post("check-email-dang-nhap", {
                email_val_in: emailInVal
            }, function($data) {
                $('#error-sign-in').html($data);
            })
        });
    })
</script>
@endsection