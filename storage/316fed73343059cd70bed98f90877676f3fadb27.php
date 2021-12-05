
<?php $__env->startSection('title', 'Khóa học'); ?>
<?php $__env->startSection('main_content'); ?>
<div class="container bgr-img">
    <div class="container-fluid">
        <div class="contact-section">
            <div class="contact-text">
                <div class="contact-text-head">
                    <h2 class="contact__title">
                        Liên hệ
                    </h2>
                    <p class="contact__subtitle">
                        Hãy nói cho chúng tôi biết những thắc mắc của bạn
                    </p>
                </div>
                <div class="contact-text-body">
                    <div class="text-body-item">
                        <i class="fas fa-envelope"></i>
                        <span class="item__text">courses@gmail.com</span>
                    </div>
                    <div class="text-body-item">
                        <i class="fas fa-phone-alt"></i>
                        <span class="item__text">+84 12345689</span>
                    </div>
                    <div class="text-body-item">
                        <i class="fas fa-map-marked-alt"></i>
                        <span class="item__text">Hà Nội, Việt Nam</span>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <form action="" class="contact__form">
                    <label class="form__title" for="">Họ tên</label>
                    <input type="text" class="form__input">
                    <label class="form__title" for="">Email</label>
                    <input type="email" class="form__input">
                    <label class="form__title" for="">Nội dung</label>
                    <textarea class="form__input" name="" id="" cols="30" rows="10"></textarea>
                    <div class="btn-right">
                        <button type="submit" class="btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KI III\xam\htdocs\project_one\app\views/customer/contact.blade.php ENDPATH**/ ?>