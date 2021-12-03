@extends('customer.layout.layout')
@section('title', 'Chi tiết hóa đơn')
@section('main_content')
<div class="bill-section" style="margin-top:70px">
    <div class="container-fluid">
        <h3 class="bill-section__title" style="font-size: 25px;">
            ĐƠN MUA CỦA BẠN
        </h3>
        <?php

        use App\Models\modelBill;

        ?>

        <div class="bill-list">
            @foreach($dataBillJoinSubject as $key)
            <div class="bill-item tab">

                <input type="checkbox" id="chck<?= $key['subject_id'] ?>">
                <label class="tab-label" for="chck<?= $key['subject_id']  ?>">
                    <div class="bill-item-accordion">
                        <div class="bill-item-img">
                            <img src="./public/img/{{$key['subject_img']}}" alt="" class="img-fluid">
                        </div>
                        <div class="bill-text" style="margin-bottom: 25px;">
                            <h3><a href="" class="bill-item__title">{{$key['subject_name']}}</a></h3>
                            <div class="bill-item-price">
                                <span class="bill-item__price bill-item__price--new">{{number_format ($key['subject_sale'])}} đ</span>
                                <span class="bill-item__price bill-item__price--old">{{number_format ($key['subject_price'])}} đ</span>
                            </div>
                        </div>
                    </div>
                </label>
                <?php

                $billRow = modelBill::selectBillSubject($key['subject_id']);
                ?>
                <div class="bill-detail tab-content">
                    <div class="bill-item-head">
                        <div class="head-course">
                            <div class="head-img">
                                <img src="./public/img/{{$billRow[0]['subject_img']}}" alt="" class="img-fluid">
                            </div>
                            <div class="head-text">
                                <h3><a href="" class="bill-item__title">{{$billRow[0]['subject_name']}}</a></h3>
                                <div class="bill-item-price" style="margin-bottom: 60px;">
                                    <span class="bill-item__price bill-item__price--new">{{number_format ($billRow[0]['subject_sale'])}} đ</span>
                                    <span class="bill-item__price bill-item__price--old">{{number_format ($billRow[0]['subject_price'])}} đ</span>
                                </div>
                            </div>
                        </div>

                        <div class="head-time">
                            <span class="title-date">Mã hóa đơn</span>
                            <span class="time">CourseIFT-{{$billRow[0]['code_vnpay']}}</span>
                            <span class="title-date">Thời gian mua</span>
                            <span class="time"><?php echo date('H:i d-m-Y', strtotime($billRow[0]['transfer_time']))  ?></span>
                            <span class="title-date">Thời gian mở khóa học</span>
                            <span class="time"><?php echo date('H:i d-m-Y', strtotime('+5 minutes', strtotime($billRow[0]['transfer_time'])))  ?></span>
                        </div>

                    </div>
                    <div class="bill-item-body">
                        <div class="body-col">
                            <div class="info-bill-item">
                                <span class="info-bill__title">Tên tài khoản</span>
                                <span class="info-bill__input">{{$user['student_name']}}</span>
                            </div>
                            <div class="info-bill-item">
                                <span class="info-bill__title">Email</span>
                                <span class="info-bill__input">{{$user['student_email']}}</span>
                            </div>
                            @if(isset($user['student_phone']))
                            <div class="info-bill-item">
                                <span class="info-bill__title">Số điện thoại</span>
                                <span class="info-bill__input">{{$user['student_phone']}}</span>
                            </div>
                            @endif
                            <div class="info-bill-item">
                                <span class="info-bill__title">Tài khoản</span>
                                <span class="info-bill__input">{{$user['student_name']}}</span>
                            </div>
                        </div>
                        <div class="body-col">
                            <span class="bill-note__title">Ghi chú</span>
                            <p class="bill-note__content">
                                {{$billRow[0]['note_bill']}}
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
        </div>

    </div>
</div>
<footer style="margin-top: -150px;">
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

    <svg viewbox="0 0 1440 328" width="100%">
        <defs>
            <clipPath id="wave" clipPathUnits="objectBoundingBox" transform="scale(0.00069444444, 0.00304878048)">
                <path d="M504.452 27.7002C163.193 -42.9551 25.9595 38.071 0 87.4161V328H1440V27.7002C1270.34 57.14 845.711 98.3556 504.452 27.7002Z" />
            </clipPath>
        </defs>
    </svg>
</footer>

@endsection