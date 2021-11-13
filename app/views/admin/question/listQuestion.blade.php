@extends('admin.layouts.baseAdmin')
@section('title', 'Danh sách câu hỏi')
@section('main_content')
<div class="container">
    <h4 class="text-center">Danh sách câu hỏi</h4>
    <a href="de-mo-bai-tap">demo</a>
    @if($lesson_id)
    <a class="btn btn-primary" href="trang-them-cau-hoi?lesson_id={{$lesson_id}}">Thêm câu hỏi</a>
    @endif
    <br>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Đề bài</th>
                <th>Ảnh</th>

                <th>Đáp án</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
            ?>
            <?php foreach ($dataQuestion as $key) {
                $a = explode("/", $key['answer']);


            ?>
                <tr>
                    <td><?= $index++ ?></td>
                    <td>{{$key['question']}}</td>
                    <td><img style="height: 60px; width:50px" src="./public/img/{{$key['question_img']}}" alt=""></td>
                    <td>
                        <?php foreach ($a as $value) {
                 
                            ?>
                            - <?= $value ?>
                            <br> <?php } ?>
                    </td>
                    <td>
                        <a class="btn btn-warning" href=""><i class="fas fa-edit"></i></a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href=""><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

@endsection