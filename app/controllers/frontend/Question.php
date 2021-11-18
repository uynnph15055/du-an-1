<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelLesson;
use App\Models\modelQuestion;
use App\Models\modelMenu;
use App\Models\modelSubject;

class Question extends baseController
{
    private $menu;
    public function __construct()
    {
        $this->menu = modelMenu::sortMenu();
    }
    function index()
    {
        $question_id = isset($_GET['question_id']) ? $_GET['question_id'] : null;
        $dataQuestion = modelQuestion::where('question_id', "=", $question_id)->get();
        //   $this->dd($dataQuestion);
        $answer = $dataQuestion[0]['answer'];
        $answers = explode("/", $answer);
        $countAnswers = count($answers);


        $this->render("customer.quiz", [
            'dataQuestion' => $dataQuestion[0],
            'menu' => $this->menu,
            'countAnswers' => $countAnswers,
        ]);
    }
    
    public  function answerQuestion()
    {
        // $this->dd($_POST);
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            extract($_POST);
//  $this->dd($_POST);
            if (!empty($anwer_one) || !empty($anwer_two) || !empty($anwer_three) || !empty($anwer_four)) {
                $answer = [];
                isset($anwer_one) ? $answer[0] = $anwer_one : [];
                isset($anwer_two) ? $answer[1] = $anwer_two : [];
                isset($anwer_three) ? $answer[2] = $anwer_three : [];
                isset($anwer_four) ? $answer[3] = $anwer_four : [];

                $answer_check =  implode("/", array_values($answer));
        
            $id=$question_id;
            // $this->dd($id);
                $question = modelQuestion::where('question_id', "=", $id)->get();
                $answerQuestion = $question[0]['answer'];
                // $this->dd($answerQuestion);
                if ($answer_check !== $answerQuestion) {
    
                    $_SESSION['error'] = 'Đáp án sai !!!';
                    header("location:quzi?question_id=$question_id");
                    die();
                } else {
           
                    $_SESSION['success'] = 'Đáp án đúng !!!';
                    header("location:quzi?question_id=$question_id");
                    die();
                }
             
            }
        }
    }
}
