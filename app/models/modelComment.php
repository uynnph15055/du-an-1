<?php

namespace App\Models;

use App\config\DB;

class modelComment extends DB
{
    protected $table = 'comment';

    public static function getAll($id)
    {
        $model = new static();
        $conn = $model->getConnect();
        $queryBuilder = "SELECT * FROM comment INNER JOIN lesson ON comment.lesson_id = lesson.lesson_id INNER JOIN student ON comment.student_id = student.student_id WHERE comment.lesson_id = :id GROUP BY comment.cmtt_id DESC";
        $statement = $conn->prepare($queryBuilder);
        $statement->execute(['id' => $id]);
        return $statement->fetchAll();
    }

    // dùng cho phân trang
    public static function selecttAll($id,$index)
    {
        $model = new static();
        $conn = $model->getConnect();
        $queryBuilder = "SELECT * FROM comment INNER JOIN lesson ON comment.lesson_id = lesson.lesson_id INNER JOIN student ON comment.student_id = student.student_id WHERE comment.lesson_id = :id GROUP BY comment.cmtt_id DESC LIMIT $index,4";
        $statement = $conn->prepare($queryBuilder);
        $statement->execute(['id' => $id]);
        return $statement->fetchAll();
    }

    public static function insertAll($data)
    {
        var_dump($data);
        // die();
        $model = new static();
        $conn = $model->getConnect();
        $queryBuilder = "INSERT INTO comment (lesson_id, student_id, comment_content, date_cmtt) VALUES (:lesson_id , :student_id , :comment_content , :date_cmtt)";
        $statement = $conn->prepare($queryBuilder);
        $statement->execute($data);
    }
}
