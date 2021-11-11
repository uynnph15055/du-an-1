<?php

namespace App\Models;

use App\config\DB;

class modelQuestion extends DB
{
    protected $table = "question";

    // Câu truy vấn đẩy dữ liệu lên db
    public static function insert($data)
    {
        $model =  new static();
        $conn = $model->getConnect();
        $queryBuilder = "INSERT INTO question(question, question_img, answer, lesson_id, question_list, type_question) VALUES (:question, :question_img, :answer, :lesson_id, :question_list, :type_question)";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute($data);
    }
}
