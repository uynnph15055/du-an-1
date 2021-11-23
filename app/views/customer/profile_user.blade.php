@extends('customer.layout.layout')
@section('title', 'Khóa học')
@section('main_content')
<style>
    .info-item__title {
        font-weight: 600;
    }
</style>
<div class="container" style="margin-top:50px">
    <div class="profile-section">
        <div class="container-fluid">
            <div class="profile-grid">
                <div class="profile-control">
                    <div class="section-box profile-control-general">
                        <div class="general-img">
                            <img src="./public/img/{{$dataInfo[0]['student_avatar']}}" alt="" class="img-fluid">
                            <abbr class="open-modal-btn" title=" Chỉnh sửa ảnh">
                                <button style="z-index: 1;" class="ctrl-img"><i class="fas fa-camera"></i></button>
                            </abbr>
                        </div>
                        <div class="general-text">
                            <h4 class="general__username">{{$dataInfo[0]['student_name']}}</h4>
                            <div class="general-exp"><i class="fas fa-trophy"></i> 123 EXP</div>
                            <p class="general__bio">
                                "Hello, I’m Anh.
                                Unt in culpa qui officia deserunt mollit anim id est laborum."
                            </p>
                        </div>
                    </div>
                    <div class="section-box profile-control-info">
                        <div class="head-section head-flex">
                            <span class="head-section__name">Thông tin</span>
                            <span class="head-section__line"></span>
                            <span class="head-section__sub">
                                <abbr class="open-modal-user-info-btn" title="Chỉnh sửa thông tin">
                                    <i class="fas fa-pencil-alt"></i>
                                </abbr>
                            </span>
                        </div>
                        <div class="info-content">
                            <div class="info-list">
                                <div class="info-item">
                                    <span class="info-item__title">
                                        Tên:
                                    </span>
                                    <span class="info-item__content">
                                        {{$dataInfo[0]['student_name']}}
                                    </span>
                                </div>
                                <div class="info-item">
                                    <span class="info-item__title">
                                        Email:
                                    </span>
                                    <span class="info-item__content">
                                        {{$dataInfo[0]['student_email']}}
                                    </span>
                                </div>
                            </div>
                            <a class="change-pass-link" href="">Đổi mật khẩu</a>
                        </div>
                    </div>
                </div>


                <div class="profile-course">
                    <div class="profile-course-item">
                        <div class="section-box course-status course-status--studying">
                            <div class="status-head head-grid">
                                <span class="head-status__icon"><i class="fas fa-book-reader"></i></span>
                                <span class="head-status__name">Khóa đang học</span>
                                <span class="head-status__sub">2</span>
                            </div>
                            <div class="status-content">
                                <?php

                                use App\Models\modelLesson;

                                ?>
                                <div class="status-course-list">
                                    @foreach($dataCourseLeaning as $key)
                                    <div class="status-course-item">
                                        <div class="status-course-img">
                                            <a href="">
                                                <img src="./public/img/{{$key['subject_img']}}" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="status-course-text">
                                            <h3 class="status-course__name"><a href="">{{$key['subject_name']}}</a></h3>
                                            <span class="status-course__count-lesson">{{$key['sum_lesson']}} / <?php echo count(modelLesson::where("subject_id", "=", $key['subject_id'])->get()); ?></span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="section-box course-status course-status--done">
                            <div class="status-head head-grid">
                                <span class="head-status__icon"><i class="fas fa-medal"></i></span>
                                <span class="head-status__name">Khóa đã hoàn thành</span>
                                <span class="head-status__sub">2</span>
                            </div>
                            <div class="status-content">
                                <div class="status-course-list">
                                    <div class="status-course-item">
                                        <div class="status-course-img">
                                            <a href="">
                                                <img src="./public/img/images/abc.jpg" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="status-course-text">
                                            <h3 class="status-course__name"><a href="">HTML</a></h3>
                                            <span class="status-course__count-lesson">10/10</span>
                                        </div>
                                    </div>
                                    <div class="status-course-item">
                                        <div class="status-course-img">
                                            <a href="">
                                                <img src="./public/img/images/abc.jpg" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="status-course-text">
                                            <h3 class="status-course__name"><a href="">HTML</a></h3>
                                            <span class="status-course__count-lesson">10/10</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="course-function">
                        <div class="section-box course-function-item bill">
                            <div class="head-section head-flex">
                                <span class="head-section__name">Đơn mua</span>
                                <span class="head-section__line"></span>
                                <span class="head-section__sub">1</span>
                            </div>
                            <div class="bill-list">
                                <div class="bill-item">
                                    <div class="bill-course">
                                        <div class="bill-course-img">
                                            <a href="">
                                                <img src="./public/img/images/abc.jpg" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="bill-course-text">
                                            <h3 class="bill-course__name">
                                                <a href="">
                                                    JS nâng cao
                                                </a>
                                            </h3>
                                            <div class="bill-course__price">
                                                <span class="bill-course__price--new">990.000 đ</span>
                                                <span class="bill-course__price--old">990.000 đ</span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="bill-status">
                                        <span class="bill-status--waiting">
                                            Chờ xác nhận
                                        </span>

                                    </div>
                                </div>
                                <div class="bill-item">
                                    <div class="bill-course">
                                        <div class="bill-course-img">
                                            <a href="">
                                                <img src="./public/img/images/abc.jpg" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="bill-course-text">
                                            <h3 class="bill-course__name">
                                                <a href="">
                                                    JS nâng cao
                                                </a>
                                            </h3>
                                            <div class="bill-course__price">
                                                <span class="bill-course__price--new">990.000 đ</span>
                                                <span class="bill-course__price--old">990.000 đ</span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="bill-status">
                                        <span class="bill-status--waiting">
                                            Chờ xác nhận
                                        </span>

                                    </div>
                                </div>
                                <div class="bill-item">
                                    <div class="bill-course">
                                        <div class="bill-course-img">
                                            <a href="">
                                                <img src="./public/img/images/abc.jpg" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="bill-course-text">
                                            <h3 class="bill-course__name">
                                                <a href="">
                                                    JS nâng cao
                                                </a>
                                            </h3>
                                            <div class="bill-course__price">
                                                <span class="bill-course__price--new">990.000 đ</span>
                                                <span class="bill-course__price--old">990.000 đ</span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="bill-status">
                                        <span class="bill-status--bought">
                                            Đã mua
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="section-box course-function-item note">
                            <div class="head-section head-flex">
                                <span class="head-section__name">Ghi chú</span>
                                <span class="head-section__line"></span>
                                <span class="head-section__sub">1</span>
                            </div>
                            <div class="note-list">
                                <div class="note-item">
                                    <h3 class="note__course-name">
                                        <a href="">
                                            HTML
                                        </a>
                                    </h3>
                                    <div class="note-course-content-list">
                                        <div class="note-course-content-item">
                                            <span class="detail-content">
                                                ∘
                                                <!-- text -->
                                                DOM hello note DOM hello note DOM hello note DOM hello note
                                            </span>
                                            <span class="detail-date">
                                                1-1-2021
                                            </span>
                                        </div>
                                        <div class="note-course-content-item">

                                            <span class="detail-content">
                                                ∘
                                                <!-- text -->
                                                DOM hello note DOM hello note DOM hello note DOM hello note
                                            </span>
                                            <span class="detail-date">
                                                1-1-2021
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="note-item">
                                    <h3 class="note__course-name">
                                        <a href="">
                                            CSS
                                        </a>
                                    </h3>
                                    <div class="note-course-content-list">
                                        <div class="note-course-content-item">
                                            <span class="detail-content">
                                                ∘
                                                <!-- text -->
                                                DOM hello note DOM hello note DOM hello note DOM hello note
                                            </span>
                                            <span class="detail-date">
                                                1-1-2021
                                            </span>
                                        </div>
                                        <div class="note-course-content-item">

                                            <span class="detail-content">
                                                ∘
                                                <!-- text -->
                                                DOM hello note DOM hello note DOM hello note DOM hello note
                                            </span>
                                            <span class="detail-date">
                                                1-1-2021
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-ctrl-img">
        <div class="modal hide">
            <div class="modal__inner">
                <div class="modal__header">
                    <span></span>
                    <p>Cập nhật ảnh đại diện</p>
                    <i class="fas fa-times"></i>
                </div>
                <div class="modal__body">
                    <div class="modal__body__img">
                        <img src="./public/img/{{$dataInfo[0]['student_avatar']}}" alt="" />
                    </div>
                    <form class="modal__body__btn-file">
                        <label for="input-img" class="preview">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span>Chọn ảnh</span>
                        </label>
                        <input type="file" hidden id="input-img" />
                        <button class="btn-primary" type="submit">Lưu thay đổi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-detail-bill">

    </div>
    <div class="container-change-info">
        <div class="modal-user-info hide-user-info">
            <div class="modal-user-info__inner">
                <div class="modal-user-info__header">
                    <span></span>
                    <p>
                        Cập nhật ảnh đại diện
                    </p>
                    <i class="fas fa-times"></i>
                </div>
                <form class="modal-user-info__body">
                    <p class="user-email">anh@gmail.com</p>
                    <div class="form-row-1">
                        <div class="form-item">
                            <label for="">Họ và tên</label>
                            <input type="text" name="" value="{{$dataInfo[0]['student_name']}}" id="" />
                            <span class="mess-alert"></span>
                        </div>
                        <div class="form-item">
                            <label for="">Số điện thoại</label>
                            <input type="text" name="" value="{{$dataInfo[0]['student_phone']}}" id="" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-item">
                            <label for="">Tiểu sử</label>
                            <textarea name="" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form__btn">
                        <button class="btn-primary">Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="./public/js/customerJs/profile.js"></script>
@endsection