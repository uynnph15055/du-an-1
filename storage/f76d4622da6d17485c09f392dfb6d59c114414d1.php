
<?php $__env->startSection('title', 'Danh sách khóa học'); ?>
<?php $__env->startSection('main_content'); ?>

<style>
    .input-text {
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 10px;
    }

    form {
        margin-top: 30px;
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
    <?php if(isset($row)): ?>
    <h4 class="text-center">Sửa bài học</h4>
    <form method="POST" enctype="multipart/form-data" action="sua-bai-hoc">

        <div class="row">
            <div class="col">

                <input type="text" hidden name="subject_id" value="<?php echo e($row['subject_id']); ?>">

                <input type="text" hidden name="lesson_id" value="<?php echo e($row['lesson_id']); ?>">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên bài học</label>
                    <input type="text" value="<?php echo e($row['lesson_name']); ?>" class="form-control" onkeyup="ChangeToSlug()" placeholder="Tên bài học" name="lesson_name" id="slug" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Slug bài học</label>
                    <input type="text" value="<?php echo e($row['lesson_slug']); ?>" class="form-control" placeholder="Tên bài học" name="lesson_slug" id="convert_slug" aria-describedby="emailHelp">
                </div>

                <input type="text" name="lesson_img" hidden value="<?php echo e($row['lesson_img']); ?>">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ảnh Poster</label>
                    <br>
                    <input type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" name="lesson_img">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Link video</label>
                    <input type="text" class="form-control" value="https://www.youtube.com/watch?v=<?php echo e($row['lesson_link']); ?>" placeholder="link bài học" name="lesson_link" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mô tả</label>
                    <br>
                    <textarea class="input-text" placeholder="Mô tả bài học" name="lesson_introduce" rows="5" cols="65"><?php echo e($row['lesson_introduce']); ?></textarea>
                </div>
            </div>
        </div>

        <button type="submit" id="submit" class="btn btn-primary">Sửa bài học</button>
    </form>
    <?php else: ?>
    <h4 class="text-center">Thêm bài học</h4>
    <form method="POST" enctype="multipart/form-data" action="trang-them-bai-hoc">

        <div class="row">
            <div class="col">
                <?php if(isset($_GET['id'])): ?>

                <input type="text" hidden name="subject_id" value="<?php echo e($_GET['id']); ?>">
                <?php endif; ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên bài học</label>
                    <input type="text" class="form-control" onkeyup="ChangeToSlug()" placeholder="Tên bài học" name="lesson_name" id="slug" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Slug bài học</label>
                    <input type="text" class="form-control" placeholder="Tên bài học" name="lesson_slug" id="convert_slug" aria-describedby="emailHelp">
                </div>



                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ảnh Poster</label>
                    <br>
                    <input type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" name="lesson_img">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Link video</label>
                    <input type="text" class="form-control" placeholder="link bài học" name="lesson_link" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mô tả</label>
                    <br>
                    <textarea class="input-text" placeholder="Mô tả bài học" name="lesson_introduce" rows="5" cols="65"></textarea>
                </div>
            </div>
        </div>

        <button type="submit" id="submit" class="btn btn-primary">Thêm</button>
    </form>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project_one\app\views/admin/adminLesson/formLesson.blade.php ENDPATH**/ ?>