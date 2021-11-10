<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelQuestion;

class adminQuestion extends baseController
{

    // Hàm hiển thị danh sách câu hỏi.
    function index()
    {
        $dataQuestion = modelQuestion::all();
        $this->render("admin.question.listQuestion", ['dataQuestion' => $dataQuestion]);
    }

    // Chuyển đến trang thêm câu hỏi
    function addPage()
    {
        $this->render("admin.question.formQuestion", []);
    }

    function addQuestion()
    {
        $this->dd($_POST);
        
    }
}
