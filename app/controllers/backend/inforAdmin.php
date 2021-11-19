<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;

class inforAdmin extends baseController
{

    public function index()
    {
        if (isset($_SESSION['admin_info'])) {
            $dataAdmin = $_SESSION['admin_info'];
        } else {
            header('Location: dang-nhap-dang-ky');
        }
        $this->render("admin.inforAdmin.profile_admin", [
            'admin' => $dataAdmin[0],
        ]);
    }

    public function logOut()
    {
        if (isset($_SESSION['admin_info'])) {
            unset($_SESSION['admin_info']);
            header('Location: ./dang-nhap-dang-ky');
        }
    }
}
