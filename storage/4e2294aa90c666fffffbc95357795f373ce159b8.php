
<?php $__env->startSection('title', 'Danh sách môn học'); ?>
<?php $__env->startSection('main_content'); ?>
<style>
    .input-text {
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 10px;
    }

    th {
        font-size: 15px;
    }

    .select {
        width: 100%;
        border: 1px solid #ccc;
        color: #777;
        border-radius: 6px;
        height: 35px;
    }
</style>
<div class="container">
    <h4 class="text-center">Danh sách môn học</h4>
    <a href="trang-them-mon-hoc" class="btn btn-primary">Thêm môn</a>
    <br>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên môn</th>
                <th>Ảnh</th>
                <th>Danh mục</th>
                <th>Trang thái</th>
                <th>Giá</th>
                <th>Khuyến mại</th>
                <th>Ngày đăng</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
            ?>
            <?php $__currentLoopData = $dataSubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?= $index++ ?></td>
                <td><?php echo e($key['subject_name']); ?></td>
                <td>
                    <img width="50px" src="./public/img/<?php echo e($key['subject_img']); ?>" alt="">
                </td>
                <td><?php echo e($key['cate_name']); ?></td>
                <td><?php if($key['type_id'] == 1): ?>
                    <span style="color:red">Mất phí</span>
                    <?php else: ?>
                    <span style="color:green">Miễn phí</span>
                    <?php endif; ?>
                </td>
                <td><?php echo e($key['subject_price']); ?></td>
                <td><?php echo e($key['subject_sale']); ?></td>
                <td><?php echo e($key['date_post']); ?></td>
                <td><a class="btn btn-warning" onclick="return confirm('Bạn có muốn Sửa môn học này ?')" href="sua-khoa-hoc?id=<?php echo e($key['subject_id']); ?>">Sửa</a></td>
                <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa môn học này ?')" href="xoa-khoa-hoc?id=<?php echo e($key['subject_id']); ?>">Xóa</a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>


<!-- dd($data['dataCateProduct']); -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\project_one\app\views/admin/adminSubject/listSubject.blade.php ENDPATH**/ ?>