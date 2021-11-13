
<?php $__env->startSection('title', 'Khóa học'); ?>
<?php $__env->startSection('main_content'); ?>
<div class="container" style="padding-top:30px">
    <div class="container-fluid">
        <div class="search-section">
            <div class="form-container">
                <div class="form-content">
                    <h2>HÔM NAY BẠN MUỐN HỌC GÌ?</h2>
                    <form action="">
                        <input class="input-search" type="text">
                        <button class="submit-search" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <span class="oval oval-1"></span>
                    <span class="oval oval-2"></span>
                    <span class="oval oval-3"></span>
                </div>
            </div>
            <img src="./public/img/images/education-student.gif" alt="" class="search__img img-fluid">
        </div>
    </div>

    <main class="bgr-light">
        <div class="container-fluid">
            <div class="courses-section">
                <aside class="category">
                    <!-- <div class="filter"> -->
                    <!-- <h4 class="filter__title">Bộ lọc</h4> -->
                    <div class="filter-list">
                        <form action="" class="select">
                            <select name="" id="">
                                <option value="">Tất cả</option>
                                <option value="">Miễn phí</option>
                                <option value="">Trả phí</option>
                            </select>
                        </form>
                    </div>
                    <!-- </div> -->
                    <ul class="courses-cate-list">
                        <?php $__currentLoopData = $cateSubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="course-cate__item">
                            <a data-id="<?php echo e($key['cate_id']); ?>" class="cate_id" href="">
                                <i class="fas fa-laptop-code"></i>
                                <span><?php echo e($key['cate_name']); ?></span>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </aside>
                <div class="course-list">

                    <?php if(isset($subject)): ?>
                    <?php $__currentLoopData = $subject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="course-item">
                        <div class="course-poster">
                            <a href="bai-hoc?mon=<?php echo e($key['subject_slug']); ?>"><img src="./public/img/<?php echo e($key['subject_img']); ?>" class=" img-fluid"></img></a>
                        </div>
                        <div class="course-text">
                            <h3 class="course__title" style="font-size: 15px;"><?php echo e($key['subject_name']); ?></h3>
                            <span class="course__members">
                                <i class="fas fa-users"></i>
                                123
                            </span>
                            <?php if($key['type_id'] == 0): ?>
                            <span class="course__price course__price--free">Miễn phí</span>
                            <?php else: ?>
                            <span class="course__price course__price--cost"><?php echo number_format($key['subject_price']) ?>đ</span>
                            <span class="course__price course__price--old"><?php echo number_format($key['subject_sale']) ?>đ</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
    </main>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $(document).ready(function() {
        $('.cate_id').click(function(e) {
            e.preventDefault();
            var cate_id = $(this).data('id');
            $.get("khoa-hoc-theo-nganh", {
                cate_id: cate_id
            }, function($data) {
                $('.course-list').html($data);
            })
        })
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\project_one\app\views/customer/courses.blade.php ENDPATH**/ ?>