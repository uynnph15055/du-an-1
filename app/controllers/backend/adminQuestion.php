<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelQuestion;

class adminQuestion extends baseController
{

    // Hàm hiển thị danh sách câu hỏi.
    function index()
    {
        $lesson_id = isset($_GET['lesson_id']) ? $_GET['lesson_id'] : null;
        $dataQuestion = modelQuestion::all();
        $this->render("admin.question.listQuestion", [
            'dataQuestion' => $dataQuestion,
            'lesson_id' => $lesson_id,
        ]);
    }

    // Chuyển đến trang thêm câu hỏi
    function addPage()
    {
        $lesson_id = isset($_GET['lesson_id']) ? $_GET['lesson_id'] : null;
        // $this->dd($lesson_id);
        $this->render("admin.question.formQuestion", [
            'lesson_id' => $lesson_id,
        ]);
    }

    function addQuestion()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            extract($_POST);
            if (!empty($answer_A) || !empty($answer_B) || !empty($answer_C) || !empty($answer_D)) {
                $answer=[];
               isset($answer_A)?$answer[0]=$answer_A:[];
               isset($answer_B)?$answer[1]=$answer_B:[];
               isset($answer_C)?$answer[2]=$answer_C:[];
               isset($answer_D)?$answer[3]=$answer_D:[];
        $answer_correct=  implode("/",array_values( $answer)) ;
          
            // echo  filter_var(trim($answer,'/'));
             
                if (empty($question)) {
                    $_SESSION['error'] = "Chưa Nhập Tiêu Đề!!!";
                    header("Location: ./trang-them-cau-hoi?lesson_id=$lesson_id");
                    die();
                }
                if (empty($answer_one) || empty($answer_two) || empty($answer_three) || empty($answer_four)) {
                    $_SESSION['error'] = "Thiếu Đáp Án!!!";
                    header("Location: ./trang-them-cau-hoi?lesson_id=$lesson_id");
                    die();
                }
                $file = $_FILES['question_img'];

                if ($file['size'] > 0) {
                 
                    $file_name = $file['name'];
                    move_uploaded_file($file['tmp_name'], './public/img/' . $file_name);
                } else {
                    $file_name = null;
                }

                $data = [
                    'question' => $question,
                    'answer_one' => $answer_one,
                    'answer_two' => $answer_two,
                    'answer_three' => $answer_three,
                    'answer_four' => $answer_four,
                    'answer' =>  $answer_correct,
                    'lesson_id' => $lesson_id,
                    'question_img' => $file_name,
                ];
             
                modelQuestion::insert($data);
                header("Location: ./danh-sach-cau-hoi?lesson_id=$lesson_id");
            } else {
                $_SESSION['error'] = "Chưa Nhập Đáp Án Đúng !!!";
                header("Location: ./trang-them-cau-hoi?lesson_id=$lesson_id");
                die();
            }
        }
    }
}
