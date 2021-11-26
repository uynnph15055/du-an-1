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

    // Hàm apdate trạng thái đánh giá
    public static function updateStatus($data)
    {
        $model = new static;
        $conn = $model->getConnect();
        $queryBuilder = "UPDATE assess SET assess_status = :assess_status WHERE assess_id = :assess_id";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute($data);
    }

    public static function getAssessStudent()
    {
        $model = new static;
        $conn = $model->getConnect();
        $queryBuilder = "SELECT * FROM assess INNER JOIN student ON assess.student_id = student.student_id WHERE  assess.assess_status = 1";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
