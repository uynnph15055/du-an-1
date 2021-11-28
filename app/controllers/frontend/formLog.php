<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelAdministrators;
use App\Models\modelStudent;
use Google_Service_Oauth2;
use Google_Client;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class formLog extends baseController
{

    public function index()
    {
        //Google Code

        //Insert your cient ID and secret 
        //You can get it from : https://console.developers.google.com/
        $client_id = '345138128272-fgfcio76grc3jich1ji13oglbt8tviiv.apps.googleusercontent.com';
        $client_secret = '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';
        $redirect_uri = 'http://localhost/project_one/dang-nhap-dang-ky';


        $client = new Google_Client();
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->addScope("email");
        $client->addScope("profile");

        /* * **********************************************
          When we create the service here, we pass the
          client to it. The client then queries the service
          for the required scopes, and uses that when
          generating the authentication URL later.
         * ********************************************** */
        $service = new Google_Service_Oauth2($client);

        /* * **********************************************
          If we have a code back from the OAuth 2.0 flow,
          we need to exchange that with the authenticate()
          function. We store the resultant access token
          bundle in the session, and redirect to ourself.
         */
        if (isset($_GET['code'])) {
            $client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();

            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
            exit;
        }
        /* * **********************************************
          If we have an access token, we can make
          requests, else we generate an authentication URL.
         * ********************************************** */
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $client->setAccessToken($_SESSION['access_token']);
        } else {
            $authUrl = $client->createAuthUrl();
        }
        if ($client->isAccessTokenExpired()) {
            $authUrl = $client->createAuthUrl();
            //            header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
        }

        if (!isset($authUrl)) {
            $googleUser = $service->userinfo->get(); //get user info 
            // $this->dd($googleUser);
            if (!empty($googleUser)) {
                $dataStudent = modelStudent::where("student_email", "=", $googleUser['email'])->get();
                if (!empty($dataStudent)) {

                    $_SESSION['user_info'] = $dataStudent;
                    header('Location: ./');
                    // header('location: ' . $_SERVER['HTTP_REFERER']);
                } else {
                    $dataEmailGoogle = [
                        'student_name' => $googleUser['givenName'],
                        'student_avatar' => $googleUser['picture'],
                        'student_email' => $googleUser['email'],
                    ];
                    // $this->dd($dataEmailGoogle);
                    modelStudent::insertGoogle($dataEmailGoogle);
                    $dataStudentNew = modelStudent::where("student_email", "=", $googleUser['email'])->get();
                    $_SESSION['user_info'] = $dataStudentNew;
                    header('Location: ./');
                }
                $dataAdmin = modelAdministrators::where("email", "=", $googleUser['email'])->get();
                if (!empty($dataAdmin)) {

                    $_SESSION['admin_info'] = $dataAdmin;
                    header('Location: ./quan-tri');
                } else {
                    $_SESSION['error-form'] = "Kiểm tra lại thông tin!";
                }
            }
        }
        //End Google Code
        $this->render("customer.form_log", ['authUrl' => $client->createAuthUrl()]);
    }
    // Check email Ajax 
    public function checkEmailSignUp()
    {

        $emailSignUp = $_POST['email_val'];

        $dataStudent = modelStudent::where("student_email", "=", $emailSignUp)->get();
        if (!empty($dataStudent)) {
            echo "Email đã tồn tại!";
            die();
        }
        $dataAdmin = modelAdministrators::where("email", "=", $emailSignUp)->get();
        if (!empty($dataAdmin)) {
            echo "Email đã tồn tại!";
            die();
        }
    }

    // đằn nhập bằng gg



    // Check email Ajax Đăng ký
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (!empty($student_name) || !empty($student_email) || !empty($student_password)) {

                // Check dữ liệu đầu vào.

                // phần này check không cần show FE
                if (!filter_var($student_email, FILTER_VALIDATE_EMAIL)) {

                    $_SESSION['error-form-register'] = "Email không đúng định dạng!";
                    header('Location: dang-nhap-dang-ky');
                    die();
                }

                // phần này check không cần show FE
                if (strlen(trim($student_password)) <= 4) {

                    $_SESSION['error-form-register'] = "Mật khẩu yếu";
                    header('Location: dang-nhap-dang-ky');
                    die();
                }

                $dataStudent = modelStudent::where("student_email", "=", $student_email)->get();
                if (!empty($dataStudent)) {

                    $_SESSION['error-form-register'] = "Email đã tồn tại!";

                    header('Location: dang-nhap-dang-ky');
                    die();
                }

                $dataAdmin = modelAdministrators::where("email", "=", $emailSignUp)->get();
                if (!empty($dataAdmin)) {

                    $_SESSION['error-form-register'] = "Email đã tồn tại!";

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
                    'student_avatar' => "./public/img/" . $file_name,
                ];

                modelStudent::insertStudent($data);
                header('Location: dang-nhap-dang-ky');
            }
        }
    }

    // Check Đăng nhập
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
                        // header('location: ' . $_SERVER['HTTP_REFERER']);
                    } else {
                        $_SESSION['error-form'] = "Kiểm tra lại thông tin!";
                        header('Location: dang-nhap-dang-ky');
                    }
                } else {
                    $_SESSION['error-form'] = "Kiểm tra lại thông tin!";
                    header('Location: dang-nhap-dang-ky');
                }

                $dataAdmin = modelAdministrators::where("email", "=", $student_email)->get();
                if (!empty($dataAdmin)) {
                    if (password_verify($student_password, $dataAdmin[0]['password'])) {
                        $_SESSION['admin_info'] = $dataAdmin;
                        header('Location: ./quan-tri');
                    } else {
                        $_SESSION['error-form'] = "Kiểm tra lại thông tin!";
                    }
                } else {
                    $_SESSION['error-form'] = "Kiểm tra lại thông tin!";
                }
            }
        }
    }

    public function logOut()
    {
        if ($_SESSION['user_info']) {
            unset($_SESSION['access_token']);
            unset($_SESSION['user_info']);
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    // Chuyển đến trang đổi mật khẩu.
    public function changPassPage()
    {
        $this->render("customer.form_change_pass", []);
    }

    public function changPass()
    {
        if (isset($_SESSION['user_info'])) {
            $dataInfo = $_SESSION['user_info'];
        };

        $student_id = $dataInfo[0]['student_id'];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (!empty($pass_old) || !empty($pass_new) || !empty($pass_confirm)) {

                $dataStudent = modelStudent::where("student_id", "=", $student_id)->get();
                $pass = $dataStudent[0]['student_password'];

                if (password_verify($pass_old, $pass)) {
                    if ($pass_new == $pass_confirm) {
                        modelStudent::updatePass($pass_new, $student_id);
                        $_SESSION['success'] = "Cập nhật thành công !!!";
                        header('Location: thong-tin-khach-hang');
                    }
                } else {
                    header('location: ' . $_SERVER['HTTP_REFERER']);
                }
            }
        }
    }

}
