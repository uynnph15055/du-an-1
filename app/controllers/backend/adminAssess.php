<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelAssess;

class adminAssess extends baseController
{

    public function index()
    {
        $dataAssess = modelAssess::all();
        // $this->dd($dataAssess);
        $this->render("admin.adminAssess.listAssess", [
            'dataAssess' => $dataAssess,
        ]);
    }

    public function editStatus()
    {
        $assess_id = $_GET['assess_id'];

        echo "<form method='POST' action='sua-trang-thai-danh-gia'>
        <input hidden value='" . $assess_id . "' name='assess_id' type='text'>
        <div class='mb-3'>
            <label for='exampleInputEmail1' class='form-label'>Trạng thái</label>
            <select class='form-select' name='assess_status' aria-label='Default select example'>
                <option value='0'>Ẩn đi</option>
                <option value='1'>Hiển thị</option>
            </select>
        </div>
        <button type='submit' class='btn btn-success'>Cập nhật</button>
         </form>";
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] ==  "POST") {
            extract($_POST);

            // $dataAssess = modelAssess::where("assess_status", "=", 1)->get();
            // $this->dd(count($dataAssess));
            // if (count($dataAssess) > 3 || count($dataAssess) == 3) {
            //     $_SESSION['error'] = "Số lượng hiển thị là 3 !";
            //     header('location: ' . $_SERVER['HTTP_REFERER']);
            //     die();
            // }

            $data = [
                'assess_id' => $assess_id,
                'assess_status' => $assess_status,
            ];

            modelAssess::updateStatus($data);
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function delete()
    {
        $assess_id = isset($_GET['assess_id']) ? $_GET['assess_id'] : null;
        modelAssess::delete("assess_id", "=", $assess_id)->executeQuery();
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }
}
