<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelLesson;
use App\Models\modelSubject;

class adminLesson extends baseController
{

    // Chuyến đến danh sách bài học theo môn học.
    function index()
    {

        $subject_slug = $_GET['mon'];
        $dataSubject =  modelSubject::where("subject_slug", "=", $subject_slug)->get();
        $subject_id = $dataSubject[0]['subject_id'];


        $dataLesson = modelLesson::selectLesson($subject_id);
        $number = count($dataLesson);

        $this->render("admin.adminLesson.listLesson", [
            'subject_id' => $subject_id,
            'dataLesson' => $dataLesson,
            'number' => $number,
        ]);
    }

    // Chuyển đến trang them bài học.
    function insertLesson()
    {
        $this->render("admin.adminLesson.formLesson", ['dataLesson' => 'hihi']);
    }

    // Thêm dữ liệu bài học
    function addLesson()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (!empty($lesson_name) && !empty($lesson_introduce)  && !empty($lesson_link) && !empty($subject_id)) {
                $file = $_FILES['lesson_img'];

                if ($file['size'] > 0) {
                    $file_name = $file['name'];
                    move_uploaded_file($file['tmp_name'], './public/img/' . $file_name);
                } else {
                    $_SESSION['error'] = "Bạn chưa chọn ảnh !!!";
                    header("Location: ./them-bai-hoc?id=$subject_id");
                    die();
                }

                if (strlen($lesson_introduce) > 250) {
                    $_SESSION['error'] = "Mô tả của bạn quá dài !!!";
                    header("Location: ./them-bai-hoc?id=$subject_id");
                    die();
                }

                $date_post = date('Y-m-d');

                $data = [
                    'lesson_name' => $lesson_name,
                    'lesson_slug' => $lesson_slug,
                    'date_post' => $date_post,
                    'lesson_img' => $file_name,
                    'lesson_link' => $lesson_link,
                    'subject_id' => $subject_id,
                    'lesson_introduce' => $lesson_introduce,
                ];

                // $this->dd($data);

                modelLesson::insertLesson($data);
                $_SESSION['success'] = "Thêm thành công !!!";
                $dataLesson = modelLesson::selectLesson($subject_id);
                // $this->dd($dataLesson);

                $this->render("admin.adminLesson.listLesson", ['dataLesson' => $dataLesson]);
            } else {
                $_SESSION['error'] = "Bạn đang bỏ trống dữ liệu !!!";
                header("Location: ./them-bai-hoc?id=$subject_id");
                die();
            }
        }
    }

    // Xóa bài học
    function deleteLesson()
    {
        $id = isset($_GET['id'])  ? $_GET['id'] : null;
        $subject_id = isset($_GET['subject_id'])  ? $_GET['subject_id'] : null;
        if (!$id) {
            header('Location: ./chi-tiet-mon-hoc?mess=id hiện không tồn tại');
            die();
        }

        $models =  modelLesson::where("lesson_id", "=", $id)->get();
        if (empty($models)) {
            header('Location: ./chi-tiet-mon-hoc?mess=id không tồn tại');
            die();
        } else {
            $dataLesson = modelLesson::selectLesson($subject_id);
            $subject_slug = $dataLesson[0]['subject_slug'];;
            modelLesson::delete("lesson_id", "=", $id)->executeQuery();
            $_SESSION['success'] = "Xóa thành công !!!";
            header("Location:./chi-tiet-mon-hoc?mon=$subject_slug");
        }
    }

    function editPage()
    {
        $lesson_id =  $_GET['id'];
        $rowLesson = modelLesson::where('lesson_id', "=", $lesson_id)->get();
        // $this->dd($rowLesson);
        $this->render("admin.adminLesson.formLesson", ['row' => $rowLesson[0]]);
    }

    function editLesson()
    {
        // $this->dd($_POST);
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (!empty($lesson_name) && !empty($lesson_introduce)  && !empty($lesson_link) && !empty($subject_id)) {
                $file = $_FILES['lesson_img'];

                if ($file['size'] > 0) {
                    $file_name = $file['name'];
                    move_uploaded_file($file['tmp_name'], './public/img/' . $file_name);
                } else {
                    $file_name = $lesson_img;
                }

                if (strlen($lesson_introduce) > 250) {
                    $_SESSION['error'] = "Mô tả của bạn quá dài !!!";
                    header("Location: ./them-bai-hoc?id=$subject_id");
                    die();
                }

                $date_post = date('Y-m-d');

                $data = [
                    'lesson_id' => $lesson_id,
                    'lesson_name' => $lesson_name,
                    'lesson_slug' => $lesson_slug,
                    'date_post' => $date_post,
                    'lesson_img' => $file_name,
                    'lesson_link' => $lesson_link,
                    'subject_id' => $subject_id,
                    'lesson_introduce' => $lesson_introduce,
                ];

                // $this->dd($data);

                modelLesson::updateLesson($data);
                $dataLesson = modelLesson::selectLesson($subject_id);
                // $this->dd($dataLesson);
                $_SESSION['success'] = "Cập Nhật thành công !!!";
                $this->render("admin.adminLesson.listLesson", ['dataLesson' => $dataLesson]);
            } else {
                $_SESSION['error'] = "Bạn đang bỏ trống dữ liệu !!!";
                header("Location: ./trang-sua-bai-hoc?id=$lesson_id?subject_id=$subject_id");
                die();
            }
        }
    }
}
