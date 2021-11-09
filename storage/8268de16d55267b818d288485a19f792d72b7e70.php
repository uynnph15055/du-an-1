
<?php $__env->startSection('title', 'Danh sách môn học'); ?>
<?php $__env->startSection('main_content'); ?>
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

    <h4 class="text-center">Thêm bài học</h4>
    <form method="POST" enctype="multipart/form-data" action="trang-them-bai-hoc">

        <div class="row">
            <div class="col">
                <?php if(isset($_GET['id'])): ?>

                <input type="hidden" name="subject_id" value="<?php echo e($_GET['id']); ?>">
                <?php endif; ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên bài học</label>
                    <input type="text" class="form-control" onkeyup="ChangeToSlug()" placeholder="Tên bài học" name="lesson_name" id="slug" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên bài học</label>
                    <input type="text" class="form-control" placeholder="Tên bài học" name="lesson_slug" id="convert_slug" aria-describedby="emailHelp">
                </div>


                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ảnh đại diện</label>
                    <br>
                    <input type="file" name="lesson_img" id="convert_slug">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ảnh Poster</label>
                    <br>
                    <input type="file" name="lesson_img2" id="convert_slug">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Link video</label>
                    <input type="text" class="form-control" placeholder="link bài học" name="lesson_link" id="convert_slug" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Trạng thái</label>
                    <br>
                    <select class="select" name="lesson_status" id="type_id" aria-label="Default select example">
                        <option value="">--Trạng thái--</option>
                        <option value="1">Chưa mở</option>
                        <option value="2">Đã mở</option>
                    </select>
                </div>



                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Giới thiệu</label>
                    <br>
                    <textarea class="input-text" placeholder="Giới thiệu bài học" name="lesson_introduce" rows="5" cols="65"></textarea>
                </div>
            </div>
        </div>

        <button type="submit" id="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KI III\xam\htdocs\project_one\app\views/admin/adminLesson/formLesson.blade.php ENDPATH**/ ?>