@extends('customer.layout.layout_login')
@section('title', 'Đổi mật khẩu')
@section('main_content')
<div class="form-log-container">
    <div class="form-base">
        <div class="form-base-header">
            <h4>ĐỔI MẬT KHẨU</h4>
        </div>
        <div class="form-base-body">
            <div class="form-base-content">
                <div class="icon">
                    <i class="fas fa-lock"></i>
                </div>
                <form class="log__form" action="doi-mat-khau-hoc-vien" method="POST">
                    <input type="password" name="pass_old" placeholder="Mật khẩu cũ">
                    <input type="password" name="pass_new" placeholder="Mật khẩu mới">
                    <input type="password" name="pass_confirm" placeholder="Xác nhận mật khẩu">
                    <span class="alert-mess check-pass-old mess-margin"></span>
                    <div class="btn-base-log-section">
                        <button class="base-logn__btn btn-primary" type="reset">
                            <a style="color: #ffff" href="">Nhập lại</a>
                        </button>
                        <button class="base-logn__btn btn-primary" type="submit">Gửi</button>
                    </div>
                </form>
                <a href="./" class="form-link">Trang chủ</a>
            </div>
        </div>
    </div>
</div>
<script src="./public/js/customerJs/validateFormLog.js"></script>
@endsection