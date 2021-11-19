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
        $queryBuilder = "SELECT * FROM comment INNER JOIN lesson ON comment.lesson_id = lesson.lesson_id INNER JOIN student ON comment.student_id = student.student_id WHERE comment.lesson_id = :id";
        $statement = $conn->prepare($queryBuilder);
        $statement->execute(['id' => $id]);
        return $statement->fetchAll();
    }
}
