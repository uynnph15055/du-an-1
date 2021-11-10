
<?php $__env->startSection('title', 'Danh sách câu hỏi'); ?>
<?php $__env->startSection('main_content'); ?>
<div class="container">
    <h4 style="margin-bottom:30px" class="text-center">Thêm câu hỏi</h4>
    <form method="POST" action="them-cau-hoi" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Chọn ảnh cho câu hỏi (Nếu có)</label>
                    <br>
                    <input type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" name="heading_img">
                </div>
                <textarea placeholder="Thêm câu hỏi vào đây" name="question" id="summernote"></textarea>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Đáp án của câu hỏi</label>
                    <br>
                    <input type="text" placeholder="VD : 1 - 2 - 3" name="answer">
                </div>
                <textarea placeholder="Thêm câu hỏi vào đây" name="question__list" id="summernote_level"></textarea>
            </div>
        </div>
        <br>
        <button class="btn btn-primary">Thêm câu hỏi</button>
    </form>
</div>
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
<script>
    $('#summernote_level').summernote({
        placeholder: 'Nhập lisl các câu trả lời ...',
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
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KI III\xam\htdocs\project_one\app\views/admin/question/formQuestion.blade.php ENDPATH**/ ?>