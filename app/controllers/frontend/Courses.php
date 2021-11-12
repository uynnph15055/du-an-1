<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelCateSubject;
use App\Models\modelSubject;

class Courses extends baseController
{
    function index()
    {
        $subject = modelSubject::all();
        $cateSubject = modelCateSubject::all();
        $this->render("customer.courses", [
            'cateSubject' => $cateSubject,
            'subject' => $subject
        ]);
    }
}
