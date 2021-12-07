@extends('customer.layout.layout')
@section('title', 'Khóa học')
@section('main_content')
<style>
    .lesson_error {
        text-align: center;
    }

    .lesson_error .icon {
        font-size: 120px;
        color: #ccc;
    }

    .lesson_error-title {
        font-size: 18px;
        margin-top: 10px;
        color: #555;
    }

    .btn-primary {
        margin: 10px 0px;
    }

    .detail-name {
        padding-top: -20px;
    }

    .course__description {
        line-height: 1.4;
        text-align: justify;
        color: #777;
    }
</style>

<div class="container">
    <main class="bgr-light">
        <div class="container-fluid">
            <div class="course-detail" style="padding-top: 95px;">
                <div class="course-detail-text">
                    <div class="detail-name">
                        <h1 class="course__name">
                            @if(isset($subject))
                            {{$subject['subject_name']}}
                        </h1>
                        <p class="course__description">
                            {{$subject['subject_description']}}
                        </p>
                        @endif
                    </div>
                    <div class="detail-content">
                        @if(!empty($lesson))
                        <h3 class="content__title">
                            Nội dung khóa học
                        </h3>
                        <?php
                        $index = 1;
                        ?>
                        <div class="lesson-list">
                            @foreach($lesson as $key)
                            <div class="lesson-item-info">
                                <span class="lesson__index"><i class="fas fa-play-circle"></i></span>
                                <h4 class="lesson-item__title">
                                    Bài <?= $index++ ?> : {{$key['lesson_name']}}
                                </h4>
                                <span class="lesson__time">
                                    10:10
                                </span>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="lesson_error">
                            <i class="fas fa-sticky-note icon"></i>
                            <h2 class="lesson_error-title">Hiện chưa có bài học nào <i class="fas fa-exclamation"></i></h2>
                        </div>
                        @endif
                    </div>
                </div>
                @if(isset($user))
                <div class="course-detail-video">
                    <img src="./public/img/{{$subject['subject_img']}}" alt="" class="img-fluid course__img">

                    @foreach($dataBill as $valueBill)
                    @if($valueBill['code_vnpay']==$user['student_id'].$subject['subject_id'])
                    <?php $bill_vnpay = $valueBill['code_vnpay'] ?>
                    @endif
                    @endforeach
                    @if($subject['type_id'] == 0)
                    <a href="bai-hoc?mon={{$subject['subject_slug']}}" style="margin: 10px 0;" class="btn-primary">
                        Học ngay
                    </a>
                    <span style="display: block;color: #04d200;font-size: 20px;padding: 0 0 10px">Miễn phí</span>

                    @elseif(isset($bill_vnpay) && $bill_vnpay==$user['student_id'].$subject['subject_id'])

                    <a href="bai-hoc?mon={{$subject['subject_slug']}}" style="margin: 10px 0;" class="btn-primary">
                        Học ngay
                    </a>
                    @else
                    <a href="thanh-toan-vnpay?mon={{$subject['subject_slug']}}" style="margin: 10px 0;" class="btn-primary">
                        Mua khóa học
                    </a>
                    <div class="course-detail-price">
                        <span class="course-detail-price--new">100.000 đ</span>
                        <span class="course-detail-price--old">300.000 đ</span>
                    </div>
                    @endif
                    @if(!empty($lesson))
                    <span class="sub-des">Hiện có <?php echo count($lesson) ?> bài</span>
                    @else
                    <span class="sub-des">Chưa có bài nào </span>
                    @endif
                </div>
                @else
                <div class="course-detail-video">
                    <img src="./public/img/{{$subject['subject_img']}}" alt="" class="img-fluid course__img">
                    @if($subject['type_id'] == 0)
                    <a href="bai-hoc?mon={{$subject['subject_slug']}}" style="margin: 10px 0;" class="btn-primary">
                        Học ngay
                    </a>
                    <span style="display: block;color: #04d200;font-size: 20px;padding: 0 0 10px">Miễn phí</span>
                    @else
                    <a href="bai-hoc?mon={{$subject['subject_slug']}}" style="margin: 10px 0;" class="btn-primary">
                        Mua khóa học
                    </a>
                    <div class="course-detail-price">
                        <span class="course-detail-price--new">100.000 đ</span>
                        <span class="course-detail-price--old">300.000 đ</span>
                    </div>
                    @endif
                    @if(!empty($lesson))
                    <span class="sub-des">Hiện có <?php echo count($lesson) ?> bài</span>
                    @else
                    <span  class="sub-des">Chưa có bài nào</span>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </main>
</div>
@endsection