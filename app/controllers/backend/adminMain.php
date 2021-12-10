<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelAdministrators;
use App\Models\modelBill;
use App\Models\modelCateSubject;
use App\Models\modelStudent;
use App\Models\modelSubject;

class adminMain extends baseController
{
    public function index()
    {
        if (!isset($_SESSION['admin_info'])) {
            header('Location: dang-nhap-dang-ky');
        };

        $dataStudent = modelStudent::all();
        $dataAdmin = modelAdministrators::all();
        $dataBill = modelBill::all();
        $dataSubject = modelSubject::all();

        $countStu = count($dataStudent);
        $countAdm = count($dataAdmin);
        $countBill = count($dataBill);
        $countSubject = count($dataSubject);

        $dateNow = date('Y-m-d');
        $dataTurnover = modelBill::selectBillYear($dateNow);
        // $this->dd($dataTurnover);

        $data =  modelCateSubject::Statistical();
        $this->render("admin.adminMain.main", [
            'student' => $countStu,
            'admin' => $countAdm,
            'bill' => $countBill,
            'subject' => $countSubject,
            'data' => $data,
            'dataBill' => $dataTurnover,
        ]);
    }

    public function moneySelect()
    {
        $filter = $_GET['filter_id'];
        $date = date('Y-m-d');
        if ($filter == 1) {
            $newdate = strtotime('-7 days', strtotime($date));
            $resultDate = date('Y-m-d', $newdate);
        } elseif ($filter == 2) {
            $newdate = strtotime('-30 days', strtotime($date));
            $resultDate = date('Y-m-d', $newdate);
        } else {
            $newdate = strtotime('-60 days', strtotime($date));
            $resultDate = date('Y-m-d', $newdate);
        }

        $dataBill = modelBill::selectBillDay($resultDate, $date);
        $index = 1;
        $total = 0;
        // foreach ($dataBill as $key) {
        //     $total += $key['monney'];
        // }
        foreach ($dataBill as $key) {
            $total += $key['monney'];
            echo "<tr>
            <td>" . $index++ . "</td>
            <td>" . $key['transfer_time'] . "</td>
            <td>" . $key['subject_name'] . "</td>
            <td>" . $key['monney'] . "</td>
            <td><a href='chi-tiet-hoa-don-admin?subject_id=" . $key['subject_id'] . "' class='btn btn-success'>Chi tiết</a></td>
        </tr>";
        }
        $total;
    }
}
