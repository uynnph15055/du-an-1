<?php

namespace App\Models;

use App\config\DB;
use Symfony\Component\Console\Helper\Dumper;

class modelAdministrators extends DB
{
    protected $table = "admin";
    public static function insertAdministrators($data)
    {
        $model = new static;
        $conn = $model->getConnect();
        $queryBuilder = "INSERT INTO $model->table (name,img,email,password,phone,address,gender)	  VALUES (:name,:img,:email,:password,:phone,:address,:gender)";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute($data);
    }
    public static function selectAdministrators($index)
    {
        $model = new static();
        $connect = $model->getConnect();
        $queryBuilder =  "SELECT * FROM  admin ORDER BY id DESC LIMIT $index ,4";
        $statement = $connect->prepare($queryBuilder);
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function updateAdministrators($data)
    {
        $model = new static();
        $conn = $model->getConnect();
        $queryBuilder = "UPDATE  $model->table SET name=:name,img=:img,phone=:phone , address=:address , gender=:gender WHERE id=:id";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute($data);
    }

    public static function updatePassword($data)
    {
        $model = new static();
        $conn = $model->getConnect();
        $queryBuilder = "UPDATE  $model->table SET password=:password WHERE id=:id";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute($data);
    }
}
