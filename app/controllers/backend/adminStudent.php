<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelHistory;
use App\Models\modelStudent;

class adminStudent extends baseController
{

    public function index()
    {
        if (!isset($_SESSION['admin_info'])) {
            header('Location: dang-nhap-dang-ky');
        };
        $page = isset($_GET['trang']) ? $_GET['trang'] : 1;
        $dataStudents = modelStudent::all();

        $number = count($dataStudents);
        $pages = ceil($number / 4);
        $index = ($page - 1) * 4;
        $dataStudent = modelStudent::selectStudent($index);
        $this->render("admin.adminStudent.listStudent", [
            'dataStudent' => $dataStudent,
            'stt' => $index + 1,
            'number' => $number,
            'page' => $pages,
        ]);
    }

    public function deleteStudent()
    {
        $student_id = isset($_GET['student_id'])  ? $_GET['student_id'] : null;
        modelStudent::delete("student_id", "=", $student_id)->executeQuery();
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function studentDetail()
    {
        $student_id = isset($_GET['student_id'])  ? $_GET['student_id'] : null;
        $dataCourseLeaning = modelHistory::getWidthSubject($student_id);
        $infoStudent = modelStudent::where("student_id", "=", $student_id)->get();
        $this->render("admin.adminStudent.studentDetail", [
            'infoStudent' =>  $infoStudent[0],
            'dataCourseLeaning' =>  $dataCourseLeaning,
        ]);
    }
}
