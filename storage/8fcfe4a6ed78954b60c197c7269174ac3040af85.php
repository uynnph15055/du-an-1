
<?php $__env->startSection('title', 'Trang chủ'); ?>
<?php $__env->startSection('main_content'); ?>
<style>
    .swiper-button-next, .swiper-button-prev{
        box-shadow: 0 0 5px #eee;
    }
    .swiper-button-next::after, .swiper-button-prev::after{
        content: "";
    }
    .swiper-button-prev{
        margin-left: -10px;
    }
    .swiper-button-next{
        margin-right: -10px;
    }
</style>
<div class="container">
    <div class="banner">
        <div class="row">
            <div class="banner-text col l-6 m-6 c-12">
                <div class="banner-text-list">
                    <h1 class="banner-text__item slogan" style="color: #555">
                        <?php echo e($banner['banner_title']); ?>

                    </h1>
                    <p class="banner-text__item slogan-sub" style="line-height: 1.4;margin-top: 10px;color: #555">
                        <?php echo e($banner['banner_text']); ?>

                    </p>
                    <button href="khoa-hoc" class="banner-text__item btn-primary">
                        <a style="color:#ffff;" href="khoa-hoc">Học ngay</a>
                    </button>
                </div>
            </div>
            <div class="banner-img col l-6 m-6 c-12">
                <img class="img-fluid" src="./public/img/<?php echo e($banner['banner_img']); ?>" alt="">
            </div>
        </div>
    </div>
    <main>
        <div class="container-fluid">
            <div class="significant">
                <div class="significant-item">
                    <div class="significant-item__icon">
                        <i class="fas fa-list-alt"></i>
                    </div>
                    <div class="significant-item__text">
                        <span>
                            Lộ trình rõ ràng
                        </span>
                        <p class="significant-item__detail">Lộ trình được nghiên cứu và sắp xếp bởi các thầy cô có nhiều kinh nghiệm</p>
                    </div>
                </div>
                <div class="significant-item">
                    <div class="significant-item__icon">
                        <i class="fas fa-sticky-note"></i>
                    </div>
                    <div class="significant-item__text">
                        <span>
                            Ghi chú dễ dàng
                        </span>
                        <p class="significant-item__detail">Ghi chú dễ dàng, nhanh chóng, ngay tại nội dung bài học.</p>
                    </div>
                </div>
                <div class="significant-item">
                    <div class="significant-item__icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="significant-item__text">
                        <span>
                            Nội dung chất lượng
                        </span>
                        <p class="significant-item__detail">Nội dung với chất lượng được đảm bảo bởi những chuyên gia</p>
                    </div>
                </div>
            </div>
            <?php use App\Models\modelHistory; ?>
            <div class="course-new">
                <h2>CÁC KHÓA HỌC MỚI NHẤT</h2>
            
                <div class="swiper">
                    <?php if (isset($_SESSION['user_info'])) {
                        $user_info = $_SESSION['user_info'];
                    } ?>
                    <?php if(isset($user_info)): ?>
                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = $dataSubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide">
                            <div class="course-item">
                                <div class="course-poster">
                                    <?php $__currentLoopData = $dataBill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valueBill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($valueBill['code_vnpay']==$user['student_id'].$key['subject_id']): ?>
                                    <?php $bill_vnpay = $valueBill['code_vnpay'] ?>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key['type_id'] == 0): ?>
                                    <a href="mo-ta-mon-hoc?mon=<?php echo e($key['subject_slug']); ?>"><img src="./public/img/<?php echo e($key['subject_img']); ?>" class=" img-fluid"></img></a>
                                    <?php elseif(isset($bill_vnpay) && $bill_vnpay==$user['student_id'].$key['subject_id']): ?>

                                    <a href="mo-ta-mon-hoc?mon=<?php echo e($key['subject_slug']); ?>"><img src="./public/img/<?php echo e($key['subject_img']); ?>" class=" img-fluid"></img></a>
                                    <?php else: ?>
                                    <a href="mo-ta-mon-hoc?mon=<?php echo e($key['subject_slug']); ?>"><img src="./public/img/<?php echo e($key['subject_img']); ?>" class=" img-fluid"></img></a>
                                    <?php endif; ?>

                                </div>
           
                                <div class="course-text">
                                    <a href="mo-ta-mon-hoc?mon=<?php echo e($key['subject_slug']); ?>">
                                        <h3 class="course__title"><?php echo e($key['subject_name']); ?></h3>
                                       
                                        <span class="course__members">
                                            <i class="fas fa-users"></i>
                                          <?php $countStudent=count(modelHistory::countStudent($key['subject_id']));
                                       echo $countStudent;
                                          ?>
                                        </span>
                                        <?php $__currentLoopData = $dataBill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valueBill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($valueBill['code_vnpay']==$user['student_id'].$key['subject_id']): ?>
                                        <?php $bill_vnpay = $valueBill['code_vnpay'] ?>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($key['type_id'] == 0): ?>
                                        <span class="course__price course__price--free">Miễn phí</span>
                                        <?php elseif(isset($bill_vnpay) && $bill_vnpay==$user['student_id'].$key['subject_id']): ?>
                                        <span class="course__price course__price--free">Đã mở</span>


                                        <?php else: ?>
                                        <span class="course__price course__price--cost"><?php echo number_format($key['subject_sale']) ?>đ</span>
                                        <span class="course__price course__price--old"><?php echo number_format($key['subject_price']) ?>đ</span>
                                        <?php endif; ?>
                                        <!-- <?php if($key['type_id'] == 0): ?>
                                        <span class="course__price course__price--free">Miễn phí</span>
                                        <?php else: ?>
                                        
                                        <?php endif; ?> -->
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php else: ?>
                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = $dataSubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide">
                            <div class="course-item">
                                <div class="course-poster">
                                    <a href="mo-ta-mon-hoc?mon=<?php echo e($key['subject_slug']); ?>"><img src="./public/img/<?php echo e($key['subject_img']); ?>" class=" img-fluid"></img></a>
                                </div>
                                <div class="course-text">
                                    <a href="mo-ta-mon-hoc?mon=<?php echo e($key['subject_slug']); ?>">
                                        <h3 class="course__title"><?php echo e($key['subject_name']); ?></h3>
                                        <span class="course__members">
                                            <i class="fas fa-users"></i>
                                            123
                                        </span>
                                        <?php if($key['type_id'] == 0): ?>
                                        <span class="course__price course__price--free">Miễn phí</span>
                                        <?php else: ?>
                                        <span class="course__price course__price--cost"><?php echo number_format($key['subject_sale']) ?>đ</span>
                                        <span class="course__price course__price--old"><?php echo number_format($key['subject_price']) ?>đ</span>
                                        <?php endif; ?>
                                        <!-- <?php if($key['type_id'] == 0): ?>
                                        <span class="course__price course__price--free">Miễn phí</span>
                                        <?php else: ?>
                                        
                                        <?php endif; ?> -->
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                    <div class="swiper-button swiper-button-next"><i class="fas fa-chevron-right"></i></div>
                    <div class="swiper-button swiper-button-prev"><i class="fas fa-chevron-left"></i></div>
                </div>
            </div>

            <div class="value">
                <img src="./public/img/banner-image.png" style="height:350px" alt="" class="img-fluid value__img">
                <div class="value-text-section">
                    <h2 class="value-text__title">Giá trị cốt lõi</h2>
                    <div class="value-text-list">
                        <div class="value-text-item">
                            <i class="fas fa-people-carry"></i>
                            <span class="value-text">
                                Sự tử tế
                            </span>
                        </div>
                        <div class="value-text-item">
                            <i class="fas fa-brain"></i>
                            <span class="value-text">
                                Tư duy số
                            </span>
                        </div>
                        <div class="value-text-item">
                            <i class="fas fa-assistive-listening-systems"></i>
                            <span class="value-text">
                                Luôn đổi mới và không ngừng học
                            </span>
                        </div>
                        <div class="value-text-item">
                            <i class="fas fa-hiking"></i>
                            <span class="value-text">
                                Tư duy bền vững
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="count-member">
            <img class="img-fluid" style="width:100%" src="./public/img/images/bgr-count-member.png" alt="">
            <div class="container-fluid">
                <div class="count-member-text">
                    <span class="text-numb">
                        100.000+
                    </span>
                    <span class="text-numb-sub">Học viên</span>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="your-gift">
                <div class="your-gift-text-section">
                    <h2 class="your-gift-text__title">Bạn nhận được gì từ COURSE IFT?</h2>
                    <div class="your-gift-text-list">
                        <div class="your-gift-text-item">
                            <span class="your-gift__text">
                                1. Sự thành thạo
                            </span>
                            <span class="your-gift__text-sub significant-item-detail-sub">
                                Các bài học đi đôi với thực hành, làm bài kiểm tra ngay và bạn luôn
                                có
                                sản
                                phẩm thực tế sau mỗi khóa học.
                            </span>
                        </div>
                        <div class="your-gift-text-item">
                            <span class="your-gift__text">
                                2. Tính tự học
                            </span>
                            <span class="your-gift__text-sub">
                                Một con người chỉ thực sự trưởng thành trong sự nghiệp nếu họ biết cách
                                tự
                                thu
                                nạp kiến thức mới cho chính mình.</span>
                        </div>
                        <div class="your-gift-text-item">
                            <span class="your-gift__text">
                                3. Tiết kiệm thời gian
                            </span>
                            <span class="your-gift__text-sub">
                                Thay vì chật vật vài năm thì chỉ cần 4-6 tháng để có thể bắt đầu công việc đầu tiên
                                với
                                vị
                                trí Intern tại công ty IT. </span>
                        </div>
                        <div class="your-gift-text-item">
                            <span class="your-gift__text">
                                4. Làm điều quan trọng
                            </span>
                            <span class="your-gift__text-sub">
                                Chỉ học và làm những điều quan trọng để đạt được mục tiêu đi làm được trong thời
                                gian
                                ngắn nhất.</span>
                        </div>
                    </div>
                </div>
                <img src="./public/img/istockphoto-1171646208-612x612.jpg" alt="" class="img-fluid your-gift__img">
            </div>
        </div>

        <div class="rating">
            <div class="rating-container">
                <div class="slideshow-container">
                    <?php $__currentLoopData = $dataAssess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mySlides fade">
                        <div class="rating-feedback">
                            <div class="img-acc">
                                <img src="<?php echo e($key['student_avatar']); ?>" alt="" class="img-fluid">
                                <h4 class="name-acc">
                                    <?php echo e($key['student_name']); ?>

                                </h4>
                            </div>
                            <div class="feedback-text" style="margin-top: 10px;">
                                <div class="fb-m">
                                    <div class="stars">
                                        <?php for($i =0 ; $i < $key['assess_star'] ; $i++): ?> <i class="fas fa-star"></i>
                                            <?php endfor; ?>
                                    </div>
                                    <p class="feedback-text__content" style="line-height: 1.6;font-size:20px;margin-top:-10px">
                                        “ <?php echo e($key['assess_content']); ?> ”
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>

                </div>
                <br>

                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>

            </div>
        </div>

        <div class="container-fluid">
            <div class="action-call">
                <a href="./khoa-hoc" class="btn-action">Bắt đầu học</a>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer-content">
            <div class="content">
                <div class="footer-social">
                    <a href="" class="social-link">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-link">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="" class="social-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
                <ul class="footer-links">
                    <li><a class="link-item" href="">Các khóa học</a></li>
                    <li><a class="link-item" href="">Liên hệ</a></li>
                    <li><a class="link-item" href="">Giới thiệu</a></li>
                    <li><a class="link-item" href="">Trợ giúp</a></li>
                </ul>
                <div class="footer-copyright">
                    <span>Copyright © 2021 - Course IFT</span>
                </div>
            </div>
            <div class="gooey-animations">
            </div>
        </div>

        <svg xmlns="" version="1.1">
            <defs>
                <filter id="goo">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="15" result="blur" />
                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 15 -7" result="goo" />
                    <feBlend in="SourceGraphic" in2="goo" />
                </filter>
            </defs>
        </svg>

        <svg viewbox="0 0 1440 0" width="100%">
            <defs>
                <clipPath id="wave" clipPathUnits="objectBoundingBox" transform="scale(0.00069444444, 0.00304878048)">
                    <path d="M504.452 27.7002C163.193 -42.9551 25.9595 38.071 0 87.4161V328H1440V27.7002C1270.34 57.14 845.711 98.3556 504.452 27.7002Z" />
                </clipPath>
            </defs>
        </svg>
    </footer>
</div>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="./public/js/customerJs/swiper-slider.js"></script>
<script src="./public/js/customerJs/slideshow-rating.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project_one\app\views/customer/home.blade.php ENDPATH**/ ?>