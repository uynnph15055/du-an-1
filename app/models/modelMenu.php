<?php

namespace App\Models;

use App\config\DB;

class modelMenu extends DB
{
    protected $table = 'menu';

    // Câu truy vẫn chèn dữ liệu.
    public static function  insertMenu($data)
    {
        $model = new static();
        $conn = $model->getConnect();
        $queryBuilder = "INSERT INTO menu (menu_name , menu_slug) VALUES (:menu_name , :menu_slug)";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute($data);
    }


    public static function  updateMenu($data)
    {
        $model = new static();
        $conn = $model->getConnect();
        $queryBuilder = "UPDATE menu SET menu_name = :menu_name , menu_slug=:menu_slug WHERE menu_id = :menu_id";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute($data);
    }
}
