<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelSubject;

class adminSubject extends baseController
{
    //  
    function index()
    {
        $dataSubject = modelSubject::all();
        $this->render("admin.adminSubject.listSubject", ['dataSubject' => $dataSubject]);
    }

    // Chuyển đến trang sửa
    function editPage()
    {
        $this->render("admin.adminCourse.editCourse", []);
    }

    // Thêm môn học
    function addSubject()
    {
        // Kiếm tra request_method
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (!empty($subject_name) || !trim($subject_name) || !empty($subject_slug) || !empty($subject_description)  || !trim($subject_slug) || !trim($subject_description)) {

                $file = $_FILES['subject_img'];

                if ($file['size'] > 0) {
                    $file_name = $file['name'];
                    move_uploaded_file($file['tmp_name'], './public/img/' . $file_name);
                } else {
                    $_SESSION['error'] = "Bạn chưa chọn ảnh !!!";
                    header('Location: ./');
                    die();
                }

                $date_post = date('d-m-Y');
                $data = [
                    'subject_name' => $subject_name,
                    'subject_slug' => $subject_slug,
                    'subject_description' => $subject_description,
                    'date_post' => $date_post,
                    'subject_img' => $file_name,
                ];

                // $this->dd($data);

                modelSubject::insertSubject($data);
                header('Location: ./');
            } else {
                $_SESSION['error'] = "Bạn đang bỏ trống dữ liệu !!!";
                header('Location: ./');
                die();
            }
        }
    }

    // Xóa 
    function delete()
    {
        $id = isset($_GET['id'])  ? $_GET['id'] : null;
        if (!$id) {
            header('Location: ./mess=id hiện không tồn tại');
            die();
        }

        if (!empty($models)) {
            header('Location: ./mess=id không tồn tại');
            die();
        } else {
            modelSubject::delete("subject_id", "=", $id)->executeQuery();
            header('Location: ./');
        }
    }
}
