<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelComment;
use App\Models\modelLesson;
use App\Models\modelSubject;
use App\Models\modelMenu;

class Lesson extends baseController
{
    private $menu;
    public function __construct()
    {
        $this->menu = modelMenu::sortMenu();
    }

    function index()
    {
        if (!isset($_SESSION['user_info'])) {
            header("location: dang-nhap-dang-ky");
            die();
        } else {
            $dataInfo = $_SESSION['user_info'];
        }

        $subject_slug = isset($_GET['mon']) ? $_GET['mon'] : null;

        //  Lấy ra tất cả các bài học.
        $subject = modelSubject::where("subject_slug", "=", $subject_slug)->get();
        $subject_id = $subject[0]['subject_id'];
        $subjectName = $subject[0]['subject_name'];

        // Data mon -> Hiền thị xuống file leaning 
        $dataLesson = modelLesson::where('subject_id', "=", $subject_id)->get();

        $lessonFist = $dataLesson[0];

        if (empty($lessonFist)) {
            $_SESSION['error'] = "Hiện chưa có bài học nào !!!";
            header("location: mo-ta-mon-hoc?mon=$subject_slug");
            die();
        }

        // Lấy id của lesson 
        $lesson_id = $dataLesson[0]['lesson_id'];
        $dataComment = modelComment::getAll($lesson_id);
        // $this->dd($dataComment);
        $this->render("customer.learning", [
            'dataLesson' => $dataLesson,
            'subjectName' => $subjectName,
            'lessonFist' => $lessonFist,
            'userInfo' => $dataInfo[0],
            'menu' => $this->menu,
            'dataComment' => $dataComment,
        ]);
    }


    // Chuyển bài học tiếp theo.
    function nextLesson()
    {
        $lesson_id = $_GET['lesson_id'];

        // Lưu lại id bài học
        $_SESSION['lesson_id'] = $lesson_id;

        $lessonNext = modelLesson::where('lesson_id', "=", $lesson_id)->get();
        echo "<iframe width='98%' height='520' src='https://www.youtube.com/embed/" . $lessonNext[0]['lesson_link'] . "' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen>
        </iframe>
        <h2 style='font-size: 18px;text-align:center'>" . $lessonNext[0]['lesson_name'] . "</h2>";
    }

    function question()
    {
        $lesson_id = isset($_SESSION['lesson_id']) ? $_SESSION['lesson_id'] : null;
        echo $lesson_id;
    }

    public function comment()
    {
        $student_id = isset($_GET['student_id']) ? $_GET['student_id'] : null;
        $lesson_id = $_SESSION['lesson_id'];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (!empty($comment_content) || trim($comment_content)) {
                echo $comment_content;
            } else {
                $_SESSION['error'] = "Bạn đang bỏ trống comment !!!";
                header('location: ' . $_SERVER['HTTP_REFERER']);
                die();
            }
        }
    }
}
