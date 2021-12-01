<?php

namespace App\Models;

use App\config\DB;

class modelBill extends DB
{
    protected $table = "bill";

    // Thêm Bill khóa học
    public static function insertBill($data)
    {
        $model = new static;
        $conn = $model->getConnect();
        $queryBuilder = "INSERT INTO $model->table (student_id,transfer_time,note_bill,code_vnpay,code_back,monney,subject_id)	 VALUES (:student_id,:transfer_time,:note_bill,:code_vnpay,:code_back,:monney,:subject_id)";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute($data);
    }
    public static function selectBill(){
        $model = new static;
        $conn = $model->getConnect();
        $queryBuilder = " SELECT * FROM bill INNER JOIN subject ON bill.subject_id=subject.subject_id WHERE bill.student_id=19 ORDER BY bill.bill_id DESC LIMIT 0,3";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    
    public static function selectBillAll(){
        $model = new static;
        $conn = $model->getConnect();
        $queryBuilder = " SELECT * FROM bill INNER JOIN subject ON bill.subject_id=subject.subject_id WHERE bill.student_id=19 ORDER BY bill.bill_id DESC ";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
