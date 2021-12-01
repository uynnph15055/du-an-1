
<?php $__env->startSection('title', 'Trang chủ'); ?>
<?php $__env->startSection('link'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
<?php require_once('./vnpay_php/config.php') ?>
<style>
    .grid-anh {
        display: grid;
        grid-template-columns: 1.5fr 3fr;
        grid-gap: 30px;
    }
</style>


<div style="max-width: 1240px; margin: 5px auto " class="">
    <header>
        <div class="logo bg-white text-center p-3">
            <a href="./">
                <img style="height:70px;" src="./public/img/images/logo-main.png" alt="" class="img-fluid">
            </a>
        </div>
    </header>
    <div class="grid-anh my-2">
        <div class=" bg-white p-3">
            <img src="./public/img/<?php echo e($subject['subject_img']); ?>" alt="" class="img-fluid">
            <div class="row my-2">
                <div class="col-8">
                    <h5 style="color: #0098d2">Tên khóa học: <?php echo e($subject['subject_name']); ?></h5>
                    <p class="m-0">Gồm: <?php echo e($countLesson); ?> bài học</p>

                </div>
                <div class="col-4 text-end">
                    <span style="color: #0098d2" class="fs-5 fw-bold"> <?php echo e(number_format($subject['subject_sale'])); ?> đ</span>
                    <span class="fs-8 text-decoration-line-through"> <?php echo e(number_format($subject['subject_price'])); ?> đ</span>
                </div>
            </div>
        </div>
        <div class=" bg-white p-3">
            <div class="table-responsive">
                <form action="vnpay_create_payment" id="create_form" method="post">
                    <div class="create-new">
                        <h3>Tạo mới đơn hàng</h3>
                        <div class="form-group">
                            <label for="language">Tên khóa học </label>
                            <input name="order_type" id="order_type" class="form-control" type="text" value="<?php echo e($subject['subject_name']); ?>" />
                        </div>
                        <div class="form-group">
                            <label for="order_id">Mã hóa đơn</label>
                            <input class="form-control" id="order_id" name="order_id" type="text" value="<?php echo $user['student_id'] . $subject['subject_id']  ?>" />
                        </div>
                        <div class="form-group">
                            <label for="amount">Số tiền</label>
                            <input class="form-control" id="amount" name="amount" type="number" value="<?php echo e($subject['subject_sale']); ?>" />
                        </div>
                        <div class="form-group">
                            <label for="order_desc">Nội dung thanh toán</label>
                            <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">thanh toan khoa hoc <?php echo e($subject['subject_name']); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="bank_code">Ngân hàng</label>
                            <select name="bank_code" id="bank_code" class="form-control">
                                <option value="">Không chọn</option>
                                <option value="NCB"> Ngan hang NCB</option>
                                <option value="AGRIBANK"> Ngan hang Agribank</option>
                                <option value="SCB"> Ngan hang SCB</option>
                                <option value="SACOMBANK">Ngan hang SacomBank</option>
                                <option value="EXIMBANK"> Ngan hang EximBank</option>
                                <option value="MSBANK"> Ngan hang MSBANK</option>
                                <option value="NAMABANK"> Ngan hang NamABank</option>
                                <option value="VNMART"> Vi dien tu VnMart</option>
                                <option value="VIETINBANK">Ngan hang Vietinbank</option>
                                <option value="VIETCOMBANK"> Ngan hang VCB</option>
                                <option value="HDBANK">Ngan hang HDBank</option>
                                <option value="DONGABANK"> Ngan hang Dong A</option>
                                <option value="TPBANK"> Ngân hàng TPBank</option>
                                <option value="OJB"> Ngân hàng OceanBank</option>
                                <option value="BIDV"> Ngân hàng BIDV</option>
                                <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                                <option value="VPBANK"> Ngan hang VPBank</option>
                                <option value="MBBANK"> Ngan hang MBBank</option>
                                <option value="ACB"> Ngan hang ACB</option>
                                <option value="OCB"> Ngan hang OCB</option>
                                <option value="IVB"> Ngan hang IVB</option>
                                <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="language">Ngôn ngữ</label>
                            <select name="language" id="language" class="form-control">
                                <option value="vn">Tiếng Việt</option>
                                <option value="en">English</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thời hạn thanh toán</label>
                            <input class="form-control" id="txtexpire" name="txtexpire" type="text" value="<?php echo $expire; ?>" />
                        </div>

                    </div>
                    <div style="display:none">
                        <div class="form-group">
                            <h3>Thông tin hóa đơn (Billing)</h3>
                        </div>
                        <div class="form-group">
                            <label>Họ tên (*)</label>
                            <input class="form-control" id="txt_billing_fullname" name="txt_billing_fullname" type="text" value="NGUYEN VAN XO" />
                        </div>
                        <div class="form-group">
                            <label>Email (*)</label>
                            <input class="form-control" id="txt_billing_email" name="txt_billing_email" type="text" value="xonv@vnpay.vn" />
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại (*)</label>
                            <input class="form-control" id="txt_billing_mobile" name="txt_billing_mobile" type="text" value="0934998386" />
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ (*)</label>
                            <input class="form-control" id="txt_billing_addr1" name="txt_billing_addr1" type="text" value="22 Lang Ha" />
                        </div>
                        <div class="form-group">
                            <label>Mã bưu điện (*)</label>
                            <input class="form-control" id="txt_postalcode" name="txt_postalcode" type="text" value="100000" />
                        </div>
                        <div class="form-group">
                            <label>Tỉnh/TP (*)</label>
                            <input class="form-control" id="txt_bill_city" name="txt_bill_city" type="text" value="Hà Nội" />
                        </div>
                        <div class="form-group">
                            <label>Bang (Áp dụng cho US,CA)</label>
                            <input class="form-control" id="txt_bill_state" name="txt_bill_state" type="text" value="" />
                        </div>
                        <div class="form-group">
                            <label>Quốc gia (*)</label>
                            <input class="form-control" id="txt_bill_country" name="txt_bill_country" type="text" value="VN" />
                        </div> -->
                        <div class="form-group">
                            <h3>Thông tin giao hàng (Shipping)</h3>
                        </div>
                        <div class="form-group">
                            <label>Họ tên (*)</label>
                            <input class="form-control" id="txt_ship_fullname" name="txt_ship_fullname" type="text" value="Nguyễn Thế Vinh" />
                        </div>
                        <div class="form-group">
                            <label>Email (*)</label>
                            <input class="form-control" id="txt_ship_email" name="txt_ship_email" type="text" value="vinhnt@vnpay.vn" />
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại (*)</label>
                            <input class="form-control" id="txt_ship_mobile" name="txt_ship_mobile" type="text" value="0123456789" />
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ (*)</label>
                            <input class="form-control" id="txt_ship_addr1" name="txt_ship_addr1" type="text" value="Phòng 315, Công ty VNPAY, Tòa nhà TĐL, 22 Láng Hạ, Đống Đa, Hà Nội" />
                        </div>
                        <div class="form-group">
                            <label>Mã bưu điện (*)</label>
                            <input class="form-control" id="txt_ship_postalcode" name="txt_ship_postalcode" type="text" value="1000000" />
                        </div>
                        <div class="form-group">
                            <label>Tỉnh/TP (*)</label>
                            <input class="form-control" id="txt_ship_city" name="txt_ship_city" type="text" value="Hà Nội" />
                        </div>
                        <div class="form-group">
                            <label>Bang (Áp dụng cho US,CA)</label>
                            <input class="form-control" id="txt_ship_state" name="txt_ship_state" type="text" value="" />
                        </div>
                        <div class="form-group">
                            <label>Quốc gia (*)</label>
                            <input class="form-control" id="txt_ship_country" name="txt_ship_country" type="text" value="VN" />
                        </div> -->
                    </div>
                    <div class="info-invoice">
                        <h3>Thông tin gửi Hóa đơn điện tử (Invoice)</h3>
                        <div class="form-group">
                            <label>Tên khách hàng</label>
                            <input class="form-control" id="txt_inv_customer" name="txt_inv_customer" type="text" value="<?php echo e($user['student_name']); ?>" />
                        </div>
                        <div class="form-group">
                            <label>Công ty</label>
                            <input class="form-control" id="txt_inv_company" name="txt_inv_company" type="text" value="Công ty Cổ phần giải pháp Thanh toán Việt Nam" />
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control" id="txt_inv_addr1" name="txt_inv_addr1" type="text" value="22 Láng Hạ, Phường Láng Hạ, Quận Đống Đa, TP Hà Nội" />
                        </div>
                        <div class="form-group">
                            <label>Mã số thuế</label>
                            <input class="form-control" id="txt_inv_taxcode" name="txt_inv_taxcode" type="text" value="0102182292" />
                        </div>
                        <div class="form-group">
                            <label>Loại hóa đơn</label>
                            <select name="cbo_inv_type" id="cbo_inv_type" class="form-control">
                                <option value="I">Cá Nhân</option>
                                <option value="O">Công ty/Tổ chức</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" id="txt_inv_email" name="txt_inv_email" type="text" value="<?php echo e($user['student_email']); ?>" />
                        </div>
                        <div class="form-group">
                            <label>Điện thoại</label>
                            <input class="form-control" id="txt_inv_mobile" name="txt_inv_mobile" type="text" value="02437764668" />
                        </div>
                    </div>
                    <button style="background:linear-gradient(to right, #0098d2, #00bcca) " type="submit" name="redirect" id="redirect" class="btn btn-primary">Thanh toán </button>

                </form>
            </div>
        </div>
    </div>
    <footer class="bg-white text-center p-3">
        <span>Copyright &copy; - Course IFT</span>
    </footer>
</div>
<!-- <div class="container" style="margin-top: 50px;">
    <div class="header clearfix">
        <h3 class="text-muted">THANH TOÁN QUA VNPAY</h3>
    </div>
    <h3>Tạo mới đơn hàng</h3>
    <div class="table-responsive">
     
        <form action="vnpay_create_payment" id="create_form" method="post">
            <input type="hidden" name="subject_id" value="<?php echo e($subject['subject_id']); ?>">
            <div class="form-group">
                <label for="language">Tên khóa học </label>
                <input name="order_type" id="order_type" class="form-control" type="text" value="<?php echo e($subject['subject_name']); ?>" />
            </div>
            <div class="form-group">
                <label for="order_id">Mã hóa đơn</label>
                <input class="form-control" id="order_id" name="order_id" type="text" value="<?php echo mt_rand() ?>" />
            </div>
            <div class="form-group">
                <label for="amount">Số tiền</label>
                <input class="form-control" id="amount" name="amount" type="number" value="<?php echo e($subject['subject_sale']); ?>" />
            </div>
            <div class="form-group">
                <label for="order_desc">Nội dung thanh toán</label>
                <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">thanh toan khoa hoc <?php echo e($subject['subject_name']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="bank_code">Ngân hàng</label>
                <select name="bank_code" id="bank_code" class="form-control">
                    <option value="">Không chọn</option>
                    <option value="NCB"> Ngan hang NCB</option>
                    <option value="AGRIBANK"> Ngan hang Agribank</option>
                    <option value="SCB"> Ngan hang SCB</option>
                    <option value="SACOMBANK">Ngan hang SacomBank</option>
                    <option value="EXIMBANK"> Ngan hang EximBank</option>
                    <option value="MSBANK"> Ngan hang MSBANK</option>
                    <option value="NAMABANK"> Ngan hang NamABank</option>
                    <option value="VNMART"> Vi dien tu VnMart</option>
                    <option value="VIETINBANK">Ngan hang Vietinbank</option>
                    <option value="VIETCOMBANK"> Ngan hang VCB</option>
                    <option value="HDBANK">Ngan hang HDBank</option>
                    <option value="DONGABANK"> Ngan hang Dong A</option>
                    <option value="TPBANK"> Ngân hàng TPBank</option>
                    <option value="OJB"> Ngân hàng OceanBank</option>
                    <option value="BIDV"> Ngân hàng BIDV</option>
                    <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                    <option value="VPBANK"> Ngan hang VPBank</option>
                    <option value="MBBANK"> Ngan hang MBBank</option>
                    <option value="ACB"> Ngan hang ACB</option>
                    <option value="OCB"> Ngan hang OCB</option>
                    <option value="IVB"> Ngan hang IVB</option>
                    <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                </select>
            </div>
            <div class="form-group">
                <label for="language">Ngôn ngữ</label>
                <select name="language" id="language" class="form-control">
                    <option value="vn">Tiếng Việt</option>
                    <option value="en">English</option>
                </select>
            </div>
            <div class="form-group">
                <label>Thời hạn thanh toán</label>
                <input class="form-control" id="txtexpire" name="txtexpire" type="text" value="<?php echo $expire; ?>" />
            </div>
            <div>
                <div class="form-group">
                    <h3>Thông tin hóa đơn (Billing)</h3>
                </div>
                <div class="form-group">
                        <label>Họ tên (*)</label>
                        <input class="form-control" id="txt_billing_fullname" name="txt_billing_fullname" type="text" value="<?php echo e($user['student_name']); ?>" />
                    </div>
                    <div class="form-group">
                        <label>Email (*)</label>
                        <input class="form-control" id="txt_billing_email" name="txt_billing_email" type="text" value="<?php echo e($user['student_email']); ?>" />
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại (*)</label>
                        <input class="form-control" id="txt_billing_mobile" name="txt_billing_mobile" type="text" value="0348048435" />
                    </div>
                <div class="form-group">
                    <label>Địa chỉ (*)</label>
                    <input class="form-control" id="txt_billing_addr1" name="txt_billing_addr1" type="text" value="22 Lang Ha" />
                </div>
                <div style="display:none" class="form-group">
                    <label>Mã bưu điện (*)</label>
                    <input class="form-control" id="txt_postalcode" name="txt_postalcode" type="text" value="100000" />
                </div>
                <div class="form-group">
                    <label>Tỉnh/TP (*)</label>
                    <input class="form-control" id="txt_bill_city" name="txt_bill_city" type="text" value="Hà Nội" />
                </div>
                <div style="display:none" class="form-group">
                    <label>Bang (Áp dụng cho US,CA)</label>
                    <input class="form-control" id="txt_bill_state" name="txt_bill_state" type="text" value="" />
                </div>
                <div style="display:none" class="form-group">
                    <label>Quốc gia (*)</label>
                    <input class="form-control" id="txt_bill_country" name="txt_bill_country" type="text" value="VN" />
                </div>
                <div style="display:none">
                    <div class="form-group">
                        <h3>Thông tin giao hàng (Shipping)</h3>
                    </div>
                    <div class="form-group">
                        <label>Họ tên (*)</label>
                        <input class="form-control" id="txt_ship_fullname" name="txt_ship_fullname" type="text" value="Nguyễn Thế Vinh" />
                    </div>
                    <div class="form-group">
                        <label>Email (*)</label>
                        <input class="form-control" id="txt_ship_email" name="txt_ship_email" type="text" value="vinhnt@vnpay.vn" />
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại (*)</label>
                        <input class="form-control" id="txt_ship_mobile" name="txt_ship_mobile" type="text" value="0123456789" />
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ (*)</label>
                        <input class="form-control" id="txt_ship_addr1" name="txt_ship_addr1" type="text" value="Phòng 315, Công ty VNPAY, Tòa nhà TĐL, 22 Láng Hạ, Đống Đa, Hà Nội" />
                    </div>
                    <div class="form-group">
                        <label>Mã bưu điện (*)</label>
                        <input class="form-control" id="txt_ship_postalcode" name="txt_ship_postalcode" type="text" value="1000000" />
                    </div>
                    <div class="form-group">
                        <label>Tỉnh/TP (*)</label>
                        <input class="form-control" id="txt_ship_city" name="txt_ship_city" type="text" value="Hà Nội" />
                    </div>
                    <div class="form-group">
                        <label>Bang (Áp dụng cho US,CA)</label>
                        <input class="form-control" id="txt_ship_state" name="txt_ship_state" type="text" value="" />
                    </div>
                    <div class="form-group">
                        <label>Quốc gia (*)</label>
                        <input class="form-control" id="txt_ship_country" name="txt_ship_country" type="text" value="VN" />
                    </div>
                    <div class="form-group">
                        <h3>Thông tin gửi Hóa đơn điện tử (Invoice)</h3>
                    </div>
                    <div class="form-group">
                        <label>Tên khách hàng</label>
                        <input class="form-control" id="txt_inv_customer" name="txt_inv_customer" type="text" value="Lê Văn Phổ" />
                    </div>
                    <div class="form-group">
                        <label>Công ty</label>
                        <input class="form-control" id="txt_inv_company" name="txt_inv_company" type="text" value="Công ty Cổ phần giải pháp Thanh toán Việt Nam" />
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" id="txt_inv_addr1" name="txt_inv_addr1" type="text" value="22 Láng Hạ, Phường Láng Hạ, Quận Đống Đa, TP Hà Nội" />
                    </div>
                    <div class="form-group">
                        <label>Mã số thuế</label>
                        <input class="form-control" id="txt_inv_taxcode" name="txt_inv_taxcode" type="text" value="0102182292" />
                    </div>
                    <div class="form-group">
                        <label>Loại hóa đơn</label>
                        <select name="cbo_inv_type" id="cbo_inv_type" class="form-control">
                            <option value="I">Cá Nhân</option>
                            <option value="O">Công ty/Tổ chức</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" id="txt_inv_email" name="txt_inv_email" type="text" value="pholv@vnpay.vn" />
                    </div>
                    <div class="form-group">
                        <label>Điện thoại</label>
                        <input class="form-control" id="txt_inv_mobile" name="txt_inv_mobile" type="text" value="02437764668" />
                    </div>
                </div>
            </div>

            <button type="submit" name="redirect" id="redirect" class="btn btn-primary">Thanh toán </button>

        </form>
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
</div> -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="./public/js/customerJs/swiper-slider.js"></script>
<script src="./public/js/customerJs/slideshow-rating.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.layout.layout_payment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KI III\xam\htdocs\project_one\app\views/customer/payment.blade.php ENDPATH**/ ?>