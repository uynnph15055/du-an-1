
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
    }

    .btn-price {
        margin-top: 10px;
        background-color: #4e73df;
        color: #ffff;
        border: none;
        border-radius: 6px;
        padding: 2px 20px;
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
                    <select class="select" name="subject_name" id="type_id" aria-label="Default select example">
                        <option selected>Loại môn học</option>
                        <option value="0">Mất phí</option>
                        <option value="1">Trả phí</option>
                    </select>
                    <input type="submit" id="more_price" class="btn-price" value="Đi">

                    <div id="form-price"></div>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Thuộc danh mục</label>
                    <br>
                    <select name="cate_id" class="select" aria-label="Default select example">
                        <option selected>---Loai---</option>
                        <?php $__currentLoopData = $cateSubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key['cate_id']); ?>"><?php echo e($key['cate_name']); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ảnh</label>
                    <input type="file" name="subject_img" id="convert_slug">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Giới thiệu</label>
                    <br>
                    <textarea class="input-text" placeholder="Giới thiệu môn học" name="subject_description" rows="4" cols="65"></textarea>
                </div>
            </div>
        </div>
    </form>
    <button type="submit" class="btn btn-primary">Thêm</button>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $(document).ready(function() {
        $('#more_price').click(function() {
            var type_id = $('#type_id').val();
            $.get("them-gia-mon", {
                type_id: type_id,
            }, function($data) {
                $('#form-price').html($data);
            });
        });
    });
</script>
<!-- dd($data['dataCateProduct']); -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KI III\xam\htdocs\project_one\app\views/admin/adminSubject/formSubject.blade.php ENDPATH**/ ?>