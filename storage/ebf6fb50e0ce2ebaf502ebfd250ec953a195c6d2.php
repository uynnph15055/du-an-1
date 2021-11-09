
<?php $__env->startSection('title', 'Danh sách câu hỏi'); ?>
<?php $__env->startSection('main_content'); ?>
<div class="container">
    <h4 style="margin-bottom:30px" class="text-center">Thêm câu hỏi</h4>
    <form method="POST" action="them-cau-hoi" enctype="multipart/form-data">
        <textarea placeholder="Thêm câu hỏi vào đây" name="question" id="summernote"></textarea>
        <br>
        <button class="btn btn-primary">Thêm câu hỏi</button>
    </form>
</div>
<script>
    $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
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