<?php

namespace App\Models;

use App\config\DB;

class modelQuestion extends DB
{
    protected $table = "question";

    // Câu truy vấn đẩy dữ liệu lên db
    public static function insert($data)
    {
        // var_dump($data);
        // die();
        $model =  new static();
        $conn = $model->getConnect();
        $queryBuilder = "INSERT INTO question(question, question_img, answer, lesson_id, answer_one, answer_two, answer_three, answer_four) VALUES (:question, :question_img, :answer, :lesson_id, :answer_one, :answer_two, :answer_three, :answer_four)";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute($data);
    }
    public  function where_id($id)
    {
        // var_dump($data);
        // die();

        $conn = $this->getConnect();
        $queryBuilder = "SELECT * FROM `question` WHERE lesson_id=:id";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll();
    }

    // Hàm join ba bảng student , question , questionStatus
    public static function innerJoin($lesson_id)
    {
        $model =  new static();
        $conn = $model->getConnect();
        $queryBuilder = "SELECT * FROM question INNER JOIN questionstatus ON question.question_id = questionstatus.question_id INNER JOIN student ON questionstatus.student_id = student.student_id WHERE question.lesson_id = :lesson_id";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute([
            'lesson_id' => $lesson_id,
        ]);
        return $stmt->fetchAll();
    }
}
