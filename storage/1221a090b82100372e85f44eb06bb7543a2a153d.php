
<?php $__env->startSection('title', 'hóa đơn'); ?>
<?php $__env->startSection('main_content'); ?>
<div class="container" style="width:1080px">
    <h4 style="padding-top:20px" class="text-center">Danh sách hóa đơn</h4>
    <div class="header__list">

        <span> Tổng doanh thu : <?php echo e(number_format($sumAll)); ?> đ</span>
    </div>

    <table class="table table-bordered">

        <thead>
            <tr>

                <th>STT</th>
                <th>Ảnh</th>
                <th>Môn học</th>
                <th>Mã hóa đơn</th>
                <th>Ngân hàng</th>
                <th>Thời gian</th>
                <th>Tổng tiền</th>
                <th>Xóa</th>

            </tr>
        </thead>
        <tbody>



            <?php
            $index = 1;

            ?>
            <?php $__currentLoopData = $dataBill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>

                <td><?= $index++ ?></td>
                <td><img style="width:100px;" src="./public/img/<?php echo e($key['subject_img']); ?>" alt=""></td>
                <td><?php echo e($key['subject_name']); ?></td>
                <td><?php echo e($key['code_vnpay']); ?></td>
                <td><?php echo e($key['code_back']); ?></td>
                <td><?php echo date('d-m-Y', strtotime($key['moi_nhat'])) ?></td>
                <td><?php echo e(number_format($key['tong_tien'])); ?> đ</td>

                <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa bình luận  này ?')" href=""><i class="fas fa-trash"></i></a></td>

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\project_one\app\views/admin/adminBill/listBill.blade.php ENDPATH**/ ?>