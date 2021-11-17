<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PT16306 project_one')</title>
    <!-- reset -->
    <link rel="stylesheet" href="./public/css/customerCss/reset.css">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    <!-- css -->
    <link rel="stylesheet" href="./public/css/customerCss/style.css">
</head>

<body>
    <div class="container">
        <header>
            <div class="navbar-container">
                <div class="navbar-fluid">
                    <div class="navbar-logo">
                        <a href="">
                            <img src="./public/img/images/logo-main.png" alt="" class="img-fluid img__logo">
                        </a>
                    </div>
                    <div class="navbar-content">
                        <nav class="nav__menu">
                            <ul class="nav__list">
                                @foreach($menu as $key)
                                <li class="nav__item"><a href="{{$key['menu_slug']}}" class="nav__item-link">{{$key['menu_name']}}</a></li>
                                @endforeach
                            </ul>
                        </nav>
                        <div class="navbar-action">
                            <div class="navbar-action-button">
                                <button class="action-btn btn-secondary">
                                    Đăng nhập
                                </button>
                                <button class="action-btn btn-primary">
                                    Đăng ký
                                </button>
                            </div>
                            <!-- <div class="navbar-action-content">
                                <button class="action-item">
                                    <i class="fas fa-grin-stars"></i>
                                </button>
                                <button class="action-item">
                                    <i class="fas fa-bell"></i>
                                </button>
                                <div class="account-section action-item">
                                    <button onclick="toggleShowHide()" id="btn-acc">
                                        <i class="fas fa-user-circle icon-account"></i>
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
                                        <a class="account-item" href="">Đăng xuất</a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            @yield('main_content');
        </main>
    </div>
    <script src="./public/js/customerJs/toggle.js"></script>
    <script src="./public/js/customerJs/darkMode.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            <?php if (isset($_SESSION['error'])) { ?>

                Swal.fire({
                    icon: 'warning',
                    title: '<p  style="font-size: 19px;"><?= $_SESSION['error']; ?></p>',
                    // title: '<p  style="font-ze: 20px;"><?= $_SESSION['error']; ?></p>',
                    timer: 3000,
                    width: 400,
                    padding: '4em',
                    confirmButtonText: '<i style="padding: 3px;font-size: 20px">OK</i>',



                })

            <?php
                unset($_SESSION['error']);
            } elseif (isset($_SESSION['success'])) { ?>
                Swal.fire({

                    icon: 'success',
                    title: '<p  style="font-size: 22px;"><?= $_SESSION['success']; ?></p>',
                    showConfirmButton: false,
                    timer: 1500,
                    width: 450,
                    padding: '5em',

                })

            <?php unset($_SESSION['success']);
            }
            ?>
        });
    </script>
</body>

</html>