
<?php $__env->startSection('title', 'Danh sách khóa học'); ?>
<?php $__env->startSection('main_content'); ?>
<style>
    .input-text {
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 10px;
    }

    .header__list {
        display: flex;
        justify-content: space-between;
        align-items: center;
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
    <h4 class="text-center">Danh sách khóa học</h4>
    <div class="header__list">
        <a href="trang-them-mon-hoc" class="btn btn-primary">Thêm khóa </a>
    </div>
    <span style="float:right;font-style:italic">Tổng có : <?php echo e($number); ?> khóa</span>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th width="150px">Tên khóa</th>
                <th>Ảnh</th>
                <th>Chuyên ngành</th>
                <th>Trang thái</th>
                <th>Giá</th>
                <th>Khuyến mại</th>
                <th>Bài học</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = $stt;
            ?>
            <?php $__currentLoopData = $dataSubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?= $index++ ?></td>
                <td><?php echo e($key['subject_name']); ?></td>
                <td>
                    <img width="100px" src="./public/img/<?php echo e($key['subject_img']); ?>" alt="">
                </td>
                <td><?php echo e($key['cate_name']); ?></td>
                <td><?php if($key['type_id'] == 1): ?>
                    <span style="color:red">Mất phí</span>
                    <?php else: ?>
                    <span style="color:green">Miễn phí</span>
                    <?php endif; ?>
                </td>
                <td><?php echo e(number_format($key['subject_price'])); ?> VNĐ</td>
                <td><?php echo e(number_format($key['subject_sale'])); ?> VNĐ</td>
                <td>
                    <a class="btn btn-info" href="chi-tiet-mon-hoc?mon=<?php echo e($key['subject_slug']); ?>"><i class="fas fa-pager"></i></a>
                </td>
                <td><a class="btn btn-warning" href="sua-khoa-hoc?id=<?php echo e($key['subject_id']); ?>"><i class="fas fa-edit"></i></a></td>
                <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa khóa học này ?')" href="xoa-khoa-hoc?id=<?php echo e($key['subject_id']); ?>"><i class="fas fa-trash"></i></a></td>
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


<!-- dd($data['dataCateProduct']); -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KI III\xam\htdocs\project_one\app\views/admin/adminSubject/listSubject.blade.php ENDPATH**/ ?>