<?php

namespace App\Models;

use App\config\DB;

class modelHistory extends DB
{
    protected $table = 'history';

    public static function insert($data)
    {
        $model  = new static();
        $conn = $model->getConnect();
        $queryBuilder = "INSERT INTO history (student_id ,subject_id, date_start) VALUES (:student_id ,:subject_id, :date_start)";
        $statement = $conn->prepare($queryBuilder);
        $statement->execute($data);
    }

    public static function checkStatus($student_id, $subject_id)
    {
        $model =  new static();
        $conn = $model->getConnect();
        $queryBuilder = "SELECT * FROM history WHERE subject_id=:subject_id AND student_id=:student_id";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute([
            'subject_id' => $subject_id,
            'student_id' => $student_id
        ]);
        return $stmt->fetchAll();
    }

    public static function updateSumLesson($student_id, $subject_id, $sum_lesson)
    {
        $model  = new static();
        $conn = $model->getConnect();
        $queryBuilder = "UPDATE history SET sum_lesson = $sum_lesson +1 WHERE student_id = :student_id AND subject_id = :subject_id";
        $statement = $conn->prepare($queryBuilder);
        $statement->execute(
            [
                'subject_id' => $subject_id,
                'student_id' => $student_id
            ]
        );
    }
    public static function countStudent($subject_id)
    {
        $model  = new static();
        $conn = $model->getConnect();
        $queryBuilder = " SELECT * FROM history INNER JOIN subject ON history.subject_id = subject.subject_id WHERE history.subject_id=:subject_id AND history.sum_lesson >=1";
        $statement = $conn->prepare($queryBuilder);
        $statement->execute(
            [
                'subject_id' => $subject_id,
            ]
        );
        return $statement->fetchAll();
    }
   
    public static function getWidthSubject($student_id)
    {
        $model  = new static();
        $conn = $model->getConnect();
        $queryBuilder = "SELECT * FROM history INNER JOIN subject ON history.subject_id = subject.subject_id WHERE history.student_id = :student_id  AND history.sum_lesson > 0";
        $statement = $conn->prepare($queryBuilder);
        $statement->execute(
            [
                'student_id' => $student_id
            ]
        );
        return $statement->fetchAll();
    }
}
