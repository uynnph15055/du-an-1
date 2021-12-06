<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelCateSubject;
use App\Models\modelMenu;
use App\Models\modelSubject;
use App\Models\modelBill;

class Courses extends baseController
{
    private $menu;
    public function __construct()
    {
        $this->menu = modelMenu::sortMenu();
    }

    public function index()
    {
        if (!isset($_SESSION['user_info'])) {
            $dataBill = modelBill::all();
            $subject = modelSubject::all();
            $cateSubject = modelCateSubject::all();

            $subject = modelSubject::all();
            $cateSubject = modelCateSubject::all();
            $this->render("customer.courses", [
                'cateSubject' => $cateSubject,
                'subject' => $subject,
                'menu' => $this->menu,
            ]);
        } else {
            $dataBill = modelBill::all();
            $subject = modelSubject::all();
            $cateSubject = modelCateSubject::all();
            $this->render("customer.courses", [
                'cateSubject' => $cateSubject,
                'subject' => $subject,
                'menu' => $this->menu,
                'dataBill' => $dataBill,
                'user' => $_SESSION['user_info'][0],
            ]);
        }
    }

    public function listCourse()
    {
        $cate_id = $_GET['cate_id'];
        if (isset($_SESSION['user_info'])) {
            $user = $_SESSION['user_info'][0];
            $dataBill = modelBill::all();
            $course = [];
            if ($cate_id == null) {
                $course = modelSubject::all();
            } else {
                $course = modelSubject::where('cate_id', "=", $cate_id)->get();
                foreach ($course as $key) {
                    foreach ($dataBill as $valueBill) {
                        if ($valueBill['code_vnpay'] == $user['student_id'] . $key['subject_id']) {
                            $bill_vnpay = $valueBill['code_vnpay'];
                        }
                    }
                    $type = '';
                    $sale = '';
                    $class = '';
                    if ((int)$key['type_id'] == 0) {
                        $type = "Miễn Phí";
                        $class = 'course__price--free';
                    } elseif (isset($bill_vnpay) && $bill_vnpay == $user['student_id'] . $key['subject_id']) {
                        $type = "Đã Mở";
                        $class = 'course__price--free';
                    } else {
                        $class = 'course__price--old';
                        $type = number_format($key['subject_price']);
                        $sale = number_format($key['subject_sale']) . 'đ';
                    }
                    echo "
            <div class='course-item'>
                <div class='course-poster'>
                    <a href='mo-ta-mon-hoc?mon=" . $key['subject_slug'] . "'><img src='./public/img/" . $key['subject_img'] . "' class=' img-fluid'></img></a>
                </div>
                <div class='course-text'>
                    <h3 class='course__title' style='font-size: 15px;'>" . $key['subject_name'] . "</h3>
                    <span class='course__members'>
                        <i class='fas fa-users'></i>
                        123
                    </span>
                    <span class='course__price course__price--cost'>" . $sale . "</span>
                    <span class='course__price " . $class . "'>" . $type . "</span>
                </div>
            </div>";
                }
            }
        } else {
            $course = modelSubject::where('cate_id', "=", $cate_id)->get();
            foreach ($course as $key) {
                $type = '';
                $sale = '';
                $class = '';
                if ((int)$key['type_id'] == 0) {
                    $type = "Miễn Phí";
                    $class = 'course__price--free';
                } else {
                    $class = 'course__price--old';
                    $type = number_format($key['subject_price']);
                    $sale = number_format($key['subject_sale']) . 'đ';
                }
                echo "
            <div class='course-item'>
                <div class='course-poster'>
                    <a href='mo-ta-mon-hoc?mon=" . $key['subject_slug'] . "'><img src='./public/img/" . $key['subject_img'] . "' class=' img-fluid'></img></a>
                </div>
                <div class='course-text'>
                    <h3 class='course__title' style='font-size: 15px;'>" . $key['subject_name'] . "</h3>
                    <span class='course__members'>
                        <i class='fas fa-users'></i>
                        123
                    </span>
                    <span class='course__price course__price--cost'>" . $sale . "</span>
                    <span class='course__price " . $class . "'>" . $type . "</span>
                </div>
            </div>";
            }
        }
    }

    // Tìm kiếm khóa học
    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $keyWord = $_POST['name_course'];

            if (empty($keyWord)) {
                $_SESSION['error'] = "Bạn chưa điền gì cả !!!";
                header('Location: khoa-hoc');
                die();
            }

