<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'PT16306 project_one'); ?></title>
    <!-- reset -->
    <link rel="stylesheet" href="./public/css/customerCss/reset.css">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    <!-- css -->
    <link rel="stylesheet" href="./public/css/customerCss/style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
<?php echo $__env->yieldContent('link'); ?>
</head>

<body>
    <div class="container">
        <header style="z-index: 10;">
            <div class="navbar-container">
                <div class="navbar-fluid">
                    <div class="navbar-logo">
                        <a href="./">
                            <img src="./public/img/images/logo-main.png" alt="" class="img-fluid img__logo">
                        </a>
                    </div>
                    <div class="navbar-content">
                        <nav class="nav__menu">
                            <ul class="nav__list">
                                <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav__item"><a href="<?php echo e($key['menu_slug']); ?>" class="nav__item-link"><?php echo e($key['menu_name']); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </nav>
                        <div class="navbar-action">
                            <?php if (isset($_SESSION['user_info'])) {
                                $user_info = $_SESSION['user_info'];
                            } ?>
                            <?php if(isset($user_info)): ?>
                            <div class="navbar-action-content">
                                <button class="action-item">
                                    <i class="fas fa-grin-stars"></i>
                                </button>
                                <button class="action-item">
                                    <i class="fas fa-bell"></i>
                                </button>
                                <div class="account-section action-item">
                                    <button style="padding: 0; border-radius: 50%; cursor: pointer; overflow: hidden; width: 30px; height: 30px" onclick="toggleShowHide()" id="btn-acc">
                                        <img style="object-fit: cover; width: 30px; height: 30px" src="./public/img/<?= $user_info[0]['student_avatar'] ?>" alt="">
                                    </button>
                                    <div id="account-list" class="content-container-acc">
                                        <a class="account-item" href="">Thông tin tài khoản</a>
                                        <div class="account-item account-item--mode">
                                            <span>
                                                Chế độ
                                            </span>
                                            <div class="theme-switch-wrapper">
                                                <label class="theme-switch" for="checkbox">
                                                    <input type="checkbox" id="checkbox" />
                                                    <div class="slider round">
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <a class="account-item" href="dang-xuat">Đăng xuất</a>
                                    </div>
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="navbar-action-button">
                                <a href="dang-nhap-dang-ky" class="action-btn btn-secondary">
                                    Đăng nhập
                                </a>
                                <a href="dang-nhap-dang-ky" class="action-btn btn-primary">
                                    Đăng ký
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <?php echo $__env->yieldContent('main_content'); ?>;
        </main>
<<<<<<< HEAD
        <footer style="margin-top: -100px;">

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

            <svg viewbox="0 0 1440 328" width="100vw">
                <defs>
                    <clipPath id="wave" clipPathUnits="objectBoundingBox" transform="scale(0.00069444444, 0.00304878048)">
                        <path d="M504.452 27.7002C163.193 -42.9551 25.9595 38.071 0 87.4161V328H1440V27.7002C1270.34 57.14 845.711 98.3556 504.452 27.7002Z" />
                    </clipPath>
                </defs>
            </svg>
        </footer>
=======
>>>>>>> 473fb33459496197fe24ce4cbd987b50a59895ea
    </div>
    <script src="./public/js/customerJs/toggle.js"></script>
    <script src="./public/js/customerJs/darkMode.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./public/js/customerJS/footer.js"></script>
    <?php echo $__env->yieldContent('javascript'); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\project_one\app\views/customer/layout/layout.blade.php ENDPATH**/ ?>