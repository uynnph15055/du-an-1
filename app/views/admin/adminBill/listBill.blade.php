@extends('admin.layouts.baseAdmin')
@section('title', 'hóa đơn')
@section('main_content')
<div class="container" style="width:1080px">
    <h4 style="padding-top:20px" class="text-center">Danh sách hóa đơn</h4>
    <div class="header__list">
        <span> Tổng doanh thu : {{number_format($sumAll)}} đ</span>
    </div>
    <table class="table table-bordered">

        <thead>
            <tr>

                <th>STT</th>
                <th>Ảnh</th>
                <th>Môn học</th>
                <th>Số lượng</th>
                <th>Cũ nhất</th>
                <th>Mới nhất</th>
                <th>Tổng tiền</th>
                <th>Chi tiết</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>



            <?php
            $index = 1;

            ?>
            @foreach($dataBill as $key)

            <tr>

                <td><?= $index++ ?></td>
                <td><img style="width:100px;" src="./public/img/{{$key['subject_img']}}" alt=""></td>
                <td>{{$key['subject_name']}}</td>
                <td>{{$key['so_luong']}}</td>
                <td><?php echo date('H:i d-m-Y', strtotime($key['cu_nhat'])) ?></td>
                <td><?php echo date('H:i d-m-Y', strtotime($key['moi_nhat'])) ?></td>
                <td>{{number_format($key['tong_tien'])}} đ</td>
                <th><a class="btn btn-info" href="chi-tiet-hoa-don-admin?subject_id={{$key['subject_id']}}"><i class="fas fa-align-justify"></i></a></th>
                <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa bình luận  này ?')" href=""><i class="fas fa-trash"></i></a></td>

            </tr>
            @endforeach
        </tbody>
    </table>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

@endsection