<?php

namespace App\Models;

use App\config\DB;

class modelSubject extends DB
{
    protected $table = 'subject';

    // Hàm insert môn học.
    public static function insertSubject($data)
    {
        $model = new static();
        $connect = $model->getConnect();
        $queryBuilder =  "INSERT INTO subject(subject_name , subject_slug , subject_description,date_post , subject_img , cate_id , type_id , subject_price , subject_sale) VALUES (:subject_name , :subject_slug , :subject_description , :date_post , :subject_img , :cate_id , :subject_type , :subject_price , :subject_sale)";
        $statement = $connect->prepare($queryBuilder);
        $statement->execute($data);
    }

    // HÀm Update môn học 
    public static function updateSubject($data)
    {
        $model = new static();
        $connect = $model->getConnect();
        $queryBuilder =  "UPDATE subject SET subject_name=:subject_name , subject_slug=:subject_slug , subject_description=:subject_description,date_post=:date_post, subject_img=:subject_img , cate_id=:cate_id , type_id =:subject_type , subject_price=:subject_price , subject_sale=:subject_sale WHERE subject_id=:subject_id ";
        $statement = $connect->prepare($queryBuilder);
        $statement->execute($data);
    }

    // Join đễn bảng danh mục
    public static function joinCate($index)
    {
        $model = new static();
        $connect = $model->getConnect();
        $queryBuilder =  "SELECT * FROM `subject` INNER JOIN `cateSubject` ON subject.cate_id = cateSubject.cate_id ORDER BY  subject.subject_id DESC LIMIT $index , 3  ";
        $statement = $connect->prepare($queryBuilder);
        $statement->execute();
        return $statement->fetchAll();
    }

    public static function addNew()
    {
        $model = new static();
        $connect = $model->getConnect();
        $queryBuilder = "SELECT * FROM `subject` GROUP BY subject.subject_id DESC";
        $statement = $connect->prepare($queryBuilder);
        $statement->execute();
        return $statement->fetchAll();
    }
}
