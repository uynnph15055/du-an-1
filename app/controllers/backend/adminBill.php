<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelAssess;
use App\Models\modelBill;

class AdminBill extends baseController
{

    public function index()
    {
        $dataBill = modelBill::selectBillAllAdmin();
        $tong = 0;
        foreach ($dataBill as $key) {
            $tong += $key['tong_tien'];
        }
        $this->render("admin.adminBill.listBill", [
            'dataBill' => $dataBill,
            'sumAll' => $tong,
        ]);
    }


    public function deltalBill()
    {
        $subject_id = isset($_GET['subject_id']) ? $_GET['subject_id'] : null;
        $dataBill = modelBill::selectBillDetailAdmin($subject_id);
    //   $this->dd($dataBill);
        $this->render("admin.adminBill.listDeltailBill", [
            'dataBill' => $dataBill,

        ]);
    }
}
