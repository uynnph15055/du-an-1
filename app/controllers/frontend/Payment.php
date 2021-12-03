<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelComment;
use App\Models\modelHistory;
use App\Models\modelLesson;
use App\Models\modelSubject;
use App\Models\modelMenu;
use App\Models\modelNote;
use App\Models\modelBill;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Payment extends baseController
{
    private $menu;
    public function __construct()
    {

        $this->menu = modelMenu::sortMenu();
        $vnp_TmnCode = "GZHAWSYM"; //Website ID in VNPAY System
        $vnp_HashSecret = "ULRCSWWUJTCLOYNXBWWHZWFFWYOZTEGL"; //Secret key
        $vnp_Url = " https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/project_one/vnpay_return";
        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
        //Config input format
        //Expire
        $startTime = date("YmdHis");
        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
    }

    function index()
    {

        $subject_slug = isset($_GET['mon']) ? $_GET['mon'] : null;
        $subject = modelSubject::where("subject_slug", "=", $subject_slug)->get();
        $subject_id = $subject[0]['subject_id'];
        $lesson = modelLesson::where("subject_id", "=", $subject_id)->get();
        $countLesson = count($lesson);

        if (!isset($_SESSION['user_info'])) {
            header('location:dang-nhap-dang-ky');
        }
        $this->render("customer.payment", [
            'subject' => $subject[0],
            'user' => $_SESSION['user_info'][0],
            'menu' => $this->menu,
            'countLesson' => $countLesson
        ]);
    }
    public function vnpay_create_payment()
    {
        // $subject_id=$_POST['subject_id'];
        $vnp_TmnCode = "GZHAWSYM"; //Website ID in VNPAY System
        $vnp_HashSecret = "ULRCSWWUJTCLOYNXBWWHZWFFWYOZTEGL"; //Secret key
        $vnp_Url = " https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/project_one/vnpay_return";
        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
        //Config input format
        //Expire
        $startTime = date("YmdHis");
        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

        $vnp_TxnRef = $_POST['order_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $_POST['order_desc'];
        $vnp_OrderType = $_POST['order_type'];
        $vnp_Amount = $_POST['amount'] * 100;
        $vnp_Locale = $_POST['language'];
        $vnp_BankCode = $_POST['bank_code'];
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
        $vnp_Bill_Email = $_POST['txt_billing_email'];
        $fullName = trim($_POST['txt_billing_fullname']);
        if (isset($fullName) && trim($fullName) != '') {
            $name = explode(' ', $fullName);
            $vnp_Bill_FirstName = array_shift($name);
            $vnp_Bill_LastName = array_pop($name);
        }
        $vnp_Bill_Address = $_POST['txt_inv_addr1'];
        $vnp_Bill_City = $_POST['txt_bill_city'];
        $vnp_Bill_Country = $_POST['txt_bill_country'];
        $vnp_Bill_State = $_POST['txt_bill_state'];
        // Invoice
        $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
        $vnp_Inv_Email = $_POST['txt_inv_email'];
        $vnp_Inv_Customer = $_POST['txt_inv_customer'];
        $vnp_Inv_Address = $_POST['txt_inv_addr1'];
        $vnp_Inv_Company = $_POST['txt_inv_company'];
        $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
        $vnp_Inv_Type = $_POST['cbo_inv_type'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $vnp_ExpireDate,
            "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
            "vnp_Bill_Email" => $vnp_Bill_Email,
            "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
            "vnp_Bill_LastName" => $vnp_Bill_LastName,
            "vnp_Bill_Address" => $vnp_Bill_Address,
            "vnp_Bill_City" => $vnp_Bill_City,
            "vnp_Bill_Country" => $vnp_Bill_Country,
            "vnp_Inv_Phone" => $vnp_Inv_Phone,
            "vnp_Inv_Email" => $vnp_Inv_Email,
            "vnp_Inv_Customer" => $vnp_Inv_Customer,
            "vnp_Inv_Address" => $vnp_Inv_Address,
            "vnp_Inv_Company" => $vnp_Inv_Company,
            "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
            "vnp_Inv_Type" => $vnp_Inv_Type,

        );
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;

        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {

            header("Location:$vnp_Url");
            die();
        } else {
            echo json_encode($returnData);
        }
    }
    public function vnpay_return()
    {
        $vnp_TmnCode = "GZHAWSYM"; //Website ID in VNPAY System
        $vnp_HashSecret = "ULRCSWWUJTCLOYNXBWWHZWFFWYOZTEGL"; //Secret key
        $vnp_Url = " https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/project_one/vnpay_return";
        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
        //Config input format
        //Expire
        $startTime = date("Y-m-d H:i:s");
        $expire = date('Y-m-d H:i:s', strtotime('+15 minutes', strtotime($startTime)));

        $price = $_GET['vnp_Amount'] / 100;

        $subject_id = trim(str_replace($_SESSION['user_info'][0]['student_id'], "", $_GET['vnp_TxnRef']));
        //   $this->dd($subject_id);
        $data = [
            'student_id' => $_SESSION['user_info'][0]['student_id'],
            'transfer_time' => date("Y-m-d H:i:s"),
            'note_bill' => $_GET['vnp_OrderInfo'],
            'code_vnpay' => $_GET['vnp_TxnRef'],
            'code_back' => $_GET['vnp_BankCode'],
            'subject_id' => $subject_id,
            'monney' =>  $price,
        ];

        $dataStubject = modelSubject::where("subject_id", "=", $subject_id)->get();
        $subject_name =  $dataStubject[0]['subject_name'];
        modelBill::insertBill($data);
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

            $email_check = $_SESSION['user_info'][0]['student_email'];
            $mail->addAddress($email_check);

            $mail->isHTML(true);      // Set email content format to HTML

            // Randum mật khẩu mới.

            $mail->CharSet = "UTF-8";
            $mail->Subject = 'Thông báo mua hàng !';
            $mail->Body    = 'Bạn đã mua thành công khóa học : ' . $subject_name;

            // $mail->AltBody = plain text version of email body;

            if (!$mail->send()) {
                $this->dd($mail->ErrorInfo);
            } else {
                $this->render("customer.vnpay_return", [

                    'user' => $_SESSION['user_info'][0],
                    'menu' => $this->menu,

                ]);
            }
        } catch (Exception $e) {
            $_SESSION['notifi'] = "Email của bạn không tồn tại";
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}
