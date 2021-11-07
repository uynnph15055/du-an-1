@extends('admin.layouts.baseAdmin')
@section('title', 'Danh sách môn học')
@section('main_content')
<style>
    .input-text {
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 10px;
    }

    .select {
        width: 100%;
        border: 1px solid #ccc;
        color: #777;
        border-radius: 6px;
        height: 35px;
        padding-left: 10px;
    }

    .btn-price {
        margin-top: 10px;
        background-color: #4e73df;
        color: #ffff;
        border: none;
        border-radius: 6px;
        padding: 2px 20px;
        margin-bottom: 20px;
    }

    .container-bg {
        width: 400px;
    }
</style>
<div class="container">
    <h4 class="text-center">Thêm môn học</h4>
    <form method="POST" enctype="multipart/form-data" action="them-mon-hoc">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên môn học</label>
                    <input type="text" class="form-control" onkeyup="ChangeToSlug()" placeholder="Tên khóa học" name="subject_name" id="slug" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên môn học</label>
                    <input type="text" class="form-control" placeholder="Tên khóa học" name="subject_slug" id="convert_slug" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Kiểu môn học</label>
                    <br>
                    <select class="select" name="subject_type" id="type_id" aria-label="Default select example">
                        <option value="" selected>Loại môn học</option>
                        <option value="0">Miễn phí</option>
                        <option value="1">Trả phí</option>
                    </select>
                    <div class="accordion" id="accordionSection">
                        <div class="accordion-item mb-3" style="margin-top:20px">
                            <h2 class="accordion-header">
                                <button type="button" style="display:none" class="accordion-button collapsed price__import" data-bs-toggle="collapse" data-bs-target="#collapseOne">Thêm giá cho môn học</button>
                            </h2>
                            <div class="accordion-collapse collapse" id="collapseOne" data-bs-parent="#accordionSection">
                                <div class="accordion-body price__import">
                                    <div class='input-group'>
                                        <input type='text' placeholder='Giá sản phẩm' name='subject_price' aria-label='First name' class='form-control'>
                                        <input type='text' placeholder='Giá giảm sản phẩm' name='subject_sale' aria-label='Last name' class='form-control'>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Thuộc danh mục</label>
                    <br>
                    <select name="cate_id" class="select" aria-label="Default select example">
                        <option value="" selected>---Danh mục---</option>
                        @foreach($cateSubject as $key)
                        <option value="{{$key['cate_id']}}">{{$key['cate_name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ảnh</label>
                    <input type="file" name="subject_img" id="convert_slug">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Giới thiệu</label>
                    <br>
                    <textarea class="input-text" placeholder="Giới thiệu môn học" name="subject_description" rows="5" cols="65"></textarea>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $(document).ready(function() {
        $('#type_id').on('change', function() {
            var type_id = $(this).val();
            if (type_id == 1) {
                $('.price__import').css("display", "block");
            } else {
                $('.price__import').css("display", "none");
            }
        });
    });
</script>

@endsection