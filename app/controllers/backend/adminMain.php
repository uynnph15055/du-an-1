<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelCateSubject;

class adminMain extends baseController
{
    public function index()
    {
        $data =  modelCateSubject::Statistical();
        $this->render("admin.adminMain.main", [
            'data' => $data,
        ]);
    }
}
