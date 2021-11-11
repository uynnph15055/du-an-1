<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelQuestion;

class adminQuestion extends baseController
{

    // Hàm hiển thị danh sách câu hỏi.
    function index()
    {
        $dataQuestion = modelQuestion::all();
        $this->render("admin.question.listQuestion", [
            'dataQuestion' => $dataQuestion,
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

            if (empty($question) && empty($question_list) && empty($type_question) && empty($answer) && empty($lesson_id)) {
                $_SESSION['error'] = "Bạn đang bỏ trống dữ liệu !!!";
                header("Location: ./trang-them-cau-hoi?lesson_id=$lesson_id");
                die();
            } else {

                $file = $_FILES['question_img'];
                if ($file['size'] > 0) {
                    $file_name = $file['name'];
                    move_uploaded_file($file['tmp_name'], './public/img/' . $file_name);
                } else {
                    $file_name = null;
                }

                $data = [
                    'question' => $question,
                    'question_list' => $question_list,
                    'type_question' => $type_question,
                    'answer' => $answer,
                    'lesson_id' => $lesson_id,
                    'question_img' => $file_name,
                ];

                modelQuestion::insert($data);
                // $this->dd($data);
            }
        }
    }
}
