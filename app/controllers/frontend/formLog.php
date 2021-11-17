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

        if (!filter_var($emailSignUp, FILTER_VALIDATE_EMAIL)) {
            echo "Email không đúng định dạng !!!";
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (!empty($student_name) || !empty($student_email) || !empty($student_password)) {

                // Check dữ liệu đầu vào.
                if (!filter_var($student_email, FILTER_VALIDATE_EMAIL)) {
                    die();
                }

                if (strlen($student_password) < 6 || strlen($student_password) > 15) {
                    die();
                }

                $dataStudent = modelStudent::where("student_email", "=", $student_email)->get();
                if (!empty($dataStudent)) {
                    die();
                }

                $file_name = '103160_man_512x512.png';

                // Mã hóa mật khẩu
                $passwordNew = password_hash($student_password, PASSWORD_DEFAULT);

                $data = [
                    'student_name' => $student_name,
                    'student_email' => $student_email,
                    'student_password' => $passwordNew,
                    'student_avatar' => $file_name,
                ];

                // $this->dd($data);

                modelStudent::insertStudent($data);
            } else {
                die();
            }
        }
    }
}
