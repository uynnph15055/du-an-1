<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelCateSubject;
use App\Models\modelSubject;

class adminSubject extends baseController
{
    //  
    function index()
    {
        $dataSubject = modelSubject::joinCate();
        $this->render("admin.adminSubject.listSubject", [
            'dataSubject' => $dataSubject,
        ]);
    }

    // Chuyển đến trang sửa
    function editPage()
    {
        $this->render("admin.adminCourse.editCourse", []);
    }

    // Chuyển đến trang thêm môn học
    function addPage()
    {
        $cateSubject = modelCateSubject::all();
        $this->render("admin.adminSubject.formSubject", [
            'cateSubject' => $cateSubject,
        ]);
    }

    // Thêm môn học
    function addSubject()
    {
        // Kiếm tra request_method
        // $this->dd($_POST);
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (!empty($subject_name) || !empty($subject_slug) || !empty($subject_description)  || !empty($cate_id) || !empty($subject_id)) {
                $file = $_FILES['subject_img'];

                if ($file['size'] > 0) {
                    $file_name = $file['name'];
                    move_uploaded_file($file['tmp_name'], './public/img/' . $file_name);
                } else {
                    $_SESSION['error'] = "Bạn chưa chọn ảnh !!!";
                    header('Location: ./trang-them-mon-hoc');
                    die();
                }

                $date_post = date('Y-m-d');

                $data = [
                    'subject_name' => $subject_name,
                    'subject_slug' => $subject_slug,
                    'subject_description' => $subject_description,
                    'date_post' => $date_post,
                    'subject_img' => $file_name,
                    'subject_type' => $subject_type,
                    'subject_price' => $subject_price,
                    'subject_sale' => $subject_sale,
                    'cate_id' => $cate_id,
                ];

                // $this->dd($data);

                modelSubject::insertSubject($data);
                header('Location: ./danh-sach-mon');
            } else {
                $_SESSION['error'] = "Bạn đang bỏ trống dữ liệu !!!";
                header('Location: ./trang-them-mon-hoc');
                die();
            }
        }
    }

    // Xóa môn học
    function delete()
    {
        $id = isset($_GET['id'])  ? $_GET['id'] : null;
        echo $id;

        if (!$id) {
            header('Location: ./danh-sach-mon?mess=id hiện không tồn tại');
            die();
        }

        $models = modelSubject::where("subject_id", "=", $id)->get();
        if (empty($models)) {
            header('Location: ./danh-sach-mon?mess=id không tồn tại');
            die();
        } else {
            modelSubject::delete("subject_id", "=", $id)->executeQuery();
            header('Location: ./danh-sach-mon');
        }
    }

    // Sửa Môn học
    function editSubject()
    {
        $id = isset($_GET['id'])  ? $_GET['id'] : null;
        $dataSubject = modelSubject::all();
        $dataEditSubject = modelSubject::where("subject_id", "=", $id)->get();
        //  $this->dd($dataSubject);
        $this->render("admin.adminSubject.formSubject", [
            'dataSubject' => $dataSubject,
            'dataEditSubject' => $dataEditSubject,
            'editSubject' => 'editSubject',
        ]);
    }

    function updateSubject()
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

                $date_post = date('Y-m-d');

                $data = [
                    'subject_id' => $subject_id,
                    'subject_name' => $subject_name,
                    'subject_slug' => $subject_slug,
                    'subject_description' => $subject_description,
                    'date_post' => $date_post,
                    'subject_img' => $file_name,
                ];

                // $this->dd($data);

                modelSubject::updateSubject($data);
                header('Location: http://localhost/project_one/');
            } else {
                $_SESSION['error'] = "Bạn đang bỏ trống dữ liệu !!!";
                header('Location: ./');
                die();
            }
        }
    }
}
