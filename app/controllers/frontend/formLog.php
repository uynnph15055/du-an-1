<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelAdministrators;
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

        $dataStudent = modelStudent::where("student_email", "=", $emailSignUp)->get();
        if (!empty($dataStudent)) {
            echo "Email đã tồn tại !";
            die();
        }
        $dataAdmin = modelAdministrators::where("email", "=", $emailSignUp)->get();
        if (!empty($dataAdmin)) {
            echo "Email đã tồn tại !";
            die();
        }
    }


    // Check email Ajax Đăng nhập

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (!empty($student_name) || !empty($student_email) || !empty($student_password)) {

                // Check dữ liệu đầu vào.
                if (!filter_var($student_email, FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['error-form-register'] = "Email không đúng định dạng !!!";
                    header('Location: dang-nhap-dang-ky');
                    die();
                }

                if (strlen($student_password) < 6 || strlen($student_password) > 15) {
                    $_SESSION['error-form-register'] = "Độ dài mật khẩu sai !!!";
                    header('Location: dang-nhap-dang-ky');
                    die();
                }

                $dataStudent = modelStudent::where("student_email", "=", $student_email)->get();
                if (!empty($dataStudent)) {
                    $_SESSION['error-form-register'] = "Email đã tồn tại !!!";
                    header('Location: dang-nhap-dang-ky');
                    die();
                }

                $dataAdmin = modelAdministrators::where("email", "=", $emailSignUp)->get();
                if (!empty($dataAdmin)) {
                    $_SESSION['error-form-register'] = "Email đã tồn tại !!!";
                    header('Location: dang-nhap-dang-ky');
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
                $_SESSION['error-form-register'] = "Bạn đang bỏ trống dữ liệu !!!";
                header('Location: dang-nhap-dang-ky');
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
                        $_SESSION['error-form'] = "Kiểm tra lại thông tin !!!";
                        header('Location: dang-nhap-dang-ky');
                    }
                } else {
                    $_SESSION['error-form'] = "Kiểm tra lại thông tin !!!";
                    header('Location: dang-nhap-dang-ky');
                }

                $dataAdmin = modelAdministrators::where("email", "=", $student_email)->get();
                if (!empty($dataAdmin)) {
                    if (password_verify($student_password, $dataAdmin[0]['password'])) {
                        $_SESSION['admin_info'] = $dataAdmin;
                        header('Location: ./quan-tri');
                    } else {
                        $_SESSION['error-form'] = "Kiểm tra lại thông tin !!! !!!";
                    }
                } else {
                    $_SESSION['error-form'] = "Kiểm tra lại thông tin !!! !!!";
                }
            } else {
                $_SESSION['error-form'] = "Bạn đang bỏ trống dữ liệu !!!";
                header('Location: dang-nhap-dang-ky');
                die();
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
