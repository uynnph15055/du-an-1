
<?php $__env->startSection('title', 'Khóa học'); ?>
<?php $__env->startSection('main_content'); ?>
<style>
    .lesson_error {
        text-align: center;
    }

    .lesson_error .icon {
        font-size: 120px;
        color: #ccc;
    }

    .lesson_error-title {
        font-size: 18px;
        margin-top: 10px;
        color: #555;
    }

    .btn-primary {
        margin: 10px 0px;
    }

    .detail-name {
        padding-top: -20px;
    }

    .course__description {
        line-height: 1.4;
        text-align: justify;
        color: #777;
    }
</style>

<div class="container">
    <main class="bgr-light">
        <div class="container-fluid">
            <div class="course-detail" style="padding-top: 95px;">
                <div class="course-detail-text">
                    <div class="detail-name">
                        <h1 class="course__name">
                            <?php if(isset($subject)): ?>
                            <?php echo e($subject['subject_name']); ?>

                        </h1>
                        <p class="course__description">
                            <?php echo e($subject['subject_description']); ?>

                        </p>
                        <?php endif; ?>
                    </div>
                    <div class="detail-content">
                        <?php if(!empty($lesson)): ?>
                        <h3 class="content__title">
                            Nội dung khóa học
                        </h3>
                        <?php
                        $index = 1;
                        ?>
                        <div class="lesson-list">
                            <?php $__currentLoopData = $lesson; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="lesson-item-info">
                                <span class="lesson__index"><i class="fas fa-play-circle"></i></span>
                                <h4 class="lesson-item__title">
                                    Bài <?= $index++ ?> : <?php echo e($key['lesson_name']); ?>

                                </h4>
                                <span class="lesson__time">
                                    10:10
                                </span>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php else: ?>
                        <div class="lesson_error">
                            <i class="fas fa-sticky-note icon"></i>
                            <h2 class="lesson_error-title">Hiện chưa có bài học nào <i class="fas fa-exclamation"></i></h2>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if(isset($user)): ?>
                <div class="course-detail-video">
                    <img src="./public/img/<?php echo e($subject['subject_img']); ?>" alt="" class="img-fluid course__img">

                    <?php $__currentLoopData = $dataBill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valueBill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($valueBill['code_vnpay']==$user['student_id'].$subject['subject_id']): ?>
                    <?php $bill_vnpay = $valueBill['code_vnpay'] ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($subject['type_id'] == 0): ?>
                    <a href="bai-hoc?mon=<?php echo e($subject['subject_slug']); ?>" style="margin: 10px 0;" class="btn-primary">
                        Học ngay
                    </a>
                    <span style="display: block;color: #04d200;font-size: 20px;padding: 0 0 10px">Miễn phí</span>

                    <?php elseif(isset($bill_vnpay) && $bill_vnpay==$user['student_id'].$subject['subject_id']): ?>

                    <a href="bai-hoc?mon=<?php echo e($subject['subject_slug']); ?>" style="margin: 10px 0;" class="btn-primary">
                        Học ngay
                    </a>
                    <?php else: ?>
                    <a href="thanh-toan-vnpay?mon=<?php echo e($subject['subject_slug']); ?>" style="margin: 10px 0;" class="btn-primary">
                        Mua khóa học
                    </a>
                    <div class="course-detail-price">
                        <span class="course-detail-price--new">100.000 đ</span>
                        <span class="course-detail-price--old">300.000 đ</span>
                    </div>
                    <?php endif; ?>
                    <?php if(!empty($lesson)): ?>
                    <span class="sub-des">Hiện có <?php echo count($lesson) ?> bài</span>
                    <?php else: ?>
                    <span class="sub-des">Chưa có bài nào </span>
                    <?php endif; ?>
                </div>
                <?php else: ?>
                <div class="course-detail-video">
                    <img src="./public/img/<?php echo e($subject['subject_img']); ?>" alt="" class="img-fluid course__img">
                    <?php if($subject['type_id'] == 0): ?>
                    <a href="bai-hoc?mon=<?php echo e($subject['subject_slug']); ?>" style="margin: 10px 0;" class="btn-primary">
                        Học ngay
                    </a>
                    <span style="display: block;color: #04d200;font-size: 20px;padding: 0 0 10px">Miễn phí</span>
                    <?php else: ?>
                    <a href="bai-hoc?mon=<?php echo e($subject['subject_slug']); ?>" style="margin: 10px 0;" class="btn-primary">
                        Mua khóa học
                    </a>
                    <div class="course-detail-price">
                        <span class="course-detail-price--new">100.000 đ</span>
                        <span class="course-detail-price--old">300.000 đ</span>
                    </div>
                    <?php endif; ?>
                    <?php if(!empty($lesson)): ?>
                    <span class="sub-des">Hiện có <?php echo count($lesson) ?> bài</span>
                    <?php else: ?>
                    <span  class="sub-des">Chưa có bài nào</span>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\project_one\app\views/customer/courseDetail.blade.php ENDPATH**/ ?>