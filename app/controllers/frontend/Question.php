<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelLesson;
use App\Models\modelQuestion;

class Question extends baseController
{
    function index()
    {
        $lesson_slug = isset($_GET['lesson_id']) ? $_GET['lesson_id'] : null;
        $rowLesson = modelLesson::where('lesson_slug', "=", $lesson_slug)->get();

        $lesson_id = $rowLesson[0]['lesson_id'];
        $dataQuestion = modelQuestion::where('lesson_id', "=", $lesson_id)->get();
        $questionFist = $dataQuestion[0];
        // $this->dd($questionFist);
        $questionList = $questionFist['question_list'];
        $this->dd($questionList);
        $this->render("customer.question", ['question' => $questionFist]);
    }
}
