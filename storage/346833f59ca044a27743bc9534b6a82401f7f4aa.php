
<?php $__env->startSection('title', 'Xác nhận tài khoản'); ?>
<?php $__env->startSection('main_content'); ?>
<div class="bgr-img form-log-section">
    <div class="form-log-container" style="margin-top:140px">
        <div class="form-base">
            <div class="form-base-header">
                <h4>Nhập mã xác nhận của bạn</h4>
            </div>
            <div class="form-base-body">
                <div class="form-base-content">
                    <div class="icon">
                        <i class="fas fa-user-lock"></i>
                    </div>
                    <form class="log__form" id="form-check-code" action="xac-nhan-tai-khoan" method="POST">
                        <input type="text" id="check-code" name="code_check" onblur="checkCode()" oninput="checkCode()" placeholder="Mã xác nhận">
                        <span class="alert-mess check-code mess-margin"></span>
                        <div class="btn-base-log-section">
                            <button class="base-logn__btn btn-primary" type="reset"><a style="color: #ffff;" href="">Nhập lại</a></button>
                            <button class="base-logn__btn btn-primary" type="submit">Gửi</button>
                        </div>
                    </form>
                    <a href="dang-nhap-dang-ky" class="form-link">Quay lại</a>
                    <p style="margin-top:30px;font-size:15px;text-align:center;color:#8E0007;">Mã xác nhận đã được chuyển vào email !</p>
                    <?php unset($_SESSION['notifi']); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./public/js/customerJs/validateFormLog.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.layout.layout_login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KI III\xam\htdocs\project_one\app\views/customer/confirm_account.blade.php ENDPATH**/ ?>