@extends('admin.layouts.baseAdmin')
@section('title', 'chi tiết hóa đơn')
@section('main_content')
<div class="container" style="width:100%">
    <h4 style="padding-top:20px" class="text-center"> hóa đơn đơn tiết </h4>
    <div class="header__list">
    </div>

    <table class="table table-bordered">

        <thead>
            <tr>

                <th>STT</th>
                <th>Họ Tên</th>
                <th>Email</th>
                <th>Thời gian </th>
                <th>Mã hóa đơn</th>
            
                <th>Giá</th>
                <th>Nội dung</th>
              
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
                <td>{{$key['student_name']}}</td>
                <td>{{$key['student_email']}}</td>    
                <td><?php echo date('H:i d-m-Y', strtotime($key['transfer_time'])) ?></td>
             <td>CourseIFT-{{$key['code_vnpay']}}</td>

             <td>{{number_format($key['monney'])}} đ</td>
             <td>{{$key['note_bill']}}</td>
              
                <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa hóa đơn này ?')" href=""><i class="fas fa-trash"></i></a></td>

            </tr>
            @endforeach
        </tbody>
    </table>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

@endsection