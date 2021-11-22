<?php

namespace App\Models;

use App\config\DB;

class modelLesson extends DB
{
    protected $table = "lesson";
    protected $item_per_page = 4;
    // Truy vẫn thêm dữ liệu vào bảng.
    public static function insertLesson($data)
    {
        $model = new static();
        $connect = $model->getConnect();
        $queryBuilder =  "INSERT INTO lesson (lesson_name, lesson_img, lesson_link, date_post, lesson_slug,  subject_id, lesson_introduce) VALUES (:lesson_name, :lesson_img, :lesson_link, :date_post, :lesson_slug,:subject_id, :lesson_introduce)";
        $statement = $connect->prepare($queryBuilder);
        $statement->execute($data);
    }


    // Update dữ liệu vào bảng.
    public static function updateLesson($data)
    {
        // echo "<pre>";
        // var_dump($data);
        // echo "</pre>";
        // die();
        $model = new static();
        $connect = $model->getConnect();
        $queryBuilder =  "UPDATE lesson SET lesson_name = :lesson_name , lesson_img=:lesson_img , lesson_link=:lesson_link , date_post=:date_post , lesson_slug=:lesson_slug , subject_id =:subject_id ,lesson_introduce=:lesson_introduce WHERE lesson_id = :lesson_id";
        $statement = $connect->prepare($queryBuilder);
        $statement->execute($data);
    }

    // Lấy ra tất cả bài học theo môn học.
    public static function selectLesson($id)
    {
        $model = new static();
        $connect = $model->getConnect();
        $queryBuilder =  "  SELECT * FROM lesson less  JOIN subject sub ON less.subject_id=sub.subject_id WHERE less.subject_id=:id";
        $statement = $connect->prepare($queryBuilder);
        $statement->execute(['id' => $id]);
        return  $statement->fetchAll();
    }

    // phân trang theo môn học

    public static function pagSelectLesson($id,$index)
    {
        $model = new static();
        $connect = $model->getConnect();
        $queryBuilder =  " SELECT * FROM `lesson` INNER JOIN `subject` ON lesson.subject_id = subject.subject_id WHERE lesson.subject_id=:id LIMIT $index ,4";

        $statement = $connect->prepare($queryBuilder);
        $statement->execute(['id' => $id,
        ]);
        return  $statement->fetchAll();
    }

    public static function LessonJoinQuestion($id)
    {
        $model = new static();
        $connect = $model->getConnect();
        $queryBuilder =  "   SELECT * FROM lesson JOIN subject ON lesson.subject_id=subject.subject_id WHERE lesson_id=:id";
        $statement = $connect->prepare($queryBuilder);
        $statement->execute(['id' => $id]);
        return  $statement->fetchAll();
    }


    public static function joinQuestion($id)
    {
        $model = new static();
        $connect = $model->getConnect();
        $queryBuilder =  " SELECT * FROM lesson JOIN question ON lesson.lesson_id= question.lesson_id WHERE lesson.subject_id=:id";
        $statement = $connect->prepare($queryBuilder);
        $statement->execute(['id' => $id]);
        return  $statement->fetchAll();
    }
}
