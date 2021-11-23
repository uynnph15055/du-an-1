@extends('admin.layouts.baseAdmin')
@section('title', 'Danh sách bình luận')
@section('main_content')
<style>
    .warning-bg {
        display: flex;
        justify-content: center;
        /* align-items: center; */
        margin-top: 150px;
    }

    .warning {
        text-align: center;
        align-items: center;
    }

    .warning i {
        font-size: 100px;
    }
</style>
<div class="container">

    @if(empty($dataComment))
    <div class="warning-bg">
        <div class="warning">
            <i class="fas fa-exclamation-triangle"></i>
            <br>
            <br>
            <h5>Hiện chưa có bình luận !!!</h5>

        </div>
    </div>
    @else

    <h4 style="padding-top:20px" class="text-center">Danh sách bình luận</h4>
    <div class="header__list">


    </div>
    <span style="float:right;font-style:italic">Tổng có : {{$number}} bình luận</span>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Action</th>
                <th>STT</th>
                <th>Khách Hàng</th>
                <th>Nội dung</th>
                <th>Bài Học</th>
                <th>Ngày Cmt</th>
                <th width="78px">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <form action="xoa-binh-luan-where-checkbox" method="POST">


                <?php
                $index = 1;
                ?>
                @foreach($dataComment as $key)
                <input type="hidden" name="lesson_id" value="{{$key['lesson_id']}}">
                <tr>
                    <td><input type='checkbox' name='name[]' id='check_all' value='<?= $key['cmtt_id'] ?>' /></td>
                    <td><?= $index++ ?></td>
                    <td>{{$key['student_name']}}</td>
                    <td>{{$key['comment_content']}}</td>
                    <td>{{$key['lesson_name']}}</td>
                    <td>{{$key['date_post']}}</td>

                    <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa bình luận  này ?')" href="xoa-binh-luan?lesson_id={{$key['lesson_id']}}&cmtt_id={{$key['cmtt_id']}}"><i class="fas fa-trash"></i></a></td>
                </tr>
                @endforeach
        </tbody>
    </table>

    <input class="btn btn-info" type="button" id="btn1" value="Chọn hết" />
    <input class="btn btn-warning" type="button" id="btn2" value="Bỏ chọn" />
    <button class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa các bình luận này ?')"><i class="fas fa-trash"></i></button>
    <nav style="float: right;" aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for($i = 1 ; $i <=$page ; $i++) <li class="page-item"><a class="page-link" href="?trang={{$i}}&lesson_id={{$key['lesson_id']}}">{{$i}}</a></li>
                @endfor
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
        </ul>
    </nav>
    </form>
    @endif
</div>
  <script language="javascript">
    // Chức năng chọn hết
    document.getElementById("btn1").onclick = function() {
        // Lấy danh sách checkbox
        var checkboxes = document.getElementsByName('name[]');

        // Lặp và thiết lập checked
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = true;
        }
    };

    // Chức năng bỏ chọn hết
    document.getElementById("btn2").onclick = function() {
        // Lấy danh sách checkbox
        var checkboxes = document.getElementsByName('name[]');

        // Lặp và thiết lập Uncheck
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = false;
        }
    };
</script>
@endsection