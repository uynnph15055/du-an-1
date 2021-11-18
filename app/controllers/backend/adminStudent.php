<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelStudent;

class adminStudent extends baseController
{

    public function index()
    {
        $dataStudent = modelStudent::all();
        $this->render("admin.adminStudent.listStudent", [
            'dataStudent' => $dataStudent,
        ]);
    }
}
