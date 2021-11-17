<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelStudent;

class formLog extends baseController
{
    public function index()
    {
        $this->render("customer.form_log", []);
    }

    public function checkEmailSignUp()
    {
        $emailSignUp = $_POST['email_val'];
        if (empty($emailSignUp)) {
            echo "Không được bỏ trống !!!";
        }

        $dataStudent = modelStudent::where("student_email", "=", $emailSignUp)->get();
        if (!empty($dataStudent)) {
            echo "Email đã tồn tại !!!";
        }
    }
}
