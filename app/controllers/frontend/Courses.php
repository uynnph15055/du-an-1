<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelCateSubject;
use App\Models\modelMenu;
use App\Models\modelSubject;

class Courses extends baseController
{
    function __construct()
    {
        // $menu = modelMenu::all();
        // $this->render("customer.layout.layout", [
        //     'menu' => $menu,
        // ]);
    }

    function index()
    {
        $subject = modelSubject::all();
        $cateSubject = modelCateSubject::all();
        $this->render("customer.courses", [
            'cateSubject' => $cateSubject,
            'subject' => $subject
        ]);
    }

    function listCourse()
    {
        $cate_id = $_GET['cate_id'];

        $course = [];
        if ($cate_id == null) {
            $course = modelSubject::all();
        } else {
            $course = modelSubject::where('cate_id', "=", $cate_id)->get();
            foreach ($course as $key) {
                echo "
            <div class='course-item'>
                <div class='course-poster'>
                <a href='bai-hoc?mon=" . $key['subject_slug'] . "'><img src='./public/img/" . $key['subject_img'] . "' class=' img-fluid'></img></a>
                </div>
                <div class='course-text'>
                    <h3 class='course__title' style='font-size: 15px;'>" . $key['subject_name'] . "</h3>
                    <span class='course__members'>
                        <i class='fas fa-users'></i>
                        123
                    </span>
                    <?php if(" . $key['type_id'] . " == 0){ ?>
                    <span class='course__price course__price--free'>Miễn phí</span>
                    <?php }else{ ?>
                    <span class='course__price course__price--cost'><?php echo number_format(" . $key['subject_price'] . " ?>đ</span>
                    <span class='course__price course__price--old'><?php echo number_format(" . $key['subject_sale'] . ") ?>đ</span>
                    <?php } ?>
                </div>
            </div>";
            }
        }
    }
}
