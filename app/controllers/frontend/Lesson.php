<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelLesson;
use App\Models\modelSubject;

class Lesson extends baseController
{
    function index()
    {
        $dataLesson = modelLesson::where("subject_id", "=", 8)->get();
        // $this->dd($dataLesson);
        $this->render("customer.lesson", [
            'dataLesson' => $dataLesson,
        ]);
    }
}
