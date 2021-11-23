<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelLesson;
use App\Models\modelSubject;
use App\Models\modelComment;
class adminLesson extends baseController
{

    // Chuyến đến danh sách bài học theo môn học.
    function index()
    {
        if (!isset($_SESSION['admin_info'])) {
            header('Location: dang-nhap-dang-ky');
        };

        $subject_slug = $_GET['mon'];
        $dataSubject =  modelSubject::where("subject_slug", "=", $subject_slug)->get();
        $subject_id = $dataSubject[0]['subject_id'];
        $page = isset($_GET['trang']) ? $_GET['trang'] : 1;
        $dataLessons = modelLesson::selectLesson($subject_id);
        $number = count($dataLessons);
        $pages = ceil($number / 4);
        $index = ($page - 1) * 4;
        $dataLesson = modelLesson::pagSelectLesson($subject_id, $index);
        $this->render("admin.adminLesson.listLesson", [
            'stt' => $index + 1,
            'subject_id' => $subject_id,
            'dataLesson' => $dataLesson,
            'number' => $number,
            'page' => $pages,
            'subject_slug' => $subject_slug,
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

            if (!empty($lesson_name) && !empty($lesson_link) && !empty($subject_id)) {
                $file = $_FILES['lesson_img'];

                $lesson_link_new = explode('?', filter_var(trim($lesson_link, '?')));

                $lesson_link_after = $lesson_link_new[0];


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
                    'lesson_link' => $lesson_link_after,
                    'subject_id' => $subject_id,
                    'lesson_introduce' => $lesson_introduce,
                ];

                // $this->dd($data);

                modelLesson::insertLesson($data);
                $_SESSION['success'] = "Thêm thành công !!!";
                $subjectRow = modelSubject::where('subject_id', "=", $subject_id)->get();

                $subject_slug = $subjectRow[0]['subject_slug'];

                header("Location:./chi-tiet-mon-hoc?mon=$subject_slug");
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

            if (!empty($lesson_name) && !empty($lesson_link) && !empty($subject_id)) {
                $file = $_FILES['lesson_img'];

                // Xử lý link video
                $lesson_link_new = explode('?', filter_var(trim($lesson_link, '?')));
                $lesson_link_after = trim(str_replace("v=", "", $lesson_link_new[1]));

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
                    'lesson_link' => $lesson_link_after,
                    'subject_id' => $subject_id,
                    'lesson_introduce' => $lesson_introduce,
                ];

                // $this->dd($data);

                modelLesson::updateLesson($data);
                $subject = modelSubject::where("subject_id", "=", $subject_id)->get();
                $subject_slug = $subject[0]['subject_slug'];
                $_SESSION['success'] = "Cập Nhật thành công !!!";
                header("Location:./chi-tiet-mon-hoc?mon=$subject_slug");
            } else {
                $_SESSION['error'] = "Bạn đang bỏ trống dữ liệu !!!";
                header("Location: ./trang-sua-bai-hoc?id=$lesson_id?subject_id=$subject_id");
                die();
            }
        }
    }
}
