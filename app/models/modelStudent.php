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
    //inster tài khoảng google

    public static function insertGoogle($data)
    {
        $model = new static();
        $conn = $model->getConnect();
        $queryBuilder = "INSERT INTO student(student_name, student_avatar, student_email) VALUES (:student_name, :student_avatar, :student_email)";
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

    public static function updateImg($data)
    {
        $model = new static();
        $connect = $model->getConnect();
        $queryBuilder =  "UPDATE student SET student_avatar = :student_img WHERE student_id = :student_id";
        $statement = $connect->prepare($queryBuilder);
        $statement->execute($data);
    }

    public static function updateInfo($data)
    {
        $model = new static();
        $connect = $model->getConnect();
        $queryBuilder =  "UPDATE student SET student_name = :student_name , student_phone =:student_phone , student_story=:student_story WHERE student_id = :student_id";
        $statement = $connect->prepare($queryBuilder);
        $statement->execute($data);
    }

    public static function updatePass($passNew, $student_id)
    {
        $model = new static();
        $connect = $model->getConnect();
        $queryBuilder =  "UPDATE student SET student_password = :passNew WHERE student_id = :student_id";
        $statement = $connect->prepare($queryBuilder);
        $statement->execute([
            'passNew' => $passNew,
            'student_id' => $student_id,
        ]);
    }
}