            $chuoi_con = 'Khóa học';
            $pos = strpos($keyWord, $chuoi_con);

            $keyWordNew = '';
            if ($pos !== false) {
                $keyWordNew =  trim(str_replace("Khóa học", "", $keyWord));
            } else {
                $keyWordNew = $keyWord;
            }
            // $this->dd($keyWordNew);
            $param = '%' . $keyWordNew . '%';
            $dataSubject = modelSubject::where("subject_name", "LIKE",  $param)->get();
            if (!isset($dataSubject) || empty($dataSubject)) {
                $_SESSION['error'] = "Không tìm thấy kết quả!!!";
                header('Location: khoa-hoc');
                die();
            }
            $cateSubject = modelCateSubject::all();
            // $this->dd($this->menu);
            $dataBill = modelBill::all();
            if (isset($_SESSION['user_info'])) {
                $this->render("customer.courses", [
                    'cateSubject' => $cateSubject,
                    'subject' => $dataSubject,
                    'menu' => $this->menu,
                    'dataBill' => $dataBill,
                    'user' => $_SESSION['user_info'][0],
                ]);
            } else {
                $this->render("customer.courses", [
                    'cateSubject' => $cateSubject,
                    'subject' => $dataSubject,
                    'menu' => $this->menu,
                ]);
            }
        } else {
            header('Location: khoa-hoc');
        }
    }

    public function followSelect()
    {
        $dataBill = modelBill::all();
        $select_id = $_GET['select_status'];
        $dataSubject = [];
        if (isset($_SESSION['user_info'])) {
            $user = $_SESSION['user_info'][0];
            if ($select_id == 0) {
                $dataSubject = modelSubject::all();
                foreach ($dataSubject as $key) {
                    foreach ($dataBill as $valueBill) {
                        if ($valueBill['code_vnpay'] == $user['student_id'] . $key['subject_id']) {
                            $bill_vnpay = $valueBill['code_vnpay'];
                        }
                    }
                    $type = '';
                    $sale = '';
                    $class = '';
                    if ((int)$key['type_id'] == 0) {
                        $type = "Miễn Phí";
                        $class = 'course__price--free';
                    } elseif (isset($bill_vnpay) && $bill_vnpay == $user['student_id'] . $key['subject_id']) {
                        $type = "Đã Mở";
                        $class = 'course__price--free';
                    } else {
                        $class = 'course__price--old';
                        $type = number_format($key['subject_price']);
                        $sale = number_format($key['subject_sale']) . 'đ';
                    }
                    echo "
                <div class='course-item'>
                    <div class='course-poster'>
                        <a href='mo-ta-mon-hoc?mon=" . $key['subject_slug'] . "'><img src='./public/img/" . $key['subject_img'] . "' class=' img-fluid'></img></a>
                    </div>
                    <div class='course-text'>
                        <h3 class='course__title' style='font-size: 15px;'>" . $key['subject_name'] . "</h3>
                        <span class='course__members'>
                            <i class='fas fa-users'></i>
                            123
                        </span>
                        <span class='course__price course__price--cost'>" . $sale . "</span>
                        <span class='course__price " . $class . "'>" . $type . "</span>
                    </div>
                </div>";
                }
            } elseif ($select_id == 1) {
                $dataSubject = modelSubject::where("type_id", "=", 0)->get();
                foreach ($dataSubject as $key) {

                    echo "
                <div class='course-item'>
                    <div class='course-poster'>
                        <a href='mo-ta-mon-hoc?mon=" . $key['subject_slug'] . "'><img src='./public/img/" . $key['subject_img'] . "' class=' img-fluid'></img></a>
                    </div>
                    <div class='course-text'>
                        <h3 class='course__title' style='font-size: 15px;'>" . $key['subject_name'] . "</h3>
                        <span class='course__members'>
                            <i class='fas fa-users'></i>
                            123
                        </span>
                        <span class='course__price--free'>Miễn phí</span>
                    </div>
                </div>";
                }
            } elseif ($select_id == 2) {

                $dataSubject = modelSubject::where("type_id", "=", 1)->get();
                foreach ($dataSubject as $key) {
                    foreach ($dataBill as $valueBill) {
                        if ($valueBill['code_vnpay'] == $user['student_id'] . $key['subject_id']) {
                            $bill_vnpay = $valueBill['code_vnpay'];
                        }
                    }
                    $type = '';
                    $sale = '';
                    $class = '';

                    if (isset($bill_vnpay) && $bill_vnpay == $user['student_id'] . $key['subject_id']) {
                        $type = "Đã Mở";
                        $class = 'course__price--free';
                    } else {
                        $class = 'course__price--old';
                        $type = number_format($key['subject_price']);
                        $sale = number_format($key['subject_sale']) . 'đ';
                    }

                    echo "
                    <div class='course-item'>
                    <div class='course-poster'>
                        <a href='mo-ta-mon-hoc?mon=" . $key['subject_slug'] . "'><img src='./public/img/" . $key['subject_img'] . "' class=' img-fluid'></img></a>
                    </div>
                    <div class='course-text'>
                        <h3 class='course__title' style='font-size: 15px;'>" . $key['subject_name'] . "</h3>
                        <span class='course__members'>
                            <i class='fas fa-users'></i>
                            123
                        </span>
                        <span class='course__price course__price--cost'>" . $sale . "</span>
                        <span class='course__price " . $class . "'>" . $type . "</span>
                    </div>
                </div>";
                }
            } else {
                $_SESSION['error'] = "Lỗi";
                die();
            }
        } else {
            if ($select_id == 0) {
                $dataSubject = modelSubject::all();
                foreach ($dataSubject as $key) {
                    $type = '';
                    $sale = '';
                    $class = '';
                    if ((int)$key['type_id'] == 0) {
                        $type = "Miễn Phí";
                        $class = 'course__price--free';
                    } else {
                        $class = 'course__price--old';
                        $type = number_format($key['subject_price']);
                        $sale = number_format($key['subject_sale']) . 'đ';
                    }
                    echo "
                <div class='course-item'>
                    <div class='course-poster'>
                        <a href='mo-ta-mon-hoc?mon=" . $key['subject_slug'] . "'><img src='./public/img/" . $key['subject_img'] . "' class=' img-fluid'></img></a>
                    </div>
                    <div class='course-text'>
                        <h3 class='course__title' style='font-size: 15px;'>" . $key['subject_name'] . "</h3>
                        <span class='course__members'>
                            <i class='fas fa-users'></i>
                            123
                        </span>
                        <span class='course__price course__price--cost'>" . $sale . "</span>
                        <span class='course__price " . $class . "'>" . $type . "</span>
                    </div>
                </div>";
                }
            } elseif ($select_id == 1) {
                $dataSubject = modelSubject::where("type_id", "=", 0)->get();
                foreach ($dataSubject as $key) {

                    echo "
                <div class='course-item'>
                    <div class='course-poster'>
                        <a href='mo-ta-mon-hoc?mon=" . $key['subject_slug'] . "'><img src='./public/img/" . $key['subject_img'] . "' class=' img-fluid'></img></a>
                    </div>
                    <div class='course-text'>
                        <h3 class='course__title' style='font-size: 15px;'>" . $key['subject_name'] . "</h3>
                        <span class='course__members'>
                            <i class='fas fa-users'></i>
                            123
                        </span>
                        <span class='course__price--free'>Miễn phí</span>
                    </div>
                </div>";
                }
            } elseif ($select_id == 2) {

                $dataSubject = modelSubject::where("type_id", "=", 1)->get();
                foreach ($dataSubject as $key) {
                    $type = '';
                    $sale = '';
                    $class = '';


                    $class = 'course__price--old';
                    $type = number_format($key['subject_price']);
                    $sale = number_format($key['subject_sale']) . 'đ';


                    echo "
                    <div class='course-item'>
                    <div class='course-poster'>
                        <a href='mo-ta-mon-hoc?mon=" . $key['subject_slug'] . "'><img src='./public/img/" . $key['subject_img'] . "' class=' img-fluid'></img></a>
                    </div>
                    <div class='course-text'>
                        <h3 class='course__title' style='font-size: 15px;'>" . $key['subject_name'] . "</h3>
                        <span class='course__members'>
                            <i class='fas fa-users'></i>
                            123
                        </span>
                        <span class='course__price course__price--cost'>" . $sale . "</span>
                        <span class='course__price " . $class . "'>" . $type . "</span>
                    </div>
                </div>";
                }
            } else {
                $_SESSION['error'] = "Lỗi";
                die();
            }
        }
    }
}