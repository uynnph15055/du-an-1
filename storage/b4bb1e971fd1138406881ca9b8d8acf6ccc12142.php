
<?php $__env->startSection('title', 'Trang chủ'); ?>
<?php $__env->startSection('link'); ?>
<link href="./vnpay_php/assets/bootstrap.min.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="./vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">
<script src="./vnpay_php/assets/jquery-1.11.3.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
<div style="margin-top:70px">
    <?php require_once('./vnpay_php/config.php') ?>
    <?php
    $vnp_SecureHash = $_GET['vnp_SecureHash'];
    $inputData = array();
    foreach ($_GET as $key => $value) {
        if (substr($key, 0, 4) == "vnp_") {
            $inputData[$key] = $value;
        }
    }

    unset($inputData['vnp_SecureHash']);
    ksort($inputData);
    $i = 0;
    $hashData = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
    }

    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
    ?>
    <!--Begin display -->
    <div class="container">
        <div class="header clearfix">
            <h3 class="text-muted">VNPAY RESPONSE</h3>
        </div>
        <div class="table-responsive">
            <div class="form-group">
                <label>Mã đơn hàng:</label>

                <label> CourseIFT-<?php echo $_GET['vnp_TxnRef'] ?></label>
            </div>
            <div class="form-group">

                <label>Số tiền:</label>
                <label><?php echo number_format($_GET['vnp_Amount'] / 100) ?>đ</label>
            </div>
            <div class="form-group">
                <label>Nội dung thanh toán:</label>
                <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
            </div>
            <div class="form-group">
                <label>Mã phản hồi (vnp_ResponseCode):</label>
                <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
            </div>
            <div class="form-group">
                <label>Mã Ngân hàng:</label>
                <label><?php echo $_GET['vnp_BankCode'] ?></label>
            </div>
            <div class="form-group">
                <label>Thời gian thanh toán:</label>
                <label><?php echo date("Y-m-d H:i:s") ?></label>
            </div>
            <div class="form-group">
                <label>Kết quả:</label>
                <label>
                    <?php
                    if ($secureHash == $vnp_SecureHash) {
                        if ($_GET['vnp_ResponseCode'] == '00') {
                            echo "<span style='color:blue'>Thanh toán Thành công</span>";
                        } else {
                            echo "<span style='color:red'>Thanh toán không Thành công</span>";
                        }
                    } else {
                        echo "<span style='color:red'>Chu ky khong hop le</span>";
                    }
                    ?>

                </label>
            </div>
        </div>

    </div>

    <footer>
        <div class="footer-content">
            <div class="content">
                <div class="footer-social">
                    <a href="" class="social-link">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-link">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="" class="social-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
                <ul class="footer-links">
                    <li><a class="link-item" href="">Các khóa học</a></li>
                    <li><a class="link-item" href="">Liên hệ</a></li>
                    <li><a class="link-item" href="">Giới thiệu</a></li>
                    <li><a class="link-item" href="">Trợ giúp</a></li>
                </ul>
                <div class="footer-copyright">
                    <span>Copyright © 2021 - Course IFT</span>
                </div>
            </div>
            <div class="gooey-animations">
            </div>
        </div>

        <svg xmlns="" version="1.1">
            <defs>
                <filter id="goo">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="15" result="blur" />
                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 15 -7" result="goo" />
                    <feBlend in="SourceGraphic" in2="goo" />
                </filter>
            </defs>
        </svg>

        <svg viewbox="0 0 1440 0" width="100%">
            <defs>
                <clipPath id="wave" clipPathUnits="objectBoundingBox" transform="scale(0.00069444444, 0.00304878048)">
                    <path d="M504.452 27.7002C163.193 -42.9551 25.9595 38.071 0 87.4161V328H1440V27.7002C1270.34 57.14 845.711 98.3556 504.452 27.7002Z" />
                </clipPath>
            </defs>
        </svg>
    </footer>
</div>
</body>

</html>
<?php echo $__env->make('customer.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\project_one\app\views/customer/vnpay_return.blade.php ENDPATH**/ ?>