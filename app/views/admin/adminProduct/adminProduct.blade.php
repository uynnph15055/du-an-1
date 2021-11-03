@extends('admin.layouts.baseAdmin')
@section('title', 'Quản lý sản phẩm')
@section('main_content')
<div class="container">
    <h3 class="text-center" style="margin-bottom:30px">Quản lý sản phẩm</h3>
    <a href="./add-product-page" class="btn btn-success">Thêm sản phẩm</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Dạnh mục</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
            ?>
            @foreach ($dataProduct as $key)
            <tr>
                <td><?= $index++ ?></td>
                <td>{{$key->product_name}}</td>
                <td>
                    <img width="70px" src="./public/img/<?= $key->product_img ?>" alt="">
                </td>
                <td> {{$key->product_price}}</td>
                <td> {{$key->product_quantity}}</td>
                <td>{{$key->cate_id}}</td>
                <td><a class="btn btn-warning" href="./edit-product?id=<?= $key->id ?>">Edit</a></td>
                <td><a class="btn btn-danger" onclick="return confirm('Ban có muốn xóa dòng dữ liệu này ?')" href="./remove-product?id=<?= $key->id ?>">Remove</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('javascript')
@endsection