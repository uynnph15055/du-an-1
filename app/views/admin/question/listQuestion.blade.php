@extends('admin.layouts.baseAdmin')
@section('title', 'Danh sách câu hỏi')
@section('main_content')
<div class="container">
    <h4 class="text-center">Danh sách câu hỏi</h4>
    <a class="btn btn-primary" href="trang-them-cau-hoi">Thêm câu hỏi</a>
    <br>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Đề bài</th>
                <th>Ảnh</th>
                <th>Thuộc bài</th>
                <th>Đáp án</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
            ?>
            @foreach($dataQuestion as $key)
            <tr>
                <td><?= $index++ ?></td>
                <td>{{$key['heading']}}</td>
                <td>{{$key['heading_img']}}</td>
                <td>{{$key['answer']}}</td>
                <td>{{$key['answer']}}</td>
                <td>
                    <a class="btn btn-warning" href=""><i class="fas fa-edit"></i></a>
                </td>
                <td>
                    <a class="btn btn-danger" href=""><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection