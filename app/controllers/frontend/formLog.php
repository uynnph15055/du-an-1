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

    // Check email Ajax 
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


    // Check email Ajax Đăng nhập

    public function checkEmailSignIn()
    {
        $email = $_POST['email_val_in'];
        $dataStudent = modelStudent::where('student_email', "=", $email)->get();
        if (empty($dataStudent)) {
            echo "Email này không tồn tại !!!";
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

                modelStudent::insertStudent($data);
                header('Location: dang-nhap-dang-ky');
            } else {
                die();
            }
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (!empty($student_email) || !empty($student_password)) {
                extract($_POST);

                $dataStudent = modelStudent::where('student_email', "=", $student_email)->get();
                if (!empty($dataStudent)) {
                    if (password_verify($student_password, $dataStudent[0]['student_password'])) {
                        $_SESSION['user_info'] = $dataStudent;
                        header('Location: ./');
                    } else {
                        $_SESSION['error-form'] = "Kiểm tra lại mật khẩu !!!";
                    }
                } else {
                    $_SESSION['error-form'] = "Email không tồn tại !!!";
                }
            }
        }
    }

    public function logOut()
    {
        if ($_SESSION['user_info']) {
            unset($_SESSION['user_info']);
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}
