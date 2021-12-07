
<?php $__env->startSection('title', 'chi tiết hóa đơn'); ?>
<?php $__env->startSection('main_content'); ?>
<div class="container" style="width:100%">
    <h4 style="padding-top:20px" class="text-center"> Hóa đơn đơn tiết </h4>
    <div class="header__list">
    </div>

    <table class="table table-bordered">

        <thead>
            <tr>

                <th>STT</th>
                <th>Họ Tên</th>
                <th>Email</th>
                <th>Thời gian </th>
                <th>Mã hóa đơn</th>
            
                <th>Giá</th>
                <th>Nội dung</th>
              
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
                <td><?php echo e($key['student_name']); ?></td>
                <td><?php echo e($key['student_email']); ?></td>    
                <td><?php echo date('H:i d-m-Y', strtotime($key['transfer_time'])) ?></td>
             <td>CourseIFT-<?php echo e($key['code_vnpay']); ?></td>

             <td><?php echo e(number_format($key['monney'])); ?> đ</td>
             <td><?php echo e($key['note_bill']); ?></td>
              
                <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa hóa đơn này ?')" href=""><i class="fas fa-trash"></i></a></td>

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\project_one\app\views/admin/adminBill/listDeltailBill.blade.php ENDPATH**/ ?>