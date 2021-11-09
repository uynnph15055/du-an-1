@extends('admin.layouts.baseAdmin')
@section('title', 'Danh sách môn học')
@section('main_content')
<style>
    .warning-bg {
        display: flex;
        justify-content: center;
        /* align-items: center; */
        margin-top: 150px;
    }

    .warning {
        text-align: center;
        align-items: center;
    }

    .warning i {
        font-size: 100px;
    }
</style>
<div class="container">

    @if(empty($dataLesson) && isset($subject_id))
    <div class="warning-bg">
        <div class="warning">
            <i class="fas fa-exclamation-triangle"></i>
            <br>
            <br>
            <h5>Hiện chưa có bài học !!!</h5>
            <a href="./them-bai-hoc?id={{$subject_id}}">Thêm bài học</a>
        </div>
    </div>
    @else
    <h4 class="text-center">Danh sách bài học</h4>
    <div class="header__list">
    @foreach($dataLesson as $key)
    @if(isset($key['subject_id'][0]))
        <a href="them-bai-hoc?id={{$key['subject_id']}}" class="btn btn-primary">Thêm bài học </a>
        @break
        @endif
        @endforeach
        <!-- <h5 style="margin-bottom:-30px">Tổng số : {{$number}} môn</h5> -->
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr style="text-align: center;">
                <th>STT</th>
                <th>Tên bài</th>
                <th>Ảnh</th>
                <th>Trang thái</th>
                <th>Ngày Đăng</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
            ?>
            @foreach($dataLesson as $key)
            <tr style="text-align: center;">
                <td><?= $index++ ?></td>
                <td>{{$key['lesson_name']}}</td>
                <td>
                    <img width="50px" src="./public/img/{{$key['lesson_img']}}" alt="">
                </td>
                <!-- <td>{{$key['cate_name']}}</td> -->
                
                <td> @if($key['lesson_status']==1)
                   <span>Đã Mở</span>
                @endif
                </td>
                <td>{{$key['date_post']}}</td>
                <td><a class="btn btn-warning" onclick="return confirm('Bạn có muốn Sửa môn học này ?')" href="sua-khoa-hoc?id={{$key['lesson_id']}}&subject_id={{$key['subject_id']}}"><i class="fas fa-edit"></i></a></td>
                <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa môn học này ?')" href="xoa-bai-hoc?id={{$key['lesson_id']}}&subject_id={{$key['subject_id']}}"><i class="fas fa-trash"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection