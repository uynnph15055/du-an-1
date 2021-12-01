@extends('admin.layouts.baseAdmin')
@section('title', 'Danh sách menu')
@section('main_content')
<style>
    th {
        text-align: center;
    }
</style>
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
                <th width="80px">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = $stt;
            ?>
            @foreach($dataStudent as $key)
            <tr>
                <td><?= $index++ ?></td>
                <td>{{$key['student_name']}}</td>
                <td style="text-align: center;">
                    <img width="100px" src="{{$key['student_avatar']}}" alt="">
                </td>
                <td>{{$key['student_email']}}</td>
                <td><a class="btn btn-success" href="chi-tiet-hoc-vien?student_id={{$key['student_id']}}"><i class="fas fa-address-card"></i></a></td>
                <td><a class="btn btn-danger" href="xoa-hoc-vien?student_id={{$key['student_id']}}" onclick="return confirm('Bạn có muốn xóa học viên này ?')" href=""><i class="fas fa-trash"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav style="float: right;" aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for($i = 1 ; $i <=$page ; $i++) <li class="page-item"><a class="page-link" href="?trang={{$i}}">{{$i}}</a></li>
                @endfor
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
        </ul>
    </nav>
</div>
@endsection