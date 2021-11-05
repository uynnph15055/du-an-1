<?php

namespace App\Models;

use App\config\DB;

class modelSubject extends DB
{
    protected $table = 'subject';

    // Hàm insert môn học.
    public static function insertSubject($data)
    {
        $model = new static();
        $connect = $model->getConnect();
        $queryBuilder =  "INSERT INTO subject(subject_name , subject_slug , subject_description,date_post , subject_img) VALUES (:subject_name , :subject_slug , :subject_description , :date_post , :subject_img)";
        $statement = $connect->prepare($queryBuilder);
        $statement->execute($data);
    }
}
