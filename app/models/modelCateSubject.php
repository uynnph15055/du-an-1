<?php

namespace App\Models;

use App\config\DB;

class modelCateSubject extends DB
{
    protected $table = "cateSubject";

    // Hàm insert dữ liệu
    public static function insertCate($data)
    {
        $model = new static();
        $conn = $model->getConnect();
        $queryBuilder = "INSERT INTO $model->table (cate_name , cate_slug , date_create) VALUES (:cate_name , :cate_slug ,  :date_create)";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute($data);
    }

    // Hàm update danh mục.
    public static function updateCate($data)
    {
        $model = new static();
        $conn = $model->getConnect();
        $queryBuilder = "UPDATE  $model->table SET cate_name=:cate_name , cate_slug=:cate_slug ,  date_create=:date_create WHERE cate_id=:cate_id";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute($data);
    }

    // Hàm thống kế 
    public static function Statistical()
    {
        $model = new static();
        $conn = $model->getConnect();
        $queryBuilder = "SELECT catesubject .*, COUNT(subject.cate_id) AS 'number_cate' FROM subject INNER JOIN catesubject ON subject.cate_id = catesubject.cate_id GROUP BY subject.cate_id;";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
