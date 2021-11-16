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
        $queryBuilder = "INSERT INTO menu (menu_name , menu_slug , menu_index) VALUES (:menu_name , :menu_slug,:menu_index)";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute($data);
    }


    public static function  updateMenu($data)
    {
        $model = new static();
        $conn = $model->getConnect();
        $queryBuilder = "UPDATE menu SET menu_name = :menu_name , menu_slug=:menu_slug , menu_index=:menu_index WHERE menu_id = :menu_id";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute($data);
    }

    // Xếp sắp menu
    public static function sortMenu()
    {
        $model = new static();
        $conn = $model->getConnect();
        $queryBuilder = "SELECT * FROM menu ORDER BY menu.menu_index ASC";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function updateIndex($index)
    {
        $model = new static();
        $conn = $model->getConnect();
        $queryBuilder = "UPDATE menu SET menu_index = $index";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute();
    }
}
