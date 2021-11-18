
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
<div class="container" style="margin-top:40px">
    <main class="bgr-light">
        <div class="container-fluid">
            <div class="course-detail">
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
                <div class="course-detail-video">
                    <img src="./public/img/<?php echo e($subject['subject_img']); ?>" alt="" class="img-fluid course__img">
                    <a href="bai-hoc?mon=<?php echo e($subject['subject_slug']); ?>" class="btn-primary">
                        Học ngay
                    </a>
                    <?php if(!empty($lesson)): ?>
                    <span class="sub-des">Hiện có <?php echo count($lesson) ?> bài</span>
                    <?php else: ?>
                    <h6 style="margin: 10px 0px;">Chưa có bài nào</h6>
                    <?php endif; ?>
                    <span class="sub-des" style="font-style: italic;">Học mọi lúc, mọi nơi</span>
                </div>
            </div>
        </div>
    </main>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KI III\xam\htdocs\project_one\app\views/customer/courseDetail.blade.php ENDPATH**/ ?>