
<?php $__env->startSection('title', 'Chi tiết học viên'); ?>
<?php $__env->startSection('main_content'); ?>
<style>
    .status-course-item {
        display: flex;
        background-color: #f8f9fc;
        padding: 10px;
    }

    .img-fluid {
        width: 100px;
        border-radius: 6px;
    }

    .status-course__name {
        color: #000;
        font-size: 15px;
    }

    .status-course-text {
        margin-left: 15px;
    }

    .status-course__count-lesson {
        position: absolute;
        right: 30px;
        font-size: 16px;
    }

    <?php

    use App\Models\modelLesson;

    ?>
</style>
<div id="content">
    <h3 class="text-center" style="margin-bottom: 30px;">Thông tin cá nhân</h3>
    <div class="container-fluid">
        <div class="container">
            <div class="profile_admin">
                <div class="row gutters">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="account-settings">
                                    <div class="user-profile">
                                        <div class="user-avatar">
                                            <img style="width: 175px; height: 175px; object-fit: cover; border-radius: 50%" class="img-fluid" src="<?php echo e($infoStudent['student_avatar']); ?>" alt="Maxwell Admin">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <br>
                                        <h6 class="text-center">Học viên</h6>
                                        <h5 class="user-name" style="color:brown"><?php echo e($infoStudent['student_name']); ?></h5>
                                        <p>Email : <?php echo e($infoStudent['student_email']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="card h-100">
                                <div class="cart-body">
                                    <div class="col">

                                        <h6>Khóa đang học:</h6>
                                        <div class="status-course-list">
                                            <?php $__currentLoopData = $dataCourseLeaning; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $count_lesson = count(modelLesson::where("subject_id", "=", $key['subject_id'])->get()); ?>

                                            <?php if($key['sum_lesson'] < $count_lesson): ?> <div class="status-course-item">
                                                <div class="status-course-img">
                                                    <a href="bai-hoc?mon=<?php echo e($key['subject_slug']); ?>">
                                                        <img src="./public/img/<?php echo e($key['subject_img']); ?>" alt="" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="status-course-text" style="">
                                                    <h3 class="status-course__name"><?php echo e($key['subject_name']); ?></h3>
                                                    <span style="margin-top: -20px;">Ngày bắt đầu : <?php echo e($key['date_start']); ?></span>
                                                    <span class="status-course__count-lesson"><?php echo e($key['sum_lesson']); ?> / <?php echo count(modelLesson::where("subject_id", "=", $key['subject_id'])->get()); ?></span>
                                                </div>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                    <div class="col" style="margin:20px 0px;margin-left:-10px">

                                        <h6>Khóa hoàn thành:</h6>
                                        <div class="status-course-list">
                                            <?php $__currentLoopData = $dataCourseLeaning; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $count_lesson = count(modelLesson::where("subject_id", "=", $key['subject_id'])->get()); ?>

                                            <?php if($key['sum_lesson'] == $count_lesson): ?> <div class="status-course-item">
                                                <div class="status-course-img">
                                                    <a href="bai-hoc?mon=<?php echo e($key['subject_slug']); ?>">
                                                        <img src="./public/img/<?php echo e($key['subject_img']); ?>" alt="" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="status-course-text" style="">
                                                    <h3 class="status-course__name"><?php echo e($key['subject_name']); ?></h3>
                                                    <span style="margin-top: -20px;">Ngày bắt đầu : <?php echo e($key['date_start']); ?></span>
                                                    <span class="status-course__count-lesson"><?php echo e($key['sum_lesson']); ?> / <?php echo count(modelLesson::where("subject_id", "=", $key['subject_id'])->get()); ?></span>
                                                </div>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\project_one\app\views/admin/adminStudent/studentDetail.blade.php ENDPATH**/ ?>