<?php

namespace App\Models;

use App\config\DB;

class modelQuestionStatus extends DB
{
    protected $table = "questionstatus";

    // Câu truy vấn đẩy dữ liệu lên db
    public static function insert($data)
    {
        // var_dump($data);
        // die();
        $model =  new static();
        $conn = $model->getConnect();
        $queryBuilder = "INSERT INTO questionstatus(question_id,student_id,question_status,question_point ) VALUES (:question_id,:student_id,:question_status,:question_point)";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute($data);
    }


    public  function where_id($id)
    {
        $conn = $this->getConnect();
        $queryBuilder = "SELECT * FROM `question` WHERE lesson_id=:id";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll();
    }
    public static  function where_and($question_id, $student_id)
    {
        // var_dump($data);
        // die();

        $model =  new static();
        $conn = $model->getConnect();
        $queryBuilder = "SELECT * FROM questionstatus WHERE question_id=:question_id AND student_id=:student_id";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute([
            'question_id' => $question_id,
            'student_id' => $student_id
        ]);
        return $stmt->fetchAll();
    }

    public static function getWhereStudent($student_id)
    {
        $model =  new static();
        $conn = $model->getConnect();
        $queryBuilder = "SELECT * FROM questionstatus WHERE student_id=:student_id";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute([
            'student_id' => $student_id
        ]);
        return $stmt->fetchAll();
    }
}
