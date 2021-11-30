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
        $queryBuilder = "INSERT INTO $model->table (student_id,transfer_time,note_bill,code_vnpay,code_back,monney)	 VALUES (:student_id,:transfer_time,:note_bill,:code_vnpay,:code_back,:monney)";
        $stmt = $conn->prepare($queryBuilder);
        $stmt->execute($data);
    }
}
