@extends('admin.layouts.baseAdmin')
@section('title', 'Danh sách môn học')
@section('main_content')
<div class="container">
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
                <td>
                    <a href=""></a>
                </td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection