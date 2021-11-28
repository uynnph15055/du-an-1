@extends('admin.layouts.baseAdmin')
@section('title', 'Danh sách khóa học')
@section('main_content')
<style>
    .input-text {
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 10px;
    }

    .header__list {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .select {
        width: 100%;
        border: 1px solid #ccc;
        color: #777;
        border-radius: 6px;
        height: 35px;
    }
</style>
<div class="container">
    <h4 class="text-center">Danh sách khóa học</h4>
    <div class="header__list">
        <a href="trang-them-mon-hoc" class="btn btn-primary">Thêm khóa </a>
    </div>
    <span style="float:right;font-style:italic">Tổng có : {{$number}} khóa</span>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th width="150px">Tên khóa</th>
                <th>Ảnh</th>
                <th>Chuyên ngành</th>
                <th>Trang thái</th>
                <th>Giá</th>
                <th>Khuyến mại</th>
                <th>Bài học</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = $stt;
            ?>
            @foreach($dataSubject as $key)
            <tr>
                <td><?= $index++ ?></td>
                <td>{{$key['subject_name']}}</td>
                <td>
                    <img width="100px" src="./public/img/{{$key['subject_img']}}" alt="">
                </td>
                <td>{{$key['cate_name']}}</td>
                <td>@if($key['type_id'] == 1)
                    <span style="color:red">Mất phí</span>
                    @else
                    <span style="color:green">Miễn phí</span>
                    @endif
                </td>
                <td>{{number_format($key['subject_price'])}} VNĐ</td>
                <td>{{number_format($key['subject_sale'])}} VNĐ</td>
                <td>
                    <a class="btn btn-info" href="chi-tiet-mon-hoc?mon={{$key['subject_slug']}}"><i class="fas fa-pager"></i></a>
                </td>
                <td><a class="btn btn-warning" href="sua-khoa-hoc?id={{$key['subject_id']}}"><i class="fas fa-edit"></i></a></td>
                <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa khóa học này ?')" href="xoa-khoa-hoc?id={{$key['subject_id']}}"><i class="fas fa-trash"></i></a></td>
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


<!-- dd($data['dataCateProduct']); -->
@endsection