@extends('admin.layouts.baseAdmin')
@section('title', 'Danh sách môn học')
@section('main_content')
<style>
    .input-text {
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 10px;
    }
</style>
<div class="container">
    <!-- Button trigger modal -->
    <!-- Chèn slug 
    Nhập vào cần  : onkeyup="ChangeToSlug()" ,  id="slug" ;
    Tự động : id="convert_slug"
      -->
    @if(isset($editSubject))
    <h3 class="text-center">Danh sách môn học</h3>
    <div class="row">
        <div class="col-4">
            <h4>Sửa môn học</h4>
            @if(isset($dataEditSubject))
         
            <form method="POST" enctype="multipart/form-data" action="update-mon-hoc">
            @foreach($dataEditSubject as $key)
                <input type="hidden" name="subject_id" value="{{$key['subject_id']}}">

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên môn học</label>
                    <input type="text" value="{{$key['subject_name']}}"  class="form-control" onkeyup="ChangeToSlug()" placeholder="Tên khóa học" name="subject_name" id="slug" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Slug</label>
                    <input type="text" value="{{$key['subject_slug']}}" class="form-control" id="convert_slug" name="subject_slug" placeholder="Slug khóa học">
                </div>
                <img width="60px" src="./public/img/{{$key['subject_img']}}" alt="">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ảnh</label>
                    <input type="file" name="subject_img" id="convert_slug">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Giới thiệu</label>
                    <br>
                    <textarea class="input-text" value="{{$key['subject_slug']}}" placeholder="Giới thiệu môn học" name="subject_description" rows="7" cols="41"></textarea>
                </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Thêm</button>
          
            </form>

            @endif
        </div>
        <div class="col-8" style="margin-top:70px">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên môn</th>
                        <th>Ảnh</th>
                        <th>Trạng thái</th>
                        <th>Ngày đăng</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $index = 1;
                    ?>
                    @foreach($dataSubject as $key)
                    <tr>
                        <td><?= $index++ ?></td>
                        <td>{{$key['subject_name']}}</td>
                        <td>
                            <img width="60px" src="./public/img/{{$key['subject_img']}}" alt="">
                        </td>
                        <td>{{$key['subject_status']}}</td>
                        <td>{{$key['date_post']}}</td>
                        <td><a class="btn btn-warning" onclick="return confirm('Bạn có muốn Sửa môn học này ?')" href="sua-khoa-hoc?id={{$key['subject_id']}}">Sửa</a></td>
                        <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa môn học này ?')" href="xoa-khoa-hoc?id={{$key['subject_id']}}">Xóa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@else
<h3 class="text-center">Danh sách môn học</h3>
<div class="row">
    <div class="col-4">
        <h4>Thêm khóa học</h4>
        <form method="POST" enctype="multipart/form-data" action="them-mon-hoc">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên môn học</label>
                <input type="text" class="form-control" onkeyup="ChangeToSlug()" placeholder="Tên khóa học" name="subject_name" id="slug" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Slug</label>
                <input type="text" class="form-control" id="convert_slug" name="subject_slug" placeholder="Slug khóa học">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Ảnh</label>
                <input type="file" name="subject_img" id="convert_slug">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Giới thiệu</label>
                <br>
                <textarea class="input-text" placeholder="Giới thiệu môn học" name="subject_description" rows="7" cols="41"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
    <div class="col-8" style="margin-top:70px">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên môn</th>
                    <th>Ảnh</th>
                    <th>Trạng thái</th>
                    <th>Ngày đăng</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 1;
                ?>
                @foreach($dataSubject as $key)
                <tr>
                    <td><?= $index++ ?></td>
                    <td>{{$key['subject_name']}}</td>
                    <td>
                        <img width="60px" src="./public/img/{{$key['subject_img']}}" alt="">
                    </td>
                    <td>{{$key['subject_status']}}</td>
                    <td>{{$key['date_post']}}</td>
                    <td><a class="btn btn-warning" onclick="return confirm('Bạn có muốn Sửa môn học này ?')" href="sua-khoa-hoc?id={{$key['subject_id']}}">Sửa</a></td>
                    <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa môn học này ?')" href="xoa-khoa-hoc?id={{$key['subject_id']}}">Xóa</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endif

<!-- dd($data['dataCateProduct']); -->
@endsection