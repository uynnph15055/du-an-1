@extends('admin.layouts.baseAdmin')
@section('title', 'Danh sách menu')
@section('main_content')
<div class="container">
    <h3 class="text-center">Danh sách học viên</h3>
    <table class="table table-bordered" style="margin-top:30px">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Email</th>
                <th width="80px">Chi tiết</th>
                <th width="80px">Sửa</th>
                <th width="80px">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
            ?>
            @foreach($dataStudent as $key)
            <tr>
                <td><?= $index++ ?></td>
                <td>{{$key['student_name']}}</td>
                <td>
                    <img width="60px" src="./public/img/{{$key['student_avatar']}}" alt="">
                </td>
                <td>{{$key['student_email']}}</td>
                <td><a class="btn btn-success" href=""><i class="fas fa-address-card"></i></a></td>
                <td><a class="btn btn-warning" href=""><i class="fas fa-edit"></i></a></td>
                <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa menu này ?')" href=""><i class="fas fa-trash"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection