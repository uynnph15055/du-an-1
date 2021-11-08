@extends('admin.layouts.baseAdmin')
@section('title', 'Danh sách môn học')
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

    th {
        font-size: 15px;
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
    <h4 class="text-center">Danh sách môn học</h4>
    <div class="header__list">
        <a href="trang-them-mon-hoc" class="btn btn-primary">Thêm môn </a>
        <h5 style="margin-bottom:-30px">Tổng số : {{$number}} môn</h5>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên môn</th>
                <th>Ảnh</th>
                <th>Danh mục</th>
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
                    <img width="50px" src="./public/img/{{$key['subject_img']}}" alt="">
                </td>
                <td>{{$key['cate_name']}}</td>
                <td>@if($key['type_id'] == 1)
                    <span style="color:red">Mất phí</span>
                    @else
                    <span style="color:green">Miễn phí</span>
                    @endif
                </td>
<<<<<<< HEAD
                <td style="color: red;">{{ number_format( $key['subject_price'])}} VNĐ</td>
                <td  style="color: red;">{{ number_format( $key['subject_sale'])}} VNĐ</td>
                <td>{{$key['date_post']}}</td>
                <td><a class="btn btn-warning" onclick="return confirm('Bạn có muốn Sửa môn học này ?')" href="sua-khoa-hoc?id={{$key['subject_id']}}">Sửa</a></td>
                <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa môn học này ?')" href="xoa-khoa-hoc?id={{$key['subject_id']}}">Xóa</a></td>
=======
                <td>{{$key['subject_price']}}</td>
                <td>{{$key['subject_sale']}}</td>
                <td>
                    <a class="btn btn-info" href="chi-tiet-mon-hoc?mon={{$key['subject_slug']}}"><i class="fas fa-pager"></i></a>
                </td>
                <td><a class="btn btn-warning" onclick="return confirm('Bạn có muốn Sửa môn học này ?')" href="sua-khoa-hoc?id={{$key['subject_id']}}"><i class="fas fa-edit"></i></a></td>
                <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa môn học này ?')" href="xoa-khoa-hoc?id={{$key['subject_id']}}"><i class="fas fa-trash"></i></a></td>
>>>>>>> 6133e49c451e7cb08f95108a5736d889c325ea8d
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