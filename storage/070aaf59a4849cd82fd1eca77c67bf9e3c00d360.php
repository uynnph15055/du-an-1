
<?php $__env->startSection('title', 'Khóa học'); ?>
<?php $__env->startSection('main_content'); ?>

<div class="container" style="margin-top:40px">
    <div class="profile-section">
        <div class="container-fluid">
            <div class="profile-grid">
                <div class="profile-control">
                    <div class="section-box profile-control-general">
                        <div class="general-img">

                            <img src="<?php echo e($dataInfo[0]['student_avatar']); ?>" alt="" class="img-fluid">

                            <abbr class="open-modal-btn" title=" Chỉnh sửa ảnh">
                                <button style="z-index: 1;" class="ctrl-img"><i class="fas fa-camera"></i></button>
                            </abbr>
                        </div>
                        <div class="general-text">
                            <h4 class="general__username"><?php echo e($dataInfo[0]['student_name']); ?></h4>
                            <?php $sumPoint = 0;
                            foreach ($countPoint as $key) :
                                $sumPoint += $key['question_point'];
                            endforeach
                            ?>
                            <div class="general-exp"><i class="fas fa-trophy"></i> <?= $sumPoint ?> EXP</div>
                            <?php if(isset($dataInfo[0]['student_story'])): ?>
                            <p class="general__bio">
                                <?php echo e($dataInfo[0]['student_story']); ?>

                            </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="section-box profile-control-info">
                        <div class="head-section head-flex">
                            <span class="head-section__name">Thông tin</span>
                            <span class="head-section__line"></span>
                            <span class="head-section__sub">
                                <abbr class="open-modal-user-info-btn" title="Chỉnh sửa thông tin">
                                    <i class="fas fa-pencil-alt"></i>
                                </abbr>
                            </span>
                        </div>
                        <div class="info-content">
                            <div class="info-list">
                                <div class="info-item">
                                    <span class="info-item__title">
                                        Tên:
                                    </span>
                                    <span class="info-item__content">
                                        <?php echo e($dataInfo[0]['student_name']); ?>

                                    </span>
                                </div>
                                <div class="info-item">
                                    <span class="info-item__title">
                                        Email:
                                    </span>
                                    <span class="info-item__content">
                                        <?php echo e($dataInfo[0]['student_email']); ?>

                                    </span>
                                </div>
                                <?php if(!empty($dataInfo[0]['student_phone'])): ?>
                                <div class="info-item">
                                    <span class="info-item__title">
                                        Số điện thoại :
                                    </span>
                                    <span class="info-item__content">
                                        <?php echo e($dataInfo[0]['student_phone']); ?>

                                    </span>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php if(!empty($dataInfo[0]['student_password'])): ?>
                            <a class="change-pass-link" href="doi-mat-khau">Đổi mật khẩu</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>


                <div class="profile-course">
                    <?php

                    use App\Models\modelLesson;

                    ?>
                    <div class="profile-course-item">
                        <div class="section-box course-status course-status--studying">
                            <div class="status-head head-grid">
                                <span class="head-status__icon"><i class="fas fa-book-reader"></i></span>
                                <span class="head-status__name">Khóa đang học</span>
                                <?php $i = 0 ?>
                                <?php $__currentLoopData = $dataCourseLeaning; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $count_lesson = count(modelLesson::where("subject_id", "=", $key['subject_id'])->get()); ?>

                                <?php if($key['sum_lesson'] < $count_lesson): ?>

                                <?php $i += 1 ?>
                                <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <span class="head-status__sub"> <?php echo $i ?></span>
                            </div>
                            <div class="status-content">

                                <div class="status-course-list">
                                    <?php $__currentLoopData = $dataCourseLeaning; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $count_lesson = count(modelLesson::where("subject_id", "=", $key['subject_id'])->get()); ?>

                                    <?php if($key['sum_lesson'] < $count_lesson): ?> 
                                    <div class="status-course-item">
                                        <div class="status-course-img">
                                            <a href="bai-hoc?mon=<?php echo e($key['subject_slug']); ?>">
                                                <img src="./public/img/<?php echo e($key['subject_img']); ?>" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="status-course-text">
                                            <h3 class="status-course__name"><a href=""><?php echo e($key['subject_name']); ?></a></h3>
                                            <p style="line-height: 1.4; font-size: 14px;">Ngày bắt đầu : <?php echo e($key['date_start']); ?></p>
                                            <span class="status-course__count-lesson"><?php echo e($key['sum_lesson']); ?> / <?php echo count(modelLesson::where("subject_id", "=", $key['subject_id'])->get()); ?></span>
                                        </div>
                                </div>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="section-box course-status course-status--done">
                        <div class="status-head head-grid">
                            <span class="head-status__icon"><i class="fas fa-medal"></i></span>

                            <span class="head-status__name">Khóa đã hoàn thành</span>
                            <?php $index = 0 ?>
                            <?php $__currentLoopData = $dataCourseLeaning; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $count_lesson = count(modelLesson::where("subject_id", "=", $key['subject_id'])->get()); ?>

                            <?php if($key['sum_lesson'] == $count_lesson): ?>

                            <?php $index += 1 ?>
                            <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <span class="head-status__sub"> <?php echo $index ?></span>
                        </div>
                        <div class="status-content">
                            <div class="status-course-list">
                                <?php $__currentLoopData = $dataCourseLeaning; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $count_lesson = count(modelLesson::where("subject_id", "=", $key['subject_id'])->get()); ?>
                                <?php if($key['sum_lesson'] == $count_lesson): ?>
                                <div class="status-course-item">
                                    <div class="status-course-img">
                                        <a href="bai-hoc?mon=<?php echo e($key['subject_slug']); ?>">
                                            <img src="./public/img/<?php echo e($key['subject_img']); ?>" alt="" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="status-course-text">
                                        <h3 class="status-course__name"><a href=""><?php echo e($key['subject_name']); ?></a></h3>
                                        <p style="line-height: 1.4; font-size: 14px;">Ngày bắt đầu: <?php echo e($key['date_start']); ?></p>
                                        <span class="status-course__count-lesson"><?php echo e($key['sum_lesson']); ?> / <?php echo count(modelLesson::where("subject_id", "=", $key['subject_id'])->get()); ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="course-function">
                    <div class="section-box course-function-item bill">
                        <div class="head-section head-flex">
                            <span class="head-section__name">Đơn mua</span>
                            <span class="head-section__line"></span>
                            <span class="head-section__sub"><?php echo count($dataBillJoinSubject) ?></span>
                        </div>
                        <div class="bill-list">
                            <?php $__currentLoopData = $dataBillJoinSubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyBillJoinSubject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="bill-item">
                                <div class="bill-course">
                                    <div class="bill-course-img">
                                        <a href="">
                                            <img src="./public/img/<?php echo e($keyBillJoinSubject['subject_img']); ?>" alt="" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="bill-course-text">
                                        <h3 class="bill-course__name">

                                            <?php echo e($keyBillJoinSubject['subject_name']); ?>


                                        </h3>
                                        <div class="bill-course__price" style="margin-bottom:10px">
                                            <span class="bill-course__price--new"> <?php echo e(number_format($keyBillJoinSubject['subject_sale'])); ?> đ</span>
                                            <span class="bill-course__price--old"><?php echo e(number_format($keyBillJoinSubject['subject_price'])); ?> đ</span>
                                        </div>

                                    </div>
                                </div>
                                <div class="bill-status">
                                    <span class="bill-status--waiting">
                                        TG :<?php echo date('d-m-Y', strtotime($keyBillJoinSubject['transfer_time']))  ?>
                                    </span>

                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                        <div>

                        </div>
                        <?php if(!empty($dataBillJoinSubject)): ?>
                        <a href="chi-tiet-hoa-don" style="display:block;text-align:center;margin-top:15px ;background:linear-gradient(to right, #0098d2, #00bcca) ; padding:10px;width:100px;border-radius: 5px;   text-align: center;
  transform:translateX(150px);color:#ffff">Xem tất cả</a>
                        <?php endif; ?>
                    </div>
                    <div class="section-box course-function-item note">
                        <div class="head-section head-flex">
                            <span class="head-section__name">Ghi chú</span>
                            <span class="head-section__line"></span>
                            <span class="head-section__sub"><?php echo count($dataNote) ?></span>
                        </div>
                        <div class="note-list">
                            <?php $__currentLoopData = $dataNote; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="note-item">
                                <h3 class="note__course-name">
                                    <a href="">
                                        <?php echo e($key['lesson_name']); ?>

                                    </a>
                                </h3>
                                <div class="note-course-content-list">
                                    <div class="note-course-content-item">
                                        <span class="detail-content">
                                            ∘
                                            <!-- text -->
                                            <?php echo e($key['content_note']); ?>

                                        </span>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal img -->
