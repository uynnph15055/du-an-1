<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelLesson;
use App\Models\modelMenu;
use App\Models\modelSubject;

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
        $lesson = modelLesson::where("subject_id", "=", $subject_id)->get();
        $this->render("customer.courseDetail", [
            'subject' => $subject[0],
            'lesson' => $lesson,
            'menu' => $this->menu,
        ]);
    }
}
