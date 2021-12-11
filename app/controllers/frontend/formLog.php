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
        if (isset($_GET['sub'])) {
            $_SESSION['signUp'] = $_GET['sub'];
        }
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

                $dataAdmin = modelAdministrators::where("email", "=", $student_email)->get();
                if (!empty($dataAdmin)) {

                    $_SESSION['error-form-register'] = "Email đã tồn tại!";

                    header('Location: dang-nhap-dang-ky');
                    die();
                }

                $mail = new PHPMailer(true);
                // Passing `true` enables exceptions

                try {

                    // Email server settings
                    $mail->SMTPDebug = 0;
                    $mail->charSet = "UTF-8";
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';             //  smtp host
                    $mail->SMTPAuth = true;
                    $mail->Username = 'courseift123@gmail.com';   //  sender username
                    $mail->Password = 'uynguyen1234';       // sender password
                    $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
                    $mail->Port = 587;                    // port - 587/465

                    $mail->setFrom('courseift123@gmail.com', 'Course IFT');

                    $mail->addAddress($student_email);

                    $mail->isHTML(true);      // Set email content format to HTML

                    // Randum mật khẩu mới.
                    $numberStart = 100000;
                    $numberEnd = 999999;
                    $numberRanDum = rand($numberStart, $numberEnd);

                    $passNew = password_hash($student_password, PASSWORD_DEFAULT);

                    $data = [
                        'student_email' => $student_email,
                        'student_password' => $passNew,
                        'student_name' => $student_name,
                        'code_check' => $numberRanDum,
                    ];

                    $InforTemporary  = implode("-", array_values($data));

                    setcookie('data_check', $InforTemporary, time() + 3600);
                    $mail->CharSet = "UTF-8";
                    $mail->Subject = 'Mã xác nhận đăng nhập hệ thống học tập COURSE IFT !';
                    $mail->Body    = 'Mã xác nhận của bạn : ' . $numberRanDum;

                    // $mail->AltBody = plain text version of email body;
                    // die();
                    if (!$mail->send()) {
                        $this->dd($mail->ErrorInfo);
                    } else {
                        header('Location: xac-nhan');
                    }
                } catch (Exception $e) {
                    header('location: ' . $_SERVER['HTTP_REFERER']);
                    die();
                }
            } else {
                header('location: ' . $_SERVER['HTTP_REFERER']);
                die();
            }
        }
    }

    public function confirmAccount()
    {
        $code_check = $_POST['code_check'];
        // $this->dd($code_check);
        if (isset($_COOKIE['data_check'])) {
            $dataCookie = $_COOKIE['data_check'];
            // $this->dd($dataCookie);
            $dataCheck = explode('-', filter_var(trim($dataCookie, '/')));
        }
        // $this->dd($dataCheck);
        // unset($dataCheck[3]);
        // Lấy mã code.
        $codeCookie = end($dataCheck);
        // setcookie("code_check", "", time() - 3600);
        $file_name = '103160_man_512x512.png';
        // $this->dd($codeCookie);
        if ($code_check == $codeCookie) {
            unset($dataCheck[3]);
            // $this->dd($dataCheck);
            // $this->dd($dataCheck);
            $data = [
                'student_name' => $dataCheck[2],
                'student_email' => $dataCheck[0],
                'student_password' => $dataCheck[1],
                'student_avatar' => "./public/img/" . $file_name,
            ];

            modelStudent::insertStudent($data);
            $_SESSION['success'] = "Xác nhận thành công!!!";
            header('Location: xac-nhan');
        } else {
            $_SESSION['error'] = "Sai mã xác nhận !!!";
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function confirmAccountPage()
    {
        $this->render('customer.confirm_account', []);
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
                    header('Location: dang-nhap-dang-ky');
                    die();
                }

                $dataAdmin = modelAdministrators::where("email", "=", $student_email)->get();
                if (!empty($dataAdmin)) {
                    if (password_verify($student_password, $dataAdmin[0]['password'])) {
                        $_SESSION['admin_info'] = $dataAdmin;
                        header('Location: ./quan-tri');
                    }
                } else {
                    $_SESSION['error-form'] = "Kiểm tra lại thông tin!";
                    header('Location: dang-nhap-dang-ky');
                    die();
                }
            } else {
                header('location: ' . $_SERVER['HTTP_REFERER']);
                die();
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

    // Sửa mật khẩu
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
                        $passNew = password_hash($pass_new, PASSWORD_DEFAULT);
                        modelStudent::updatePass($passNew, $student_id);
                        $_SESSION['success'] = "Cập nhật thành công !!!";
                        header('Location: thong-tin-khach-hang');
                    }
                } else {
                    header('location: ' . $_SERVER['HTTP_REFERER']);
                }
            }
        }
    }

    public function sendEmail()
    {

        $email_check = $_POST['email_check'];

        if (empty($email_check)) {
            header('location: ' . $_SERVER['HTTP_REFERER']);
            die();
        } else {
            $dataStudent = modelStudent::where("student_email", "=", $email_check)->get();
            if (!empty($dataStudent)) {
                $student_id = $dataStudent[0]['student_id'];
                // $passInDb = $dataStudent[0]['student_password'];
                // if ($passInDb == '') {
                //     $_SESSION['notifi'] = "Email này không tích hợp quên mật khẩu !";
                //     header('location: ' . $_SERVER['HTTP_REFERER']);
                //     die();
                // }
            } else {
                $_SESSION['error'] = "Email hiện không tồn tại !!!";
                header('location: ' . $_SERVER['HTTP_REFERER']);
                die();
            }
        }

        $mail = new PHPMailer(true);
        // Passing `true` enables exceptions

        try {

            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'courseift123@gmail.com';   //  sender username
            $mail->Password = 'uynguyen1234';       // sender password
            $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
            $mail->Port = 587;                    // port - 587/465

            $mail->setFrom('courseift123@gmail.com', 'Course IFT');

            $mail->addAddress($email_check);

            $mail->isHTML(true);      // Set email content format to HTML

            // Randum mật khẩu mới.
            $numberStart = 100000;
            $numberEnd = 999999;
            $numberRanDum = rand($numberStart, $numberEnd);

            $passNew = password_hash($numberRanDum, PASSWORD_DEFAULT);
            modelStudent::updatePass($passNew, $student_id);

            $mail->CharSet = "UTF-8";
            $mail->Subject = 'Cập nhật mật khẩu mới cho tài khoản của bạn , nếu muốn thay đổi hay vào thông tin cá nhân và đổi mật khẩu !';
            $mail->Body    = 'Mật khẩu mới của bạn là : ' . $numberRanDum;

            // $mail->AltBody = plain text version of email body;

            if (!$mail->send()) {
                $this->dd($mail->ErrorInfo);
            } else {
                $_SESSION['notifi'] = "Bạn hãy vào email để nhận mật khẩu mới !";
                header('location: ' . $_SERVER['HTTP_REFERER']);
            }
        } catch (Exception $e) {
            $_SESSION['notifi'] = "Email của bạn không tồn tại";
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }


    // Chuyển đén trang xác nhận email
    public function forgetPassForm()
    {
        $this->render("customer.forgot_pass", []);
    }
}
