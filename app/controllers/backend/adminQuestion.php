<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelQuestion;
use App\Models\modelSubject;

class adminQuestion extends baseController
{

    // Hàm hiển thị danh sách câu hỏi.
    public function index()
    {
        if (!isset($_SESSION['admin_info'])) {
            header('Location: dang-nhap-dang-ky');
        };
        $lesson_id = isset($_GET['lesson_id']) ? $_GET['lesson_id'] : null;
        if (!$lesson_id) {
            header('Location: ./?mess=id hiện không tồn tại');
            die();
        }
        $dataQuestion = modelQuestion::where("lesson_id", "=", $lesson_id)->get();
        $this->render("admin.question.listQuestion", [
            'dataQuestion' => $dataQuestion,
            'lesson_id' => $lesson_id,
        ]);
    }

    // Chuyển đến trang thêm câu hỏi
    public function addPage()
    {
        $lesson_id = isset($_GET['lesson_id']) ? $_GET['lesson_id'] : null;
        // $this->dd($lesson_id);
        $this->render("admin.question.formQuestion", [
            'lesson_id' => $lesson_id,
        ]);
    }

    public function addQuestion()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            extract($_POST);
            if (!empty($answer_A) || !empty($answer_B) || !empty($answer_C) || !empty($answer_D)) {
                $answer = [];
                isset($answer_A) ? $answer[0] = $answer_A : [];
                isset($answer_B) ? $answer[1] = $answer_B : [];
                isset($answer_C) ? $answer[2] = $answer_C : [];
                isset($answer_D) ? $answer[3] = $answer_D : [];
                // $this->dd($answer);
                $answer_correct =  implode("/", array_values($answer));

                // echo  filter_var(trim($answer,'/'));
                if (empty($question)) {
                    $_SESSION['error'] = "Chưa nhập tiêu đề!!!";
                    header("Location: ./trang-them-cau-hoi?lesson_id=$lesson_id");
                    die();
                }
                if (empty($answer_one) || empty($answer_two) || empty($answer_three) || empty($answer_four)) {
                    $_SESSION['error'] = "Thiếu đáp án!!!";
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
                $_SESSION['error'] = "Chưa điền đủ thông tin !!!";
                header("Location: ./trang-them-cau-hoi?lesson_id=$lesson_id");
                die();
            }
        }
    }

    public function deleteQuestion()
    {
        $question_id = isset($_GET['question_id']) ? $_GET['question_id'] : null;
        $lesson_id = isset($_GET['lesson_id']) ? $_GET['lesson_id'] : null;

        if (!$question_id) {
            header('Location: ./danh-sach-cau-hoi?mess=id hiện không tồn tại');
            die();
        }

        $models = modelQuestion::where("question_id", "=", $question_id)->get();
        if (empty($models)) {
            header('Location: ./danh-sach-cau-hoi?mess=id không tồn tại');
            die();
        } else {

            modelQuestion::delete("question_id", "=", $question_id)->executeQuery();
            $_SESSION['success'] = "Xóa thành công !!!";
            header("Location: ./danh-sach-cau-hoi?lesson_id=$lesson_id");
        }
    }

    public function testQuestion()
    {
        $question_id = $_GET['question_id'];
        $question = modelQuestion::where("question_id", "=", $question_id)->get();
        $row = $question[0];
        echo "" . $row['question'] . "
        
        <form action='test-run' method='POST' style='margin-top:30px;margin-left:10px'>
            <input type='text' hidden name='question_id' value='" . $row['question_id'] . "'>
            <div class='form-check'>
                <input class='form-check-input' value='1' name='answer_one' type='checkbox' id='flexCheckDefault'>
                <label class='form-check-label' for='flexCheckDefault'>
                 A. " . $row['answer_one'] . "
                </label>
            </div>
            <div class='form-check'>
                <input class='form-check-input' value='2' name='answer_two' type='checkbox' id='flexCheckChecked'>
                <label class='form-check-label' for='flexCheckChecked'>
                 B. " . $row['answer_two'] . "
                </label>
            </div>
            <div class='form-check'>
                <input class='form-check-input' value='3' name='answer_three' type='checkbox'  id='flexCheckChecked'>
                <label class='form-check-label' for='flexCheckChecked'>
                 C. " . $row['answer_three'] . "
                </label>
            </div>
            <div class='form-check'>
                <input class='form-check-input' value='4' name='answer_four' type='checkbox' id='flexCheckChecked'>
                <label class='form-check-label' for='flexCheckChecked'>
                D. " . $row['answer_four'] . "
                </label>
            </div>
            <button style='margin-top:20px;' class='btn btn-success' type='submit'>Test</button>
        </form>";
    }

    public  function test()
    {
        // $this->dd($_POST);
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            extract($_POST);

            if (!empty($answer_one) || !empty($answer_two) || !empty($answer_three) || !empty($answer_four)) {
                $answer = [];
                isset($answer_one) ? $answer[0] = $answer_one : [];
                isset($answer_two) ? $answer[1] = $answer_two : [];
                isset($answer_three) ? $answer[2] = $answer_three : [];
                isset($answer_four) ? $answer[3] = $answer_four : [];

                $answer_check =  implode("/", array_values($answer));

                $question = modelQuestion::where('question_id', "=", $question_id)->get();
                $answer = $question[0]['answer'];
                if ($answer_check != $answer) {
                    $_SESSION['error'] = 'Đáp án sai !!!';
                } else {
                    $_SESSION['success'] = 'Đáp án đúng !!!';
                }
                header('location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }
}
