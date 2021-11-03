
<?php $__env->startSection('title', 'Quản lý sản phẩm'); ?>
<?php $__env->startSection('main_content'); ?>
<div class="container">
    <h3 class="text-center" style="margin-bottom:30px">Quản lý sản phẩm</h3>
    <a href="./add-product-page" class="btn btn-success">Thêm sản phẩm</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Dạnh mục</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
            ?>
            <?php $__currentLoopData = $dataProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?= $index++ ?></td>
                <td><?php echo e($key->product_name); ?></td>
                <td>
                    <img width="70px" src="./public/img/<?= $key->product_img ?>" alt="">
                </td>
                <td> <?php echo e($key->product_price); ?></td>
                <td> <?php echo e($key->product_quantity); ?></td>
                <td><?php echo e($key->cate_id); ?></td>
                <td><a class="btn btn-warning" href="./edit-product?id=<?= $key->id ?>">Edit</a></td>
                <td><a class="btn btn-danger" onclick="return confirm('Ban có muốn xóa dòng dữ liệu này ?')" href="./remove-product?id=<?= $key->id ?>">Remove</a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\PHP_2\app\views/admin/adminProduct/adminProduct.blade.php ENDPATH**/ ?>