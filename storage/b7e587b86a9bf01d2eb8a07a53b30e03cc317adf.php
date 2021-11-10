
<?php $__env->startSection('title', 'Danh sách câu hỏi'); ?>
<?php $__env->startSection('main_content'); ?>
<div class="container">
    <h4 class="text-center">Danh sách câu hỏi</h4>
    <a class="btn btn-primary" href="trang-them-cau-hoi">Thêm câu hỏi</a>
    <br>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Đề bài</th>
                <th>Ảnh</th>
                <th>Thuộc bài</th>
                <th>Đáp án</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
            ?>
            <?php $__currentLoopData = $dataQuestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?= $index++ ?></td>
                <td><?php echo e($key['heading']); ?></td>
                <td><?php echo e($key['heading_img']); ?></td>
                <td><?php echo e($key['answer']); ?></td>
                <td><?php echo e($key['answer']); ?></td>
                <td>
                    <a class="btn btn-warning" href=""><i class="fas fa-edit"></i></a>
                </td>
                <td>
                    <a class="btn btn-danger" href=""><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KI III\xam\htdocs\project_one\app\views/admin/question/listQuestion.blade.php ENDPATH**/ ?>