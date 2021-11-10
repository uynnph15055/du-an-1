@extends('admin.layouts.baseAdmin')
@section('title', 'Danh sách môn học')
@section('main_content')
<div class="container">
    <h4 class="text-center">Danh sách menu</h4>
    <div class="row">
        @if(isset($row))
        <h5>Sửa menu</h5>
        <div class="col-4">
            <form action="sua-menu" method="POST">
                <input type="text" hidden value="{{$row['menu_id']}}" name="menu_id">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên menu</label>
                    <input type="text" class="form-control" placeholder="Tên menu" value="{{$row['menu_name']}}" name="menu_name" id="slug" onkeyup="ChangeToSlug()" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Slug menu</label>
                    <input type="text" placeholder="Slug menu" id="convert_slug" value="{{$row['menu_slug']}}" name="menu_slug" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        @else
        <h5>Thêm menu</h5>
        <div class="col-4">
            <form action="them-menu" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên menu</label>
                    <input type="text" class="form-control" placeholder="Tên menu" name="menu_name" id="slug" onkeyup="ChangeToSlug()" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Slug menu</label>
                    <input type="text" placeholder="Slug menu" id="convert_slug" name="menu_slug" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        @endif
        <div class="col-8">
            <table class="table table-bordered" style="margin-top:30px">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên menu</th>
                        <th>Slug menu</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $index = 1;
                    ?>
                    @foreach($dataMenu as $key)
                    <tr>
                        <td><?= $index++ ?></td>
                        <td>{{$key['menu_name']}}</td>
                        <td>{{$key['menu_slug']}}</td>
                        <td><a class="btn btn-warning" href="trang-sua-menu?id={{$key['menu_id']}}"><i class="fas fa-edit"></i></a></td>
                        <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa menu này ?')" href="xoa-menu?id={{$key['menu_id']}}"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection