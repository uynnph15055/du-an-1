
<?php $__env->startSection('title', 'Danh sách menu'); ?>
<?php $__env->startSection('main_content'); ?>
<style>
    th {
        text-align: center;
    }
</style>
<div class="container">
    <h3 class="text-center">Danh sách học viên</h3>
    <table class="table table-bordered" style="margin-top:30px">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Email</th>
                <th width="80px">Chi tiết</th>
                <th width="80px">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = $stt;
            ?>
            <?php $__currentLoopData = $dataStudent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?= $index++ ?></td>
                <td><?php echo e($key['student_name']); ?></td>
                <td style="text-align: center;">
                    <img width="100px" src="<?php echo e($key['student_avatar']); ?>" alt="">
                </td>
                <td><?php echo e($key['student_email']); ?></td>
                <td><a class="btn btn-success" href="chi-tiet-hoc-vien?student_id=<?php echo e($key['student_id']); ?>"><i class="fas fa-address-card"></i></a></td>
                <td><a class="btn btn-danger" href="xoa-hoc-vien?student_id=<?php echo e($key['student_id']); ?>" onclick="return confirm('Bạn có muốn xóa học viên này ?')" href=""><i class="fas fa-trash"></i></a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <nav style="float: right;" aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php for($i = 1 ; $i <=$page ; $i++): ?> <li class="page-item"><a class="page-link" href="?trang=<?php echo e($i); ?>"><?php echo e($i); ?></a></li>
                <?php endfor; ?>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
        </ul>
    </nav>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\project_one\app\views/admin/adminStudent/listStudent.blade.php ENDPATH**/ ?>