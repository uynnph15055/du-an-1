<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelHistory;
use App\Models\modelMenu;
use App\Models\modelNote;
use App\Models\modelQuestionStatus;
use App\Models\modelStudent;
use App\Models\modelBill;

class proFile extends baseController
{
    private $menu;
    private $student_id;
    private $dataInfo;
    public function __construct()
    {
        $this->menu = modelMenu::sortMenu();
        if (isset($_SESSION['user_info'])) {
            $dataInfo = $_SESSION['user_info'];
        } else {
            header('location: dang-nhap-dang-ky');
        }

        $this->dataInfo = $dataInfo;
        $this->student_id = $dataInfo[0]['student_id'];
    }

    public function index()
{
        $dataCourseLeaning = modelHistory::getWidthSubject($this->student_id);
        $dataNote = modelNote::getNote($this->student_id);
        $countPoint = modelQuestionStatus::getWhereStudent($this->student_id);
        $dataBillJoinSubject = modelBill::selectBill($_SESSION['user_info'][0]['student_id']);
        // $this->dd($dataBillJoinSubject);
        $this->render("customer.profile_user", [
            'dataBillJoinSubject' => $dataBillJoinSubject,
            'menu' => $this->menu,
            'dataInfo' => $this->dataInfo,
            'dataCourseLeaning' => $dataCourseLeaning,
            'dataNote' => $dataNote,
            'countPoint' => $countPoint,
        ]);
    }

    //chi tiết tát cả các môn học đã mua.
    public function deltaiBill()
    {


        $dataBillJoinSubject = modelBill::selectBillAll($_SESSION['user_info'][0]['student_id']);

        // $this->dd($dataBillJoinSubject);
        $this->render("customer.deltai_bill", [
            'dataBillJoinSubject' => $dataBillJoinSubject,
            'menu' => $this->menu,
            'user' => $_SESSION['user_info'][0],

        ]);
    }

    public function updateImg()
    {
        $file = $_FILES['student_img_new'];
        if ($file['size'] > 0) {
            $file_name = $file['name'];
            move_uploaded_file($file['tmp_name'], './public/img/' . $file_name);

            $data = [
                'student_id' => $this->student_id,
                'student_img' => "./public/img/" . $file_name,
            ];

            // $this->dd($data);

            modelStudent::updateImg($data);

            $dataStudent = modelStudent::where("student_id", "=", $this->student_id)->get();
            $_SESSION['user_info'] = $dataStudent;
            header('location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            header('location: ' . $_SERVER['HTTP_REFERER']);
            die();
        }
    }

    // Cập nhật thông tin khách hàng 
    public function updateInfo()
    {
        if ($_SERVER['REQUEST_METHOD'] ==  "POST") {
            extract($_POST);

            if (!empty($student_name)) {
                $dataStudentOld = modelStudent::where("student_id", "=", $this->student_id)->get();

                // if (empty($student_phone)) {
                    // $student_phone = null;
                // }

                // if (empty($student_story)) {
                    // $student_story = null;
                // }


                $data = [
                    'student_name' => $student_name,
                    'student_phone' => $student_phone,
                    'student_story' => $student_story,
                    'student_id' => $this->student_id,
                ];

                // $this->dd($data);


                modelStudent::updateInfo($data);
                $dataStudent = modelStudent::where("student_id", "=", $this->student_id)->get();
                $_SESSION['user_info'] = $dataStudent;
                header('location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                $_SESSION['error'] = "Bạn đang bỏ trống tên tên !";
                header('location: ' . $_SERVER['HTTP_REFERER']);
                die();
            }
        }
    }
}
