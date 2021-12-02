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
                <th>Mã hóa đơn</th>
                <th>Ngân hàng</th>
                <th>Thời gian</th>
                <th>Tổng tiền</th>
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
                <td>{{$key['code_vnpay']}}</td>
                <td>{{$key['code_back']}}</td>
                <td><?php echo date('d-m-Y', strtotime($key['moi_nhat'])) ?></td>
                <td>{{number_format($key['tong_tien'])}} đ</td>

                <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa bình luận  này ?')" href=""><i class="fas fa-trash"></i></a></td>

            </tr>
            @endforeach
        </tbody>
    </table>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

@endsection