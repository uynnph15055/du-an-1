
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
                <th>Số lượng</th>
                <th>Cũ nhất</th>
                <th>Mới nhất</th>
                <th>Tổng tiền</th>
                <th>Chi tiết</th>
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
                <td><?php echo e($key['so_luong']); ?></td>
                <td><?php echo date('H:i d-m-Y', strtotime($key['cu_nhat'])) ?></td>
                <td><?php echo date('H:i d-m-Y', strtotime($key['moi_nhat'])) ?></td>
                <td><?php echo e(number_format($key['tong_tien'])); ?> đ</td>
                <th><a class="btn btn-info" href="chi-tiet-hoa-don-admin?subject_id=<?php echo e($key['subject_id']); ?>"><i class="fas fa-align-justify"></i></a></th>
                <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa bình luận  này ?')" href=""><i class="fas fa-trash"></i></a></td>

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KI III\xam\htdocs\project_one\app\views/admin/adminBill/listBill.blade.php ENDPATH**/ ?>