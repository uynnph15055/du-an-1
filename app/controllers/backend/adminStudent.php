<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelStudent;

class adminStudent extends baseController
{

    public function index()
    {
        if (!isset($_SESSION['admin_info'])) {
            header('Location: dang-nhap-dang-ky');
        };
        $dataStudent = modelStudent::all();
        $this->render("admin.adminStudent.listStudent", [
            'dataStudent' => $dataStudent,
        ]);
    }

    public function deleteStudent()
    {
        $student_id = isset($_GET['student_id'])  ? $_GET['student_id'] : null;
        modelStudent::delete("student_id", "=", $student_id)->executeQuery();
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }
}
