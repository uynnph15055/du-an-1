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
}
