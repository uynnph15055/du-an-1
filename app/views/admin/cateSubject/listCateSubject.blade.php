@extends('admin.layouts.baseAdmin')
@section('title', 'Danh sách môn học')
@section('main_content');
<div class="container">
    <h4 class="text-center">Danh sách danh mục</h4>
    @if(isset($editCate))
    <div class="row">
        <div class="col-4">
            <h5>Sửa danh mục môn học</h5>
            <form method="POST" action="update-danh-muc">
                @foreach($modelCate as $value)
                <input type="hidden" name="cate_id"  value="{{$value['cate_id']}}" >
                <div class="mb-3">
                    <label for="exampleInputEmail1"  class="form-label">Tên danh mục</label>
                    <input type="text" class="form-control" value="{{$value['cate_name']}}" onkeyup="ChangeToSlug()" placeholder="Tên khóa học" name="cate_name" id="slug" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Slug</label>
                    <input type="text" class="form-control" value="{{$value['cate_slug']}}" id="convert_slug" name="cate_slug" placeholder="Slug danh mục">
                </div>
                <button type="submit" id="submit" class="btn btn-primary">Update</button>
           @endforeach
            </form>
        </div>
        @else
        <div class="row">
        <div class="col-4">
            <h5>Thêm danh mục môn học</h5>
            <form method="POST" action="them-danh-muc">
                <div class="mb-3">
                    <label for="exampleInputEmail1"  class="form-label">Tên danh mục</label>
                    <input type="text" class="form-control" onkeyup="ChangeToSlug()" placeholder="Tên khóa học"  name="cate_name" id="slug" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="convert_slug" id="cate_slug" name="cate_slug" placeholder="Slug danh mục">
                </div>
                <button type="submit" id="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    @endif
        <div class="col-8" style="margin-top: 30px;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên môn</th>
                        <th>Ngày đăng </th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $index = 1;
                    ?>
                    @foreach($dataCate as $key);
                    <tr>
                        <td><?= $index++ ?></td>
                        <td>{{$key['cate_name']}}</td>
                        <td>{{$key['date_create']}}</td>
                        <td><a class="btn btn-warning" onclick="return confirm('Bạn có muốn Sửa môn học này ?')" href="sua-danh-muc?id={{$key['cate_id']}}">Sửa</a></td>
                        <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa môn học này ?')" href="xoa-danh-muc?id={{$key['cate_id']}}">Xóa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    

</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function(){

    })
    $("#submit").click(function(e){
      
        var cate_name=$("#cate_name").val();
        var cate_slug=$("#slug").val();
        if( cate_name == '' || cate_slug == '' ){
            e.preventDefault();
            Swal.fire({
  icon: 'warning',
  title: 'Không được bỏ trống',
  timer: 3000,
})
        }
    })

</script>
@endsection