<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelLesson;
use App\Models\modelSubject;

class adminLesson extends baseController
{
    function index()
    {

        $subject_slug = $_GET['mon'];
        $dataSubject =  modelSubject::where("subject_slug", "=", $subject_slug)->get();
        $subject_id = $dataSubject[0]['subject_id'];
     

        $dataLesson = modelLesson::selectLesson($subject_id);
    
        $this->render("admin.adminLesson.listLesson", [
            'subject_id'=> $subject_id,
            'dataLesson' => $dataLesson,
        
        ]);
    }
    function insertLesson()
    {
        $this->render("admin.adminLesson.formLesson", ['dataLesson' => 'hihi']);
    }
    function addLesson()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (!empty($lesson_name) && !empty($lesson_status)  && !empty($lesson_introduce)  && !empty($lesson_link) && !empty($subject_id)) {
                $file = $_FILES['lesson_img'];

                if ($file['size'] > 0) {
                    $file_name = $file['name'];
                    move_uploaded_file($file['tmp_name'], './public/img/' . $file_name);
                } else {
                    $_SESSION['error'] = "Bạn chưa chọn ảnh !!!";
                    header("Location: ./them-bai-hoc?id=$subject_id");
                    die();
                }
                $file2 = $_FILES['lesson_img2'];
                if ($file2['size'] > 0) {
                    $file_name2 = $file2['name'];
                    move_uploaded_file($file2['tmp_name'], './public/img/' . $file_name2);
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
                    'lesson_status' => $lesson_status,
                    'date_post' => $date_post,
                    'lesson_img' => $file_name,
                    'lesson_img2' => $file_name2,
                    'subject_id' => $subject_id,
                    'lesson_introduce' => $lesson_introduce,
                ];

                // $this->dd($data);

                modelLesson::insertLesson($data);
                $dataLesson = modelLesson::selectLesson( $subject_id);
                // $this->dd($dataLesson);
           
                $this->render("admin.adminLesson.listLesson", ['dataLesson' => $dataLesson]);
            } else {
                $_SESSION['error'] = "Bạn đang bỏ trống dữ liệu !!!";
                header("Location: ./them-bai-hoc?id=$subject_id");
                die();
            }
        }
    }
    function deleteLesson()
    {
        $id = isset($_GET['id'])  ? $_GET['id'] : null;
        $subject_id=isset($_GET['subject_id'])  ? $_GET['subject_id'] : null;
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
            $subject_slug=$dataLesson[0]['subject_slug'];;
            modelLesson::delete("lesson_id", "=", $id)->executeQuery();
   
            header("Location:./chi-tiet-mon-hoc?mon=$subject_slug");
        }
    }
}
