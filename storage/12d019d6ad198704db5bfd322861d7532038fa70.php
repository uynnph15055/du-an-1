
<?php $__env->startSection('title', 'Danh sách bài học'); ?>
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
        <!-- <h5 style="margin-bottom:-30px">Tổng số : <?php echo e($number); ?> khóa</h5> -->
    </div>
    <span style="float:right;font-style:italic">Tổng có : <?php echo e($number); ?> bài</span>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên bài</th>
                <th>Ảnh</th>
                <th>Ngày Đăng</th>
                <th width="78px">CMT</th>
                <th width="78px">Câu hỏi</th>
                <th width="78px">Sửa</th>
                <th width="78px">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = $stt;
            ?>
            <?php $__currentLoopData = $dataLesson; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?= $index++ ?></td>
                <td><?php echo e($key['lesson_name']); ?></td>
                <td>
                    <img width="50px" src="./public/img/<?php echo e($key['lesson_img']); ?>" alt="">
                </td>
                <td><?php echo e($key['date_post']); ?></td>
                <td><a class="btn btn-dark" href="danh-sach-binh-luan?lesson_id=<?php echo e($key['lesson_id']); ?>"><i class="fas fa-comment"></i></a></td>
                <td><a class="btn btn-success" href="danh-sach-cau-hoi?lesson_id=<?php echo e($key['lesson_id']); ?>"><i class="fas fa-question-circle"></i></a></td>
                <td><a class="btn btn-warning" href="trang-sua-bai-hoc?id=<?php echo e($key['lesson_id']); ?>&subject_id=<?php echo e($key['subject_id']); ?>"><i class="fas fa-edit"></i></a></td>
                <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa khóa học này ?')" href="xoa-bai-hoc?id=<?php echo e($key['lesson_id']); ?>&subject_id=<?php echo e($key['subject_id']); ?>"><i class="fas fa-trash"></i></a></td>
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
            <?php for($i = 1 ; $i <=$page ; $i++): ?> <li class="page-item"><a class="page-link" href="?trang=<?php echo e($i); ?>&mon=<?php echo e($subject_slug); ?>"><?php echo e($i); ?></a></li>
                <?php endfor; ?>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
        </ul>
    </nav>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KI III\xam\htdocs\project_one\app\views/admin/adminLesson/listLesson.blade.php ENDPATH**/ ?>