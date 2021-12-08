<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelHistory;
use App\Models\modelLesson;
use App\Models\modelQuestion;
use App\Models\modelMenu;
use App\Models\modelQuestionStatus;


class Question extends baseController
{
    private $menu;
    private $student_id;


    public function __construct()
    {
        $this->menu = modelMenu::sortMenu();
        if (isset($_SESSION['user_info'])) {
            $dataInfo = $_SESSION['user_info'];
        } else {
            header('location: dang-nhap-dang-ky');
        }


        $this->student_id = isset($dataInfo) ? $dataInfo[0]['student_id'] : null;
    }

    function index()
    {
        $question_id = isset($_GET['question_id']) ? $_GET['question_id'] : null;
        $biendem_answer = isset($_GET['biendem']) ? $_GET['biendem'] : null;
        $biendem = 0;
        $biendem += $biendem_answer;
        $dataQuestion = modelQuestion::where('question_id', "=", $question_id)->get();
        $lesson_id = $dataQuestion[0]['lesson_id'];
        $answer = $dataQuestion[0]['answer'];
        $dataLessonJoinQuestion = modelLesson::LessonJoinQuestion($lesson_id);;
        $dataQuestionInLesson = modelQuestion::where('lesson_id', "=", $lesson_id)->get();
        $dataQuestionStatus = modelQuestionStatus::all();
        //  Lấy ra câu hỏi liên quan đến student và trạng thái.
        // $dataQuestionStatus = modelQuestion::innerJoin($lesson_id);
        // $this->dd($dataQuestionStatus);
        $answers = explode("/", $answer);
        $countAnswers = count($answers);
        // $this->dd($dataQuestionStatus);


        $this->render("customer.quiz", [
            'dataQuestionStatus' => $dataQuestionStatus,
            'dataQuestion' => $dataQuestion[0],
            'dataLessonJoinQuestion' => $dataLessonJoinQuestion[0],
            'menu' => $this->menu,
            'dataQuestionInLesson' => $dataQuestionInLesson,
            'countAnswers' => $countAnswers,
            'biendem' => $biendem_answer,
            'lesson_id' => $lesson_id,
            'subject_slug' => $dataLessonJoinQuestion[0]['subject_slug']
        ]);
    }

    public  function answerQuestion()
    {
        // $this->dd($_POST);
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            extract($_POST);

            if (!empty($anwer[0]) || !empty($anwer[1]) || !empty($anwer[2]) || !empty($anwer[3])) {
                $answers = [];
                isset($anwer[0]) ? $answers[0] = $anwer[0] : [];
                isset($anwer[1]) ? $answers[1] = $anwer[1] : [];
                isset($anwer[2]) ? $answers[2] = $anwer[2] : [];
                isset($anwer[3]) ? $answers[3] = $anwer[3] : [];

                $answer_check =  implode("/", array_values($answers));

                $id = $question_id;
                // $this->dd($id);
                $question = modelQuestion::where('question_id', "=", $id)->get();
                $answerQuestion = $question[0]['answer'];

                // ------------------
                $Question = modelQuestion::where('lesson_id', "=", $lesson_id)->get();
                $lessonId = modelLesson::where('lesson_id', "=", $lesson_id)->get();
                $subject_id = $lessonId[0]['subject_id'];
                // $this->dd($subject_id);

                if ($answer_check !== $answerQuestion) {

                    $_SESSION['error'] = 'Đáp án sai !!!';
                    header('location: ' . $_SERVER['HTTP_REFERER']);
                    die();
                } else {

                    $dataQuestion = modelQuestion::where('question_id', "=", $question_id)->get();
                    $lesson_id = $dataQuestion[0]['lesson_id'];
                    $questionLesson = modelQuestion::where('lesson_id', "=", $lesson_id)->get();
                    $CountQuestions = count($questionLesson);
                    $a = round(100 / $CountQuestions, 2);

                    $data = [
                        'student_id' =>  $this->student_id,
                        'question_id' => $question_id,
                        'question_status' => 1,
                        'question_point' => $a,
                    ];
                    // check câu trả lời đúng.
                    $dataStatusQuestion = modelQuestionStatus::where_and($question_id, $this->student_id);
                    // $this->dd($dataStatusQuestion);
                    $questionStatus = $dataStatusQuestion[0]['question_status'];
                    if ($questionStatus == 1) {
                        $_SESSION['success'] = 'Đáp án đúng !!!';
                        header('location: ' . $_SERVER['HTTP_REFERER']);
                        die();
                    }

                    modelQuestionStatus::insert($data);

                    // Nếu trả lời đúng hết câu hỏi trong bài học đó sẽ lưu vào lộ trình
                    // Lấy ra 1 chuỗi các câu trả lời của học viên hiện tại.
                    $questionStudent = modelQuestionStatus::getWhereStudent($this->student_id);
                    $checkHistory = modelHistory::checkStatus($this->student_id, $subject_id);
                    $sumLesson = $checkHistory[0]['sum_lesson'];

                    $stringQuestionStudent = [];
                    foreach ($questionStudent as $key) {
                        $stringQuestionStudent[] = $key['question_id'];
                    }

                    $stringStudent = implode("-", array_values($stringQuestionStudent));

                    $stringQuestionFist = [];
                    foreach ($questionLesson as $key) {
                        $stringQuestionFist[] = $key['question_id'];
                    }

                    $stringQuestion = implode("-", array_values($stringQuestionFist));

                    $pos = strpos($stringStudent, $stringQuestion);
                    if ($pos !== false) {

                        modelHistory::updateSumLesson($this->student_id, $subject_id, $sumLesson);

                        // Làm hết bài tập và chuyễn sang đánh giá
                        $AllLesson = modelLesson::where("subject_id", "=", $subject_id)->get();
                        // $this->dd($AllLesson);
                        $countLesson = count($AllLesson);

                        // -------------------
                        $lessonWhereStudent =  modelHistory::checkStatus($this->student_id, $subject_id);
                        $countLessonHistory = $lessonWhereStudent[0]['sum_lesson'];
                        // $this->dd($countLessonHistory);
                        if ($countLessonHistory == $countLesson) {
                            header("Location:  danh-gia?mon=$subject_id");
                            die();
                        }

                        // echo "Tín";
                        // die();
                        $_SESSION['success'] = 'Đáp án đúng !!!';
                        header('location: ' . $_SERVER['HTTP_REFERER']);
                        die();
                    }


                    $_SESSION['success'] = 'Đáp án đúng !!!';
                    header('location: ' . $_SERVER['HTTP_REFERER']);
                    die();





                    // -----------------------------------------------------------------------
                }
            } else {
                $_SESSION['error'] = 'Chưa chọn đáp án !!!';
                header('location: ' . $_SERVER['HTTP_REFERER']);
                die();
            }
        }
    }
}
