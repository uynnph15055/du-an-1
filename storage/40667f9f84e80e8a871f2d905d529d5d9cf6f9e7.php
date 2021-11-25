
<?php $__env->startSection('title', 'Danh sách đánh giá'); ?>
<?php $__env->startSection('main_content'); ?>
<div class="container" style="width:980px">

    <h4 class="text-center">Danh sách đánh giá học viên</h4>
    <div class="header__list">
    </div>
    <span style="float:right;font-style:italic"></span>
    <table class="table table-bordered" style="margin-top: 20px;">
        <thead>
            <tr>
                <th width="80px">STT</th>
                <th>Nội dung</th>
                <th>Số sao</th>
                <th width="90px">Hiển thị</th>
                <th width="78px">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 1; ?>
            <?php $__currentLoopData = $dataAssess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?= $index++ ?></td>
                <td><?php echo e($key['assess_content']); ?></td>
                <td><?php echo e($key['assess_star']); ?></td>
                <td><a class="btn btn-success" href=""><i class="fas fa-eye"></i></a></td>
                <td><a class="btn btn-danger" href=""><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>


</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\project_one\app\views/admin/adminAssess/listAssess.blade.php ENDPATH**/ ?>