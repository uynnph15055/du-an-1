<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelQuestion;

class adminQuestion extends baseController
{

    function index()
    {
        $dataQuestion = modelQuestion::all();
        $this->render("admin.question.listQuestion", ['dataQuestion' => $dataQuestion]);
    }
}
