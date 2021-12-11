@extends('customer.layout.layout')
@section('title', 'Khóa học')
@section('main_content')

<div class="container" style="margin-top:40px">
    <div class="profile-section">
        <div class="container-fluid">
            <div class="profile-grid">
                <div class="profile-control">
                    <div class="section-box profile-control-general">
                        <div class="general-img">

                            <img src="{{$dataInfo[0]['student_avatar']}}" alt="" class="img-fluid">

                            <abbr class="open-modal-btn" title=" Chỉnh sửa ảnh">
                                <button style="z-index: 1;" class="ctrl-img"><i class="fas fa-camera"></i></button>
                            </abbr>
                        </div>
                        <div class="general-text">
                            <h4 class="general__username">{{$dataInfo[0]['student_name']}}</h4>
                            <?php $sumPoint = 0;
                            foreach ($countPoint as $key) :
                                $sumPoint += $key['question_point'];
                            endforeach
                            ?>
                            <div class="general-exp"><i class="fas fa-trophy"></i> <?= $sumPoint ?> EXP</div>
                            @if(isset($dataInfo[0]['student_story']))
                            <p class="general__bio">
                                {{$dataInfo[0]['student_story']}}
                            </p>
                            @endif
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
                                @if(!empty($dataInfo[0]['student_phone']))
                                <div class="info-item">
                                    <span class="info-item__title">
                                        Số điện thoại :
                                    </span>
                                    <span class="info-item__content">
                                        {{$dataInfo[0]['student_phone']}}
                                    </span>
                                </div>
                                @endif
                            </div>
                            @if(!empty($dataInfo[0]['student_password']))
                            <a class="change-pass-link" href="doi-mat-khau">Đổi mật khẩu</a>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="profile-course">
                    <?php

                    use App\Models\modelLesson;

                    ?>
                    <div class="profile-course-item">
                        <div class="section-box course-status course-status--studying">
                            <div class="status-head head-grid">
                                <span class="head-status__icon"><i class="fas fa-book-reader"></i></span>
                                <span class="head-status__name">Khóa đang học</span>
                                <?php $i = 0 ?>
                                @foreach($dataCourseLeaning as $key)
                                <?php $count_lesson = count(modelLesson::where("subject_id", "=", $key['subject_id'])->get()); ?>

                                @if($key['sum_lesson'] < $count_lesson) <?php $i += 1 ?> @endif @endforeach <span class="head-status__sub"> <?php echo $i ?></span>
                            </div>
                            <div class="status-content">

                                <div class="status-course-list">
                                    @foreach($dataCourseLeaning as $key)
                                    <?php $count_lesson = count(modelLesson::where("subject_id", "=", $key['subject_id'])->get()); ?>

                                    @if($key['sum_lesson'] < $count_lesson) <div class="status-course-item">
                                        <div class="status-course-img">
                                            <a href="bai-hoc?mon={{$key['subject_slug']}}">
                                                <img src="./public/img/{{$key['subject_img']}}" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="status-course-text">
                                            <h3 class="status-course__name"><a href="">{{$key['subject_name']}}</a></h3>
                                            <p style="line-height: 1.4; font-size: 14px;">Ngày bắt đầu : {{$key['date_start']}}</p>
                                            <span class="status-course__count-lesson">{{$key['sum_lesson']}} / <?php echo count(modelLesson::where("subject_id", "=", $key['subject_id'])->get()); ?></span>
                                        </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="section-box course-status course-status--done">
                        <div class="status-head head-grid">
                            <span class="head-status__icon"><i class="fas fa-medal"></i></span>

                            <span class="head-status__name">Khóa đã hoàn thành</span>
                            <?php $index = 0 ?>
                            @foreach($dataCourseLeaning as $key)
                            <?php $count_lesson = count(modelLesson::where("subject_id", "=", $key['subject_id'])->get()); ?>

                            @if($key['sum_lesson'] == $count_lesson)

                            <?php $index += 1 ?>
                            @endif

                            @endforeach
                            <span class="head-status__sub"> <?php echo $index ?></span>
                        </div>
                        <div class="status-content">
                            <div class="status-course-list">
                                @foreach($dataCourseLeaning as $key)
                                <?php $count_lesson = count(modelLesson::where("subject_id", "=", $key['subject_id'])->get()); ?>
                                @if($key['sum_lesson'] == $count_lesson)
                                <div class="status-course-item">
                                    <div class="status-course-img">
                                        <a href="bai-hoc?mon={{$key['subject_slug']}}">
                                            <img src="./public/img/{{$key['subject_img']}}" alt="" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="status-course-text">
                                        <h3 class="status-course__name"><a href="">{{$key['subject_name']}}</a></h3>
                                        <p style="line-height: 1.4; font-size: 14px;">Ngày bắt đầu: {{$key['date_start']}}</p>
                                        <span class="status-course__count-lesson">{{$key['sum_lesson']}} / <?php echo count(modelLesson::where("subject_id", "=", $key['subject_id'])->get()); ?></span>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="course-function">
                    <div class="section-box course-function-item bill">
                        <div class="head-section head-flex">
                            <span class="head-section__name">Đơn mua</span>
                            <span class="head-section__line"></span>
                            <span class="head-section__sub"><?php echo count($dataBillJoinSubject) ?></span>
                        </div>
                        <div class="bill-list">
                            @foreach($dataBillJoinSubject as $keyBillJoinSubject)
                            <div class="bill-item">
                                <div class="bill-course">
                                    <div class="bill-course-img">
                                        <a href="">
                                            <img src="./public/img/{{$keyBillJoinSubject['subject_img']}}" alt="" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="bill-course-text">
                                        <h3 class="bill-course__name">

                                            {{$keyBillJoinSubject['subject_name']}}

                                        </h3>
                                        <div class="bill-course__price" style="margin-bottom:10px">
                                            <span class="bill-course__price--new"> {{number_format($keyBillJoinSubject['subject_sale'])}} đ</span>
                                            <span class="bill-course__price--old">{{number_format($keyBillJoinSubject['subject_price'])}} đ</span>
                                        </div>

                                    </div>
                                </div>
                                <div class="bill-status">
                                    <span class="bill-status--waiting">
                                        TG :<?php echo date('d-m-Y', strtotime($keyBillJoinSubject['transfer_time']))  ?>
                                    </span>

                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div>

                        </div>
                        @if(!empty($dataBillJoinSubject))
                        <a href="chi-tiet-hoa-don" style="display:block;text-align:center;margin-top:15px ;background:linear-gradient(to right, #0098d2, #00bcca) ; padding:10px;width:100px;border-radius: 5px;   text-align: center;
  transform:translateX(150px);color:#ffff">Xem tất cả</a>
                        @endif
                    </div>
                    <div class="section-box course-function-item note">
                        <div class="head-section head-flex">
                            <span class="head-section__name">Ghi chú</span>
                            <span class="head-section__line"></span>
                            <span class="head-section__sub"><?php echo count($dataNote) ?></span>
                        </div>
                        <div class="note-list">
                            @foreach($dataNote as $key)
                            <div class="note-item">
                                <h3 class="note__course-name">
                                    <a href="">
                                        {{$key['lesson_name']}}
                                    </a>
                                </h3>
                                <div class="note-course-content-list">
                                    <div class="note-course-content-item">
                                        <span class="detail-content">
                                            ∘
                                            <!-- text -->
                                            {{$key['content_note']}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal img -->
<div class="container-ctrl-img">
    <div class="modal hide" style=" margin-top: 65px;">
        <div class="modal__inner">
            <div class="modal__header">
                <span></span>
                <p>Cập nhật ảnh đại diện</p>
                <i class="fas fa-times"></i>
            </div>
            <div class="modal__body">
                <div class="modal__body__img">
                    <img id="img_main" src="{{$dataInfo[0]['student_avatar']}}" alt="" />
                </div>
                <form method="POST" action="thay-anh-dai-dien" enctype="multipart/form-data" class="modal__body__btn-file">
                    <label for="banner_img" class="preview">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <span>Chọn ảnh</span>
                    </label>
                    <input type="file" name="student_img_new" onchange="banner_imgg()" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" hidden id="banner_img" />
                    <button class="btn-primary" type="submit">Lưu thay đổi</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal bill -->
<!-- <div class="container-detail-bill">
    <div class="modal-bill hide">
        <div class="modal-bill__inner">
            <div class="modal-bill__header">
                <span></span>
                <p>Chi tiết</p>
                <i class="fas fa-times"></i>
            </div>
            <div class="modal-bill__body">

            </div>
        </div>
    </div>
</div> -->

<!-- modal info -->
<div class="container-change-info">
    <div class="modal-user-info hide-user-info">
        <div class="modal-user-info__inner">
            <div class="modal-user-info__header">
                <span></span>
                <p>
                    Cập nhật thông tin
                </p>
                <i class="fas fa-times"></i>
            </div>
            <form method="POST" action="thay-doi-thong-tin" class="modal-user-info__body">
                <p class="user-email">{{$dataInfo[0]['student_email']}}</p>
                <div class="form-row-1">
                    <div class="form-item">
                        <label for="">Họ và tên</label>
                        <input type="text" placeholder="Họ và tên" name="student_name" value="{{$dataInfo[0]['student_name']}}" id="" />
                        <span class="mess-alert"></span>
                    </div>
                    <div class="form-item">
                        <label for="">Số điện thoại</label>
                        <input type="text" name="student_phone" value="{{$dataInfo[0]['student_phone']}}" id="" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-item">
                        <label for="">Tiểu sử</label>
                        <textarea name="student_story" id="" cols="30" rows="10">{{$dataInfo[0]['student_story']}}</textarea>
                    </div>
                </div>
                <div class="form__btn">
                    <button class="btn-primary">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="./public/js/customerJs/profile.js"></script>
<script>
    function banner_imgg() {
        var banner_img = document.getElementById('banner_img').files;

        if (banner_img.length > 0) {
            var filetoload = banner_img[0];
            var fileReader = new FileReader();
            fileReader.onload = function(fileLoaderEvent) {
                var srcData = fileLoaderEvent.target.result;
                var newimg = document.createElement('img');
                newimg.src = srcData;
                document.getElementById('img_main').src = newimg.src;
            }
            fileReader.readAsDataURL(filetoload);
        }
    }
</script>
@endsection