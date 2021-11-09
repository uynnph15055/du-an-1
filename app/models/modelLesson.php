<?php

namespace App\Models;

use App\config\DB;

class modelLesson extends DB
{
    protected $table = "lesson";
    public static function insertLesson($data)
    {
        $model = new static();
        $connect = $model->getConnect();
        $queryBuilder =  "INSERT INTO lesson (lesson_name , lesson_slug ,date_post , lesson_img ,lesson_img2 ,subject_id ,lesson_introduce,lesson_status) VALUES (:lesson_name , :lesson_slug ,:date_post , :lesson_img ,:lesson_img2 ,:subject_id ,:lesson_introduce,:lesson_status)";
        $statement = $connect->prepare($queryBuilder);
        $statement->execute($data);
    }
    public static function selectLesson($id)
    {
        $model = new static();
        $connect = $model->getConnect();
        $queryBuilder =  "  SELECT * FROM lesson less  JOIN subject sub ON less.subject_id=sub.subject_id WHERE less.subject_id=:id";
        $statement = $connect->prepare($queryBuilder);
        $statement->execute(['id'=>$id]);
        return  $statement->fetchAll();
    }
  

}
