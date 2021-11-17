<?php

namespace App\Models;

use App\config\DB;

class modelBanner extends DB
{
    protected $table = "banner";

    // Thêm banner vào db
    public static function insertBanner($data)
    {
        $model = new static;
        $conn = $model->getConnect();
        $queryBuilder = "INSERT INTO $model->table (banner_text,banner_img,banner_title) VALUES (:banner_text,:banner_img,:banner_title)";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute($data);
    }

    // Gọi ra tất cả banner.
    public static function getAll()
    {
        $model = new static();
        $queryBuilder = "SELECT * FROM $model->table WHERE 1  ORDER BY  banner_id DESC ";
        $conn = $model->getConnect();
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
