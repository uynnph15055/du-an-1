<?php

namespace App\Models;

use App\config\DB;

class modelAssess extends DB
{

    protected $table = "assess";

    // Thêm banner vào db
    public static function insertBanner($data)
    {
        $model = new static;
        $conn = $model->getConnect();
        $queryBuilder = "INSERT INTO assess (assess_content, assess_star, subject_id, student_id) VALUES (:assess_content, :assess_star, :subject_id, :student_id)";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute($data);
    }
}
