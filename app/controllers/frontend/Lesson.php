<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelLesson;
use App\Models\modelSubject;

class Lesson extends baseController
{
    function index()
    {
        $subject_slug = isset($_GET['mon']) ? $_GET['mon'] : null;

        //  Lấy ra tất cả các bài học.
        $subject = modelSubject::where("subject_slug", "=", $subject_slug)->get();
        $subject_id = $subject[0]['subject_id'];
        $subjectName = $subject[0]['subject_name'];
        $dataLesson = modelLesson::where("subject_id", "=", $subject_id)->get();

        $lessonFist = $dataLesson[0];
        // $this->dd($dataLesson);
        $this->render("customer.learning", [
            'dataLesson' => $dataLesson,
            'subjectName' => $subjectName,
            'lessonFist' => $lessonFist,
        ]);
    }

    function nextLesson()
    {
        $lesson_id = $_GET['lesson_id'];
        $lessonNext = modelLesson::where('lesson_id', "=", $lesson_id)->get();
        echo "<iframe width='98%' height='520' src='" . $lessonNext[0]['lesson_link'] . "' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen>
        </iframe>
        <h2 style='font-size: 18px;text-align:center'>" . $lessonNext[0]['lesson_name'] . "</h2>";
    }
}
