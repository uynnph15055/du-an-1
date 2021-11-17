@extends('customer.layout.layout')
@section('title', 'Trang chủ')
@section('main_content')
<div class="container">
    <div class="banner">
        <div class="row">
            <div class="banner-text col l-6 m-6 c-12">
                <div class="banner-text-list">
                    <?php
                    echo $banner['banner_text'];
                    ?>
                    <button class="banner-text__item btn-primary">
                        Học ngay
                    </button>
                </div>
            </div>
            <div class="banner-img col l-6 m-6 c-12">
                <img width="600px" src="./public/img/images/z2913185640491_c2f671e7f2f6491d7771792c1aa7fdf5.jpg" alt="">
            </div>
        </div>
    </div>
    <main>
        <!-- <img class="img-fluid bgr" src="./asset/images/nasa-Q1p7bh3SHj8-unsplash.jpg" alt=""> -->
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
                        <p>Lộ trình được nghiên cứu và sắp xếp bởi các thầy cô có nhiều kinh nghiệm</p>
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
                        <p>Ghi chú dễ dàng, nhanh chóng</p>
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
                        <p>Nội dung với chất lượng được đảm bảo bởi những chuyên gia</p>
                    </div>
                </div>
            </div>

            <div class="course-new">
                <h2>CÁC KHÓA HỌC MỚI NHẤT</h2>
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="course-item">
                                <div class="course-poster">
                                    <img src="./public/img/z2937831501208_80d421b1a4c4cf32f5abc9f42c0ee2ba.jpg" class=" img-fluid"></img>
                                </div>
                                <div class="course-text">
                                    <h3 class="course__title">HTML</h3>
                                    <span class="course__members">
                                        <i class="fas fa-users"></i>
                                        123
                                    </span>
                                    <span class="course__price course__price--free">Miễn phí</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="course-item">
                                <div class="course-poster">
                                    <img src="./public/img/z2937831501208_80d421b1a4c4cf32f5abc9f42c0ee2ba.jpg" class=" img-fluid"></img>
                                </div>
                                <div class="course-text">
                                    <h3 class="course__title">HTML</h3>
                                    <span class="course__members">
                                        <i class="fas fa-users"></i>
                                        123
                                    </span>
                                    <span class="course__price course__price--free">Miễn phí</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="course-item">
                                <div class="course-poster">
                                    <img src="./public/img/z2937831501208_80d421b1a4c4cf32f5abc9f42c0ee2ba.jpg" class=" img-fluid"></img>
                                </div>
                                <div class="course-text">
                                    <h3 class="course__title">HTML</h3>
                                    <span class="course__members">
                                        <i class="fas fa-users"></i>
                                        123
                                    </span>
                                    <span class="course__price course__price--free">Miễn phí</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="course-item">
                                <div class="course-poster">
                                    <img src="./public/img/z2937831501208_80d421b1a4c4cf32f5abc9f42c0ee2ba.jpg" class=" img-fluid"></img>
                                </div>
                                <div class="course-text">
                                    <h3 class="course__title">HTML</h3>
                                    <span class="course__members">
                                        <i class="fas fa-users"></i>
                                        123
                                    </span>
                                    <span class="course__price course__price--free">Miễn phí</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="course-item">
                                <div class="course-poster">
                                    <img src="./public/img/z2937831501208_80d421b1a4c4cf32f5abc9f42c0ee2ba.jpg" class=" img-fluid"></img>
                                </div>
                                <div class="course-text">
                                    <h3 class="course__title">HTML</h3>
                                    <span class="course__members">
                                        <i class="fas fa-users"></i>
                                        123
                                    </span>
                                    <span class="course__price course__price--free">Miễn phí</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button swiper-button-next"></div>
                    <div class="swiper-button swiper-button-prev"></div>
                </div>
            </div>

            <div class="value">
                <img src="./public/img/images/undraw_Connecting_Teams_re_hno7.png" alt="" class="img-fluid value__img">
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
            <img class="img-fluid" src="./public/img/images/marvin-meyer-SYTO3xs06fU-unsplash.jpg" alt="">
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
                            <span class="your-gift__text-sub">
                                Các bài học đi đôi với thực hành, làm bài kiểm tra ngay trên trang web và bạn luôn
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
                <img src="./public/img/images/undraw_Connecting_Teams_re_hno7.png" alt="" class="img-fluid your-gift__img">
            </div>
        </div>

        <div class="rating">
            <div class="rating-container">
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <div class="rating-feedback">
                            <div class="img-acc">
                                <img src="https://picsum.photos/200/200" alt="" class="img-fluid">
                                <h4 class="name-acc">
                                    Nguyễn Anh
                                </h4>
                            </div>
                            <div class="feedback-text">
                                <div class="fb-m">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="feedback-text__content">
                                        “Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                        dolore eu
                                        fugiat nulla pariatur.

                                        Excepteur sint occaecat cupidatat
                                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum”
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mySlides fade">
                        <div class="rating-feedback">
                            <div class="img-acc">
                                <img src="https://picsum.photos/200/200" alt="" class="img-fluid">
                                <h4 class="name-acc">
                                    Nguyễn Anh 2
                                </h4>
                            </div>
                            <div class="feedback-text">
                                <div class="fb-m">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="feedback-text__content">
                                        “Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                        dolore eu
                                        fugiat nulla pariatur.

                                        Excepteur sint occaecat cupidatat
                                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum”
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mySlides fade">
                        <div class="rating-feedback">
                            <div class="img-acc">
                                <img src="https://picsum.photos/200/200" alt="" class="img-fluid">
                                <h4 class="name-acc">
                                    Nguyễn Anh 3
                                </h4>
                            </div>
                            <div class="feedback-text">
                                <div class="fb-m">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="feedback-text__content">
                                        “Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                        dolore eu
                                        fugiat nulla pariatur.

                                        Excepteur sint occaecat cupidatat
                                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum”
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

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
                <button class="btn-action">Bắt đầu học</button>
            </div>
        </div>
    </main>
</div>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="./public/js/cus/swiper-slider.js"></script>
<script src="./js/slideshow-rating.js"></script>
@endsection