<div class="container-ctrl-img">
    <div class="modal hide" style=" margin-top: 65px;">
        <div class="modal__inner">
            <div class="modal__header">
                <span></span>
                <p>Cập nhật ảnh đại diện</p>
                <i class="fas fa-times"></i>
            </div>
            <div class="modal__body">
                <div class="modal__body__img">
                    <img id="img_main" src="<?php echo e($dataInfo[0]['student_avatar']); ?>" alt="" />
                </div>
                <form method="POST" action="thay-anh-dai-dien" enctype="multipart/form-data" class="modal__body__btn-file">
                    <label for="banner_img" class="preview">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <span>Chọn ảnh</span>
                    </label>
                    <input type="file" name="student_img_new" onchange="banner_imgg()" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" hidden id="banner_img" />
                    <button class="btn-primary" type="submit">Lưu thay đổi</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal bill -->
<!-- <div class="container-detail-bill">
    <div class="modal-bill hide">
        <div class="modal-bill__inner">
            <div class="modal-bill__header">
                <span></span>
                <p>Chi tiết</p>
                <i class="fas fa-times"></i>
            </div>
            <div class="modal-bill__body">

            </div>
        </div>
    </div>
</div> -->

<!-- modal info -->
<div class="container-change-info">
    <div class="modal-user-info hide-user-info">
        <div class="modal-user-info__inner">
            <div class="modal-user-info__header">
                <span></span>
                <p>
                    Cập nhật thông tin
                </p>
                <i class="fas fa-times"></i>
            </div>
            <form method="POST" action="thay-doi-thong-tin" class="modal-user-info__body">
                <p class="user-email"><?php echo e($dataInfo[0]['student_email']); ?></p>
                <div class="form-row-1">
                    <div class="form-item">
                        <label for="">Họ và tên</label>
                        <input type="text" placeholder="Họ và tên" name="student_name" value="<?php echo e($dataInfo[0]['student_name']); ?>" id="" />
                        <span class="mess-alert"></span>
                    </div>
                    <div class="form-item">
                        <label for="">Số điện thoại</label>
                        <input type="text" name="student_phone" value="<?php echo e($dataInfo[0]['student_phone']); ?>" id="" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-item">
                        <label for="">Tiểu sử</label>
                        <textarea name="student_story" id="" cols="30" rows="10"><?php echo e($dataInfo[0]['student_story']); ?></textarea>
                    </div>
                </div>
                <div class="form__btn">
                    <button class="btn-primary">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="./public/js/customerJs/profile.js"></script>
<script>
    function banner_imgg() {
        var banner_img = document.getElementById('banner_img').files;

        if (banner_img.length > 0) {
            var filetoload = banner_img[0];
            var fileReader = new FileReader();
            fileReader.onload = function(fileLoaderEvent) {
                var srcData = fileLoaderEvent.target.result;
                var newimg = document.createElement('img');
                newimg.src = srcData;
                document.getElementById('img_main').src = newimg.src;
            }
            fileReader.readAsDataURL(filetoload);
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project_one\app\views/customer/profile_user.blade.php ENDPATH**/ ?>