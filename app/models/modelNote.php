<?php

namespace App\Models;

use App\config\DB;

class modelNote extends DB
{

    protected $table = 'note';

    public static function insert($data)
    {
        $model = new static();
        $conn = $model->getConnect();
        $queryBuilder = "INSERT INTO note (lesson_id, student_id, content_note) VALUES (:lesson_id, :student_id, :content_note)";
        $statement = $conn->prepare($queryBuilder);
        $statement->execute($data);
    }

    public static function getAll($id)
    {
        $model = new static();
        $conn = $model->getConnect();
        $queryBuilder = "SELECT * FROM note INNER JOIN lesson ON note.lesson_id = lesson.lesson_id INNER JOIN student ON note.student_id = student.student_id WHERE note.lesson_id = :id";
        $statement = $conn->prepare($queryBuilder);
        $statement->execute(['id' => $id]);
        return $statement->fetchAll();
    }

    public static function getNote($student_id)
    {
        $model = new static();
        $conn = $model->getConnect();
        $queryBuilder = "SELECT * FROM note INNER JOIN lesson ON note.lesson_id = lesson.lesson_id INNER JOIN student ON note.student_id = student.student_id WHERE note.student_id = :student_id GROUP BY note.note_id DESC LIMIT 4";
        $statement = $conn->prepare($queryBuilder);
        $statement->execute(['student_id' => $student_id]);
        return $statement->fetchAll();
    }
}
