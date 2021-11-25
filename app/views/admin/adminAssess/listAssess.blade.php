@extends('admin.layouts.baseAdmin')
@section('title', 'Danh sách đánh giá')
@section('main_content')
<div class="container" style="width:980px">

    <h4 class="text-center">Danh sách đánh giá học viên</h4>
    <div class="header__list">
    </div>
    <span style="float:right;font-style:italic"></span>
    <table class="table table-bordered" style="margin-top: 20px;">
        <thead>
            <tr>
                <th width="80px">STT</th>
                <th>Nội dung</th>
                <th>Số sao</th>
                <th width="90px">Hiển thị</th>
                <th width="78px">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 1; ?>
            @foreach($dataAssess as $key)
            <tr>
                <td><?= $index++ ?></td>
                <td>{{$key['assess_content']}}</td>
                <td>{{$key['assess_star']}}</td>
                <td><a class="btn btn-success" href=""><i class="fas fa-eye"></i></a></td>
                <td><a class="btn btn-danger" href=""><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection