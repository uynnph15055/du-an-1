<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelLesson;
use App\Models\modelMenu;
use App\Models\modelSubject;
use App\Models\modelBill;

class introCourse extends baseController
{
    private $menu;
    public function __construct()
    {
        $this->menu = modelMenu::sortMenu();
    }

    public function index()
    {
        $subject_slug = isset($_GET['mon']) ? $_GET['mon'] : null;
        $subject = modelSubject::where("subject_slug", "=", $subject_slug)->get();
        $subject_id = $subject[0]['subject_id'];
        $dataBill = modelBill::all();
        $lesson = modelLesson::where("subject_id", "=", $subject_id)->get();

        if (!isset($_SESSION['user_info'])) {
            $this->render("customer.courseDetail", [
                'subject' => $subject[0],
                'lesson' => $lesson,
                'menu' => $this->menu,
                'dataBill' => $dataBill,
            ]);
        } else {
            $this->render("customer.courseDetail", [
                'subject' => $subject[0],
                'lesson' => $lesson,
                'user' => $_SESSION['user_info'][0],
                'menu' => $this->menu,
                'dataBill' => $dataBill,
            ]);
        }

    }
}
