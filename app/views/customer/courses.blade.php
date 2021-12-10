@extends('customer.layout.layout')
@section('title', 'Khóa học')
@section('main_content')
<div class="container" style="padding-top:30px">
    <div class="container-fluid">
        <div class="search-section">
            <div class="form-container">
                <div class="form-content">
                    <h2>HÔM NAY BẠN MUỐN HỌC GÌ?</h2>
                    <form action="tim-kiem-khoa-hoc" method="POST">
                        <input class="input-search" name="name_course" type="text">
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
                    <div class="filter-list">
                        <form action="" class="select">
                            <select name="" id="select_status">
                                <option value="0">Tất cả</option>
                                <option value="1">Miễn phí</option>
                                <option value="2">Trả phí</option>
                            </select>
                        </form>
                    </div>
                    <!-- </div> -->
                    <ul class="courses-cate-list">
                        @foreach($cateSubject as $key)
                        <li class="course-cate__item">
                            <a data-id="{{$key['cate_id']}}" class="cate_id" href="">
                                <i class="fas fa-laptop-code"></i>
                                <span>{{$key['cate_name']}}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </aside>
                <?php use App\Models\modelHistory; ?>
                <?php if (isset($_SESSION['user_info'])) {
                    $user_info = $_SESSION['user_info'];
                } ?>
                @if(isset($user_info))
                <div class="course-list">
                    @if(isset($subject))
                    @foreach($subject as $key)
                    <div class="course-item">
                        @foreach($dataBill as $valueBill)
                        @if($valueBill['code_vnpay']==$user['student_id'].$key['subject_id'])
                        <?php $bill_vnpay = $valueBill['code_vnpay'] ?>
                        @endif
                        @endforeach
                        @if($key['type_id'] == 0)
                        <div class="course-poster">
                            <a href="mo-ta-mon-hoc?mon={{$key['subject_slug']}}"><img src="./public/img/{{$key['subject_img']}}" class=" img-fluid"></img></a>
                        </div>
                        @elseif(isset($bill_vnpay) && $bill_vnpay==$user['student_id'].$key['subject_id'])

                        <div class="course-poster">
                            <a href="mo-ta-mon-hoc?mon={{$key['subject_slug']}}"><img src="./public/img/{{$key['subject_img']}}" class=" img-fluid"></img></a>
                        </div>
                        @else
                        <div class="course-poster">
                            <a href="mo-ta-mon-hoc?mon={{$key['subject_slug']}}"><img src="./public/img/{{$key['subject_img']}}" class=" img-fluid"></img></a>
                        </div>
                        @endif
                        <div class="course-text">
                            <h3 class="course__title">
                                <a href="mo-ta-mon-hoc?mon={{$key['subject_slug']}}">
                                    {{$key['subject_name']}}
                                </a>
                            </h3>
                            <span class="course__members">
                                <i class="fas fa-users"></i>
                                <?php $countStudent=count(modelHistory::countStudent($key['subject_id']));
                                       echo $countStudent;
                                          ?>
                            </span>
                            @foreach($dataBill as $valueBill)
                            @if($valueBill['code_vnpay']==$user['student_id'].$key['subject_id'])
                            <?php $bill_vnpay = $valueBill['code_vnpay'] ?>
                            @endif
                            @endforeach
                            @if($key['type_id'] == 0)
                            <span class="course__price course__price--free">Miễn phí</span>
                            @elseif(isset($bill_vnpay) && $bill_vnpay==$user['student_id'].$key['subject_id'])
                            <span class="course__price course__price--free">Đã mở</span>


                            @else
                            <span class="course__price course__price--cost"><?php echo number_format($key['subject_sale']) ?>đ</span>
                            <span class="course__price course__price--old"><?php echo number_format($key['subject_price']) ?>đ</span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                @else
                <div class="course-list">
                    @if(isset($subject))
                    @foreach($subject as $key)
                    <div class="course-item">
                        <div class="course-poster">
                            <a href="mo-ta-mon-hoc?mon={{$key['subject_slug']}}"><img src="./public/img/{{$key['subject_img']}}" class=" img-fluid"></img></a>
                        </div>
                        <div class="course-text">
                            <h3 class="course__title">
                                <a href="mo-ta-mon-hoc?mon={{$key['subject_slug']}}">
                                    {{$key['subject_name']}}
                                </a>
                            </h3>
                            <span class="course__members">
                                <i class="fas fa-users"></i>
                                3
                            </span>
                            @if($key['type_id'] == 0)
                            <span class="course__price course__price--free">Miễn phí</span>
                            @else
                            <span class="course__price course__price--cost"><?php echo number_format($key['subject_sale']) ?>đ</span>
                            <span class="course__price course__price--old"><?php echo number_format($key['subject_price']) ?>đ</span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                @endif
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
                    <li><a class="link-item" href="khoa-hoc">Các khóa học</a></li>
                    <li><a class="link-item" href="lien-he">Liên hệ</a></li>
                    <li><a class="link-item" href="gioi-thieu">Giới thiệu</a></li>
                    <li><a class="link-item" href="trang-chu">Trợ giúp</a></li>
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
<script>
    $(document).ready(function() {
        $('#select_status').on('change', function() {
            var select_status = $(this).val();
            $.get("khoa-hoc-select", {
                select_status: select_status
            }, function($data) {
                $('.course-list').html($data);
            })
        });
    });
</script>
@endsection