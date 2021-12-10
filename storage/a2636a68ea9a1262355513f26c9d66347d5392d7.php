
<?php $__env->startSection('title', 'Đánh giá'); ?>
<?php $__env->startSection('main_content'); ?>
<style>
    /* star */
    .star-bg {
        display: flex;
        justify-content: center;
        transform: scale(-1);
    }

    div.stars {
        width: 100;
        text-align: center;
        margin: auto;
    }

    input.star {
        display: none;
    }

    label.star {
        float: right;
        padding: 10px;
        font-size: 25px;
        color: #444;
        transition: all .2s;
    }

    input.star:checked~label.star:before {
        content: '\f005';
        color: #FD4;
        transition: all .25s;
    }

    input.star-5:checked~label.star:before {
        color: #FE7;
        text-shadow: 0 0 20px #952;
    }

    input.star-1:checked~label.star:before {
        color: #F62;
    }

    label.star:hover {
        transform: rotate(-15deg) scale(1.3);
    }

    label.star:before {
        content: '\f006';
        font-family: FontAwesome;
    }


    /* --------------------------------- */
    .feedback-container {
        margin: 100px auto;
        width: 580px;
        text-align: center;
        padding: 30px;
        border: 2px solid var(--color-primary);
        border-radius: 10px;
    }

    .feedback__title {
        color: var(--color-primary);
        font-weight: bold;
        font-size: 20px;
    }

    .star {
        margin: 10px;
    }

    .star i {
        color: yellow;
        font-size: 20px;
    }

    textarea {
        width: 100%;
        background: rgb(241, 241, 241);
        border: none;
        border-radius: 10px;
        padding: 10px;
        height: 120px;
        margin: 10px 0;
    }

    .btn-feedback {
        text-align: right;
    }

    .btn-feedback button {
        min-width: 80px;
    }
</style>
<div class="container" style="margin-top: 100px;">
    <div class="feedback-container">
        <h2 class="feedback__title" style="text-align: center;">
            Bạn đã hoàn thành khóa học này bạn
        </h2>
        <br>
        <h2 class="feedback__title" style="text-align: center;">
            Hãy cho tôi biết cảm nhận của bạn !
        </h2>
        <div class="stars">
            <form action="luu-danh-gia" method="POST">
                <div class="star-bg">
                    <input type="text" hidden name="subject_id" value="<?php echo e($subject_id); ?>">
                    <input class="star star-5" value="1" id="star-5" type="radio" name="star[]" />
                    <label class="star star-5" for="star-5"></label>
                    <input class="star star-4" value="2" id="star-4" type="radio" name="star[]" />
                    <label class="star star-4" for="star-4"></label>
                    <input class="star star-3" value="3" id="star-3" type="radio" name="star[]" />
                    <label class="star star-3" for="star-3"></label>
                    <input class="star star-2" value="4" id="star-2" type="radio" name="star[]" />
                    <label class="star star-2" for="star-2"></label>
                    <input class="star star-1" value="5" id="star-1" type="radio" name="star[]" />
                    <label class="star star-1" for="star-1"></label>
                </div>
                <textarea id="" cols="30" style="font-size: 20px;" rows="10" name="content_assess">
                    </textarea>
                <div class="btn-feedback">
                    <button class="btn-primary">
                        Gửi
                    </button>
                </div>
            </form>
        </div>
    </div>
    <footer style="margin-top: -200px;">
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

        <svg viewbox="0 0 1440 328" width="100%">
            <defs>
                <clipPath id="wave" clipPathUnits="objectBoundingBox" transform="scale(0.00069444444, 0.00304878048)">
                    <path d="M504.452 27.7002C163.193 -42.9551 25.9595 38.071 0 87.4161V328H1440V27.7002C1270.34 57.14 845.711 98.3556 504.452 27.7002Z" />
                </clipPath>
            </defs>
        </svg>
    </footer>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\project_one\app\views/customer/assess.blade.php ENDPATH**/ ?>