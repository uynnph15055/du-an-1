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
        // $this->dd($dataBill);
        $tong = 0;
        foreach ($dataBill as $key) {
            $tong += $key['tong_tien'];
        }
        $this->render("admin.adminBill.listBill", [
            'dataBill' => $dataBill,
            'sumAll' => $tong,
        ]);
    }
}
