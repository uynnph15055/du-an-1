<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelAdministrators;
use App\Models\modelCateSubject;
use App\Models\modelStudent;

class adminMain extends baseController
{
    public function index()
    {
        if (!isset($_SESSION['admin_info'])) {
            header('Location: dang-nhap-dang-ky');
        };

        $dataStudent = modelStudent::all();
        $dataAdmin = modelAdministrators::all();

        $countStu = count($dataStudent);
        $countAdm = count($dataAdmin);

        $data =  modelCateSubject::Statistical();
        $this->render("admin.adminMain.main", [
            'student' => $countStu,
            'admin' => $countAdm,
            'data' => $data,
        ]);
    }
}
