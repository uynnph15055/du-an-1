
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
    <?php if(isset($rowSubject)): ?>
    <h4 class="text-center">Sửa môn học</h4>
    <form method="POST" enctype="multipart/form-data" action="update-mon-hoc">
        <div class="row">
            <div class="col">
                <input type="text" name="subject_id" value="<?php echo e($rowSubject['subject_id']); ?>" hidden>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên môn học</label>
                    <input type="text" class="form-control" onkeyup="ChangeToSlug()" placeholder="Tên khóa học" value="<?php echo e($rowSubject['subject_name']); ?>" name="subject_name" id="slug" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên môn học</label>
                    <input type="text" class="form-control" placeholder="Tên khóa học" name="subject_slug" value="<?php echo e($rowSubject['subject_slug']); ?>" id="convert_slug" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Kiểu môn học</label>
                    <br>
                    <select class="select" name="subject_type" id="type_id" aria-label="Default select example">
                        <option <?php if ($rowSubject['type_id'] == 0) {
                                    echo 'selected';
                                } ?> value="0">Miễn phí</option>
                        <option <?php if ($rowSubject['type_id'] == 1) {
                                    echo 'selected';
                                } ?> value="1">Trả phí</option>
                    </select>
                    <div class="accordion" id="accordionSection">
                        <div class="accordion-item mb-3" style="margin-top:20px">
                            <h2 class="accordion-header">
                                <button type="button" style="display:none" class="accordion-button collapsed price__import" data-bs-toggle="collapse" data-bs-target="#collapseOne">Thêm giá cho môn học</button>
                            </h2>
                            <div class="accordion-collapse collapse" id="collapseOne" data-bs-parent="#accordionSection">
                                <div class="accordion-body price__import">
                                    <div class='input-group'>
                                        <input type='text' placeholder='Giá môn học' name='subject_price' value="<?php echo e($rowSubject['subject_price']); ?>" aria-label='First name' class='form-control'>
                                        <input type='text' placeholder='Giá khuyến mại' name='subject_sale' value="<?php echo e($rowSubject['subject_sale']); ?>" aria-label='Last name' class='form-control'>
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
                        <?php $__currentLoopData = $cateSubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php
                                if ($rowSubject['cate_id'] ==  $key['cate_id']) {
                                    echo 'selected';
                                }
                                ?> value="<?php echo e($key['cate_id']); ?>"><?php echo e($key['cate_name']); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <input type="text" value="<?php echo e($rowSubject['subject_img']); ?>" name="subject_img" hidden>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ảnh</label>
                    <input type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" name="subject_img" id="convert_slug">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Giới thiệu</label>
                    <br>
                    <textarea class="input-text" placeholder="Giới thiệu môn học" name="subject_description" rows="5" cols="65"><?php echo e($rowSubject['subject_description']); ?></textarea>
                </div>
            </div>
        </div>
        <button type=" submit" id="submit" class="btn btn-primary">Thêm</button>
    </form>
    <?php else: ?>
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
                                        <input type='text' placeholder='Giá môn học' name='subject_price' aria-label='First name' class='form-control'>
                                        <input type='text' placeholder='Giá khuyến mại' name='subject_sale' aria-label='Last name' class='form-control'>
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
                        <?php $__currentLoopData = $cateSubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key['cate_id']); ?>"><?php echo e($key['cate_name']); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ảnh</label>
                    <input type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" name="subject_img" id="convert_slug">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Giới thiệu</label>
                    <br>
                    <textarea class="input-text" placeholder="Giới thiệu môn học" name="subject_description" rows="5" cols="65"></textarea>
                </div>
            </div>
        </div>
        <button type="submit" id="submit" class="btn btn-primary">Thêm</button>
    </form>
    <?php endif; ?>
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
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project_one\app\views/admin/adminSubject/formSubject.blade.php ENDPATH**/ ?>