
<?php $__env->startSection('title', 'Sửa sản phẩm'); ?>
<?php $__env->startSection('main_content'); ?>
<div class="container">
    <h3 class="text-center" style="margin-bottom:40px">Sửa sản phẩm</h3>
    <form method="POST" action="./save-edit-product?id=<?php echo e($model->id); ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                    <input type="text" placeholder="Thêm sản phẩm" name="product_name" value="<?php echo e($model->product_name); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ảnh sản phẩm</label>
                    <input type="file" name="product_img" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Giới Thiệu</label>
                    <input type="text" value="<?php echo e($model->product_description); ?>" placeholder="Giới thiếu sản phẩm" name="product_description" class="form-control" id="exampleInputPassword1">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Giá</label>
                    <input type="number" placeholder="Giá sản phẩm" name="product_price" class="form-control" value="<?php echo e($model->product_price); ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Số lượng</label>
                    <input type="number" placeholder="Số lượng" name="product_quantity" value="<?php echo e($model->product_quantity); ?>" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Danh mục</label>
                    <select class="form-select" name="cate_id" aria-label="Default select example">
                        <?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($key->id == $model->cate_id): ?> selected <?php endif; ?>
                            value="<?= $key->id ?>"><?php echo e($key->cate_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="col-12">
                <textarea name="product_intro" placeholder="Mô tả sản phẩm" id="" cols="148" rows="5"><?php echo e($model->product_intro); ?></textarea>
            </div>
        </div>
        <button class="btn btn-success">Thêm sản phẩm</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\PHP_2\app\views/admin/adminProduct/editProduct.blade.php ENDPATH**/ ?>