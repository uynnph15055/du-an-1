<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelHistory;
use App\Models\modelMenu;

class proFile extends baseController
{
    private $menu;
    public function __construct()
    {
        $this->menu = modelMenu::sortMenu();
    }

    public function index()
    {
        if (isset($_SESSION['user_info'])) {
            $dataInfo = $_SESSION['user_info'];
        }

        $student_id = $dataInfo[0]['student_id'];

        $dataCourseLeaning = modelHistory::getWidthSubject($student_id);


        $this->render("customer.profile_user", [
            'menu' => $this->menu,
            'dataInfo' => $dataInfo,
            'dataCourseLeaning' => $dataCourseLeaning,
        ]);
    }
}
