
<?php $__env->startSection('title', 'Danh sách môn học'); ?>
<?php $__env->startSection('main_content'); ?>
<style>
    .warning-bg {
        display: flex;
        justify-content: center;
        /* align-items: center; */
        margin-top: 150px;
    }

    .warning {
        text-align: center;
        align-items: center;
    }

    .warning i {
        font-size: 100px;
    }
</style>
<div class="container">

    <?php if(empty($dataLesson) && isset($subject_id)): ?>
    <div class="warning-bg">
        <div class="warning">
            <i class="fas fa-exclamation-triangle"></i>
            <br>
            <br>
            <h5>Hiện chưa có bài học !!!</h5>
            <a href="./them-bai-hoc?id=<?php echo e($subject_id); ?>">Thêm bài học</a>
        </div>
    </div>
    <?php else: ?>
    <h4 class="text-center">Danh sách bài học</h4>
    <div class="header__list">
    <?php $__currentLoopData = $dataLesson; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(isset($key['subject_id'][0])): ?>
        <a href="them-bai-hoc?id=<?php echo e($key['subject_id']); ?>" class="btn btn-primary">Thêm bài học </a>
        <?php break; ?>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- <h5 style="margin-bottom:-30px">Tổng số : <?php echo e($number); ?> môn</h5> -->
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr style="text-align: center;">
                <th>STT</th>
                <th>Tên bài</th>
                <th>Ảnh</th>
                <th>Trang thái</th>
                <th>Ngày Đăng</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
            ?>
            <?php $__currentLoopData = $dataLesson; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr style="text-align: center;">
                <td><?= $index++ ?></td>
                <td><?php echo e($key['lesson_name']); ?></td>
                <td>
                    <img width="50px" src="./public/img/<?php echo e($key['lesson_img']); ?>" alt="">
                </td>
                <!-- <td><?php echo e($key['cate_name']); ?></td> -->
                
                <td> <?php if($key['lesson_status']==1): ?>
                   <span>Đã Mở</span>
                <?php endif; ?>
                </td>
                <td><?php echo e($key['date_post']); ?></td>
                <td><a class="btn btn-warning" onclick="return confirm('Bạn có muốn Sửa môn học này ?')" href="sua-khoa-hoc?id=<?php echo e($key['lesson_id']); ?>&subject_id=<?php echo e($key['subject_id']); ?>"><i class="fas fa-edit"></i></a></td>
                <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa môn học này ?')" href="xoa-bai-hoc?id=<?php echo e($key['lesson_id']); ?>&subject_id=<?php echo e($key['subject_id']); ?>"><i class="fas fa-trash"></i></a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KI III\xam\htdocs\project_one\app\views/admin/adminLesson/listLesson.blade.php ENDPATH**/ ?>