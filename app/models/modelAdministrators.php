<?php 
namespace App\Models;

use App\config\DB;
use Symfony\Component\Console\Helper\Dumper;

class modelAdministrators extends DB {
    protected $table = "admin";
    public static function insertAdministrators($data)
    {
        $model = new static;
        $conn = $model->getConnect();
        $queryBuilder = "INSERT INTO $model->table (name,img,email,password,phone)	  VALUES (:name,:img,:email,:password,:phone)";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute($data);
    }
    public static function updateAdministrators($data){
        $model=new static();
        $conn=$model->getConnect();
        $queryBuilder = "UPDATE  $model->table SET name=:name,img=:img,password=:password,phone=:phone WHERE id=:id";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute($data);
    }
}
?>