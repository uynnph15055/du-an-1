<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelAdministrators;
use App\Models\modelBill;
use App\Models\modelCateSubject;
use App\Models\modelStudent;
use App\Models\modelSubject;

class adminMain extends baseController
{
    public function index()
    {
        if (!isset($_SESSION['admin_info'])) {
            header('Location: dang-nhap-dang-ky');
        };

        $dataStudent = modelStudent::all();
        $dataAdmin = modelAdministrators::all();
        $dataBill = modelBill::all();
        $dataSubject = modelSubject::all();

        $countStu = count($dataStudent);
        $countAdm = count($dataAdmin);
        $countBill = count($dataBill);
        $countSubject = count($dataSubject);

        $data =  modelCateSubject::Statistical();
        $this->render("admin.adminMain.main", [
            'student' => $countStu,
            'admin' => $countAdm,
            'bill' => $countBill,
            'subject' => $countSubject,
            'data' => $data,
        ]);
    }
}
