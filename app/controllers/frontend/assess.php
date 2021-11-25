<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelAssess;
use App\Models\modelMenu;

class assess extends baseController
{
    private $menu;
    private $student_id;


    public function __construct()
    {
        $this->menu = modelMenu::sortMenu();
        if (isset($_SESSION['user_info'])) {
            $dataInfo = $_SESSION['user_info'];
        }

        $this->student_id = $dataInfo[0]['student_id'];
    }

    public function index()
    {
        $subject_id = isset($_GET['mon']) ? $_GET['mon'] : null;
        // $this->dd($subject_id);
        $this->render("customer.assess", [
            'menu' => $this->menu,
            'subject_id' => $subject_id,
        ]);
    }

    public function addAssess()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (empty($star[0]) && empty($content_assess)) {
                $_SESSION['error'] = "Bạn phải điền đủ thông tin đánh giá !";
                header('location: ' . $_SERVER['HTTP_REFERER']);
                die();
            }

            // $this->dd($star);
            $countStar = 0;
            if ($star[0] == 5) {
                $countStar = 1;
            } elseif ($star[0]  == 4) {
                $countStar = 2;
            } elseif ($star[0]  == 3) {
                $countStar = 3;
            } elseif ($star[0]  == 2) {
                $countStar = 4;
            } elseif ($star[0] == 1) {
                $countStar = 5;
            } else {
                $_SESSION['error'] = "Bạn có thể đánh giá qua sao :))";
                header('location: ' . $_SERVER['HTTP_REFERER']);
                die();
            }

            if (empty($content_assess)) {
                $_SESSION['error'] = "Bạn chưa nhập nội dung cho đánh giá !";
                header('location: ' . $_SERVER['HTTP_REFERER']);
                die();
            }

            $data = [
                'subject_id' => $subject_id,
                'student_id' => $this->student_id,
                'assess_star' => $countStar,
                'assess_content' => $content_assess,
            ];

            modelAssess::insertBanner($data);
            header('Location: ./');
        }
    }
}
