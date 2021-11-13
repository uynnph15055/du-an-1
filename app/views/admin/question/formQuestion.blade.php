@extends('admin.layouts.baseAdmin')
@section('title', 'Danh sách câu hỏi')
@section('main_content')
<div class="container">
    <h4 style="margin-bottom:30px" class="text-center">Thêm câu hỏi</h4>
    <form method="POST" action="them-cau-hoi" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <input type="text" hidden name="lesson_id" value="{{$lesson_id}}">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Chọn ảnh cho câu hỏi (Nếu có)</label>
                    <br>
                    <input type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" name="question_img">
                </div>
                <textarea placeholder="Thêm câu hỏi vào đây" name="question" id="summernote"></textarea>
            </div>
            <div class="col">
                <div style="margin-top:47px">
                    <label for="">Đáp án</label>
                    <br>
                    <textarea placeholder="Câu A" id="answer_one" style="border-radius: 10px; padding:5px" name="answer_one" id="answer_one" cols="40" rows="1"></textarea>
                </div>
                <br>
                <div>
                    <textarea placeholder="Câu B" id="answer_two" style="border-radius: 10px; padding:5px" name="answer_two" id="answer_two" cols="40" rows="1"></textarea>
                </div>
                <br>
                <div>
                    <textarea placeholder="Câu C" id="answer_three" style="border-radius: 10px; padding:5px" name="answer_three" id="answer_three" cols="40" rows="1"></textarea>
                </div>
                <br>
                <div>
                    <textarea placeholder="Câu D" id="answer_four" style="border-radius: 10px; padding:5px" name="answer_four" id="answer_four" cols="40" rows="1"></textarea>
                </div>
                <br>
                <label for="">Đáp Án Đúng</label>
                <div>
                    <label for="">A.</label>
                    <input type="checkbox" name="answer_A" onclick="a()" id="answer_A" value=""> &nbsp
                    <label for="">B.</label>
                    <input type="checkbox" name="answer_B" onclick="b()" id="answer_B" value=""> &nbsp
                    <label for="">C.</label>
                    <input type="checkbox" name="answer_C" onclick="c()" id="answer_C" value=""> &nbsp
                    <label for="">D.</label>
                    <input type="checkbox" name="answer_D" onclick="d()"id="answer_D" value="">
                </div>
            </div>
        </div>
        <br>
        <button class="btn btn-primary">Thêm câu hỏi</button>
    </form>
</div>
<script>
    function a() {

        var answer_one = document.getElementById('answer_one').value;
        document.getElementById('answer_A').value = answer_one

    }

    function b() {

        var answer_two = document.getElementById('answer_two').value;
        document.getElementById('answer_B').value = answer_two

    }

    function c() {

        var answer_three = document.getElementById('answer_three').value;
        document.getElementById('answer_C').value = answer_three

    }

    function d() {

        var answer_four = document.getElementById('answer_four').value;
        document.getElementById('answer_D').value = answer_four

    }
</script>
<script>
    $('#summernote').summernote({
        placeholder: 'Nhập đề bài ...',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>
@endsection