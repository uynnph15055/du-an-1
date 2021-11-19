<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelBanner;

class Banner extends baseController
{
    function index()
    {
        if (!isset($_SESSION['admin_info'])) {
            header('Location: dang-nhap-dang-ky');
        };
        $dataBanner = modelBanner::all();
        // $this->dd($dataBanner);
        $this->render("admin.adminBanner.listBanner", ['dataBanner' => $dataBanner]);
    }

    // Thêm banner vào db
    function addBanner()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            // $this->dd($banner_title);
            if (!empty($banner_text) || !empty($banner_title)) {
                $file = $_FILES['banner_img'];

                if ($file['size'] > 0) {
                    $file_name = $file['name'];
                    move_uploaded_file($file['tmp_name'], './public/img/' . $file_name);
                } else {
                    $file_name = $banner_img;
                }


                if (strlen($banner_text) > 300) {
                    $_SESSION['error'] = "Text quá dài !!!";
                    header('Location: ./danh-sach-banner');
                    die();
                }
                $data = [

                    'banner_text' => $banner_text,
                    'banner_img' => $file_name,
                    'banner_title' => $banner_title,
                ];


                // $this->dd($data);
                $dataBanner =  modelBanner::all();
                $banner_id = $dataBanner[0]['banner_id'];

                modelBanner::delete('banner_id', "=", $banner_id)->executeQuery();

                modelBanner::insertBanner($data);

                header('Location: ./danh-sach-banner');
                $_SESSION['success'] = "Cập Nhật thành công !!!";
            } else {
                $_SESSION['error'] = "Bạn đang bỏ trống dữ liệu !!!";
                header('Location: ./danh-sach-banner');
                die();
            }
        }
    }
}
