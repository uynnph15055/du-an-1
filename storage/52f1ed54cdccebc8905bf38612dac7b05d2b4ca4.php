
<?php $__env->startSection('title', 'Danh sách đánh giá'); ?>
<?php $__env->startSection('main_content'); ?>
<div class="container" style="width:1080px">

    <h4 class="text-center">Danh sách đánh giá học viên</h4>
    <div class="header__list">
    </div>
    <span style="float:right;font-style:italic"></span>
    <table class="table table-bordered" style="margin-top: 20px;">
        <thead>
            <tr>
                <th width="80px">STT</th>
                <th width="550px">Nội dung</th>
                <th>Số sao</th>
                <th class="text-center" width="120px">Trạng thái</th>
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
                <th style="text-align: center;"><?php if($key['assess_status'] == 0): ?>
                    <span style="color: #8E0007;">Ẩn</span>
                    <?php else: ?>
                    <span style="color: green;">Hiển thị</span>
                    <?php endif; ?>
                </th>
                <td><a data-id="<?php echo e($key['assess_id']); ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success assess_status" href=""><i class="fas fa-eye"></i></a></td>
                <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa đánh giá này ?')" href="xoa-danh-gia?assess_id=<?php echo e($key['assess_id']); ?>"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa trạng thái</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $(document).ready(function() {
        $('.assess_status').click(function(e) {
            e.preventDefault();
            var assess_id = $(this).data('id');
            $.get("trang-thai-danh-gia", {assess_id: assess_id}, function($data) {
                $('.modal-body').html($data);
            })
        })
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KI III\xam\htdocs\project_one\app\views/admin/adminAssess/listAssess.blade.php ENDPATH**/ ?>