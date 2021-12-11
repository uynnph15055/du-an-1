<?php

namespace App\config;

use PDO;

class DB
{
    // Hàm kết nốt
    function getConnect()
    {
        $conn = new PDO("mysql:host=127.0.0.1;dbname=data_project_one;charset=utf8", 'root', '');
        return $conn;
        
    }

    // Hàm truy vẫn tất cả dữ liệu của bảng.
    public static function all()
    {
        $model = new static();
        $queryBuilder = "SELECT * FROM $model->table ";
        $conn = $model->getConnect();
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Hàm dùng truy vẫn dùng chung cho các câu có điều kiện where.
    public static function where($col, $sign, $val)
    {
        $model = new static();
        $model->queryBuilder = "SELECT * FROM $model->table WHERE $col $sign '$val'";
        return $model;
    }
    // Hàm dùng truy vẫn dùng chung cho các câu truy vẫn xóa có điều kiện where;
    public static function delete($col, $sign, $val)
    {
        $model = new static();
        $model->queryBuilder = "DELETE FROM $model->table WHERE $col $sign $val";
        return $model;
    }

    // Hàm dung chung để gọi tất cả dữ liệu VD: hàm where
    function get()
    {
        $conn = $this->getConnect();
        $stmt = $conn->prepare($this->queryBuilder);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Hàm dung chung để gọi tất cả dữ liệu VD: hàm where
    function executeQuery()
    {
        $conn = $this->getConnect();
        $stmt = $conn->prepare($this->queryBuilder);
        $stmt->execute();
    }
}
