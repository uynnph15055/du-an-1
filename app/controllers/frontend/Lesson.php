<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelComment;
use App\Models\modelLesson;
use App\Models\modelSubject;
use App\Models\modelMenu;
use App\Models\modelNote;

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
        $lesson_slug = isset($_GET['bai']) ? $_GET['bai'] : null;
        // $this->dd($lesson_slug);
        //  Lấy ra tất cả các bài học.
        $subject = modelSubject::where("subject_slug", "=", $subject_slug)->get();
        $subject_id = $subject[0]['subject_id'];
        $subjectName = $subject[0]['subject_name'];

        // Data mon -> Hiền thị xuống file leaning 
        $dataLesson = modelLesson::where('subject_id', "=", $subject_id)->get();
        // $this->dd
        $lessonFist = [];
        if ($lesson_slug == null) {
            $lessonFist = $dataLesson[0];
        } else {
            $lessonDta = modelLesson::where("lesson_slug", "=", $lesson_slug)->get();
            $lessonFist = $lessonDta[0];
            // Lưu id cho xuống phần bình luận.
            $_SESSION['lesson_id'] = $lessonFist['lesson_id'];
            // $this->dd($_SESSION['lesson_id']);
        }


        if (empty($dataLesson)) {
            header('location: ' . $_SERVER['HTTP_REFERER']);
            die();
        }


        // Lấy id của lesson 
        $lesson_id = $lessonFist['lesson_id'];
        // $this->dd($lesson_id);
        $dataComment = modelComment::getAll($lesson_id);
        $dataNote = modelNote::getAll($lesson_id);
        // die();
        // $this->dd($dataNote);

        $this->render("customer.learning", [
            'dataLesson' => $dataLesson,
            'subjectName' => $subjectName,
            'subject_slug' => $subject_slug,
            'lessonFist' => $lessonFist,
            'userInfo' => $dataInfo[0],
            'menu' => $this->menu,
            'dataComment' => $dataComment,
            'dataNote' => $dataNote,
        ]);
    }


    // Chuyển bài học tiếp theo.

    function deleteComment()
    {
        if (!isset($_SESSION['user_info'])) {
            header("location: dang-nhap-dang-ky");
            die();
        } else {
            $dataInfo = $_SESSION['user_info'];
        }
        $cmtt_id = isset($_GET['cmtt_id']) ? $_GET['cmtt_id'] : null;
        // $this->dd($cmtt_id);
        if (isset($_SESSION['lesson_id'])) {
            $lesson_id = $_SESSION['lesson_id'];
            unset($_SESSION['lesson_id']);
        }

        modelComment::delete('cmtt_id', "=", $cmtt_id)->executeQuery();
        $dataComment = modelComment::getAll($lesson_id);
        foreach ($dataComment as $key) {
            $function = '';
            if ($dataInfo[0]['student_id'] == $key['student_id']) {
                $function = "<button class='item-ctrl-btn'><a class='delete_cmtt' data-id='" . $key['cmtt_id'] . "' href='><i class='fas fa-trash'></i></a></button>
                <button class='item-ctrl-btn'><a href='><i class='fas fa-pen'></i></a></button>";
            };
            echo " <div class='comment-item'>
            <div class='comment-img comment-img--acc '>
                <img width='50px' src='./public/img/" . $key['student_avatar'] . "' alt=' class='img-fluid'>
            </div>
            <div class='comment-text'>
                <span class='comment-item__name'>
                    " . $key['student_name'] . "
                </span>
                <span class='comment-item__date' style='margin-left: 30px;'>
                " . $key['date_cmtt'] . "
                </span>
                <p class='comment-item__content'>
                " . $key['comment_content'] . "
                </p>
            </div>
            <div class='action-ctrl'>
            " . $function . "
            </div>
        </div>";
        };
    }

    // Ghi chú bài học.
    public function note()
    {
        $student_id = isset($_GET['student_id']) ? $_GET['student_id'] : null;
        if (isset($_SESSION['lesson_id'])) {
            $lesson_id = $_SESSION['lesson_id'];
            unset($_SESSION['lesson_id']);
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (!empty($content_note) || trim($content_note)) {
                $data = [
                    'student_id' => $student_id,
                    'lesson_id' => $lesson_id,
                    'content_note' => $content_note,
                ];

                modelNote::insert($data);
                header('location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                $_SESSION['error'] = "Bạn đang bỏ trống comment !!!";
                header('location: ' . $_SERVER['HTTP_REFERER']);
                die();
            }
        }
    }

    public function deleteNote()
    {
        $note_id = isset($_GET['note_id']) ? $_GET['note_id'] : null;
        modelNote::delete("note_id", "=", $note_id)->executeQuery();
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }



    // Comment bài học.
    public function comment()
    {
        $student_id = isset($_GET['student_id']) ? $_GET['student_id'] : null;
        if (isset($_SESSION['lesson_id'])) {
            $lesson_id = $_SESSION['lesson_id'];
            unset($_SESSION['lesson_id']);
        }
        // $this->dd($lesson_id);

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (!empty($comment_content) || trim($comment_content)) {
                $date_cmtt = date('Y-m-d');

                $data = [
                    'student_id' => $student_id,
                    'lesson_id' => $lesson_id,
                    'comment_content' => $comment_content,
                    'date_cmtt' => $date_cmtt,
                ];

                // $this->dd($data);
                modelComment::insertAll($data);
                // unset($lesson_id);
                header('location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                $_SESSION['error'] = "Bạn đang bỏ trống comment !!!";
                header('location: ' . $_SERVER['HTTP_REFERER']);
                die();
            }
        }
    }
}
