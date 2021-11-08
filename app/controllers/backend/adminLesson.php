<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelLesson;
use App\Models\modelSubject;

class adminLesson extends baseController
{
    function index()
    {
        $subject_slug = $_GET['mon'];
        $dataSubject =  modelSubject::where("subject_slug", "=", $subject_slug)->get();
        $subject_id = $dataSubject[0]['subject_id'];
        // $this->dd($subject_id);

        $dataLesson = modelLesson::where("subject_id", "=", $subject_id)->get();
        // $this->dd($dataLesson);
        $this->render("admin.adminLesson.listLesson", ['dataLesson' => $dataLesson]);
    }
}
