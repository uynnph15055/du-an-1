@extends('admin.layouts.baseAdmin')
@section('title', 'Chi tiết học viên')
@section('main_content')
<style>
    .status-course-item {
        display: flex;
        background-color: #f8f9fc;
        padding: 10px;
    }

    .img-fluid {
        width: 100px;
        border-radius: 6px;
    }

    .status-course__name {
        color: #000;
        font-size: 15px;
    }

    .status-course-text {
        margin-left: 15px;
    }

    .status-course__count-lesson {
        position: absolute;
        right: 30px;
        font-size: 16px;
    }

    <?php

    use App\Models\modelLesson;

    ?>
</style>
<div id="content">
    <h3 class="text-center" style="margin-bottom: 30px;">Thông tin cá nhân</h3>
    <div class="container-fluid">
        <div class="container">
            <div class="profile_admin">
                <div class="row gutters">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="account-settings">
                                    <div class="user-profile">
                                        <div class="user-avatar">
                                            <img style="width: 175px; height: 175px; object-fit: cover; border-radius: 50%" class="img-fluid" src="{{$infoStudent['student_avatar']}}" alt="Maxwell Admin">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <br>
                                        <h6 class="text-center">Học viên</h6>
                                        <h5 class="user-name" style="color:brown">{{$infoStudent['student_name']}}</h5>
                                        <p>Email : {{$infoStudent['student_email']}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="card h-100">
                                <div class="cart-body">
                                    <div class="col">

                                        <h6>Khóa đang học:</h6>
                                        <div class="status-course-list">
                                            @foreach($dataCourseLeaning as $key)
                                            <?php $count_lesson = count(modelLesson::where("subject_id", "=", $key['subject_id'])->get()); ?>

                                            @if($key['sum_lesson'] < $count_lesson) <div class="status-course-item">
                                                <div class="status-course-img">
                                                    <a href="bai-hoc?mon={{$key['subject_slug']}}">
                                                        <img src="./public/img/{{$key['subject_img']}}" alt="" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="status-course-text" style="">
                                                    <h3 class="status-course__name">{{$key['subject_name']}}</h3>
                                                    <span style="margin-top: -20px;">Ngày bắt đầu : {{$key['date_start']}}</span>
                                                    <span class="status-course__count-lesson">{{$key['sum_lesson']}} / <?php echo count(modelLesson::where("subject_id", "=", $key['subject_id'])->get()); ?></span>
                                                </div>
                                                @endif
                                                @endforeach
                                        </div>
                                    </div>
                                    <div class="col" style="margin:20px 0px;margin-left:-10px">

                                        <h6>Khóa hoàn thành:</h6>
                                        <div class="status-course-list">
                                            @foreach($dataCourseLeaning as $key)
                                            <?php $count_lesson = count(modelLesson::where("subject_id", "=", $key['subject_id'])->get()); ?>

                                            @if($key['sum_lesson'] == $count_lesson) <div class="status-course-item">
                                                <div class="status-course-img">
                                                    <a href="bai-hoc?mon={{$key['subject_slug']}}">
                                                        <img src="./public/img/{{$key['subject_img']}}" alt="" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="status-course-text" style="">
                                                    <h3 class="status-course__name">{{$key['subject_name']}}</h3>
                                                    <span style="margin-top: -20px;">Ngày bắt đầu : {{$key['date_start']}}</span>
                                                    <span class="status-course__count-lesson">{{$key['sum_lesson']}} / <?php echo count(modelLesson::where("subject_id", "=", $key['subject_id'])->get()); ?></span>
                                                </div>
                                                @endif
                                                @endforeach
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
    </div>
</div>
</div>
</div>
</div>
</div>
@endsection