
<?php $__env->startSection('title', 'Danh sách câu hỏi'); ?>
<?php $__env->startSection('main_content'); ?>
<div class="container" style="margin-left: 30px;">
    <h4 style="margin-bottom:30px" class="text-center">Thêm câu hỏi</h4>
    <form method="POST" action="them-cau-hoi" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <input type="text" hidden name="lesson_id" value="<?php echo e($lesson_id); ?>">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Chọn ảnh cho câu hỏi (Nếu có)</label>
                    <br>
                    <input type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" name="question_img">
                </div>
                <textarea placeholder="Thêm câu hỏi vào đây" name="question" id="summernote"></textarea>
                <br>
                <label for="">Đáp Án Đúng</label>
                <div>
                    <label for="">A.</label>
                    <input type="checkbox" name="answer_A" id="answer_A" value="1"> &nbsp
                    <label for="">B.</label>
                    <input type="checkbox" name="answer_B" id="answer_B" value="2"> &nbsp
                    <label for="">C.</label>
                    <input type="checkbox" name="answer_C" id="answer_C" value="3"> &nbsp
                    <label for="">D.</label>
                    <input type="checkbox" name="answer_D" id="answer_D" value="4">
                </div>
            </div>
            <div class="col" style="margin-left: 30px;">
                <div style="margin-top:47px">
                    <label for="">Đáp án</label>
                    <br>
                    <textarea placeholder="Câu A" style="border-radius: 10px; padding:5px" name="answer_one" id="answer_one" cols="50" rows="2"></textarea>
                </div>
                <br>
                <div>
                    <textarea placeholder="Câu B" style="border-radius: 10px; padding:5px" name="answer_two" id="answer_two" cols="50" rows="2"></textarea>
                </div>
                <br>
                <div>
                    <textarea placeholder="Câu C" style="border-radius: 10px; padding:5px" name="answer_three" id="answer_three" cols="50" rows="2"></textarea>
                </div>
                <br>
                <div>
                    <textarea placeholder="Câu D" style="border-radius: 10px; padding:5px" name="answer_four" id="answer_four" cols="50" rows="2"></textarea>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\project_one\app\views/admin/question/formQuestion.blade.php ENDPATH**/ ?>