<?php

namespace App\Models;

use App\config\DB;

class modelStudent extends DB
{
    protected $table = 'student';

    public static function insertStudent($data)
    {
        $model = new static();
        $conn = $model->getConnect();
        $queryBuilder = "INSERT INTO student(student_name, student_avatar, student_email, student_password) VALUES (:student_name, :student_avatar, :student_email, :student_password)";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute($data);
    }
    public static function selectStudent($index)
    {
        $model = new static();
        $connect = $model->getConnect();
        $queryBuilder =  "SELECT * FROM student ORDER BY student_id DESC LIMIT $index ,4";
        $statement = $connect->prepare($queryBuilder);
        $statement->execute();
        return $statement->fetchAll();
    }
    
}
