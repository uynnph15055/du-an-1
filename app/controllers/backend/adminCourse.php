<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelCourse;

class adminCourse extends baseController
{
    function index()
    {
        $dataCourse = modelCourse::all();
        $this->render("admin.adminCourse.listCourse", ['dataCourse' => $dataCourse]);
    }
    function editPage()
    {
    $this->render("admin.adminCourse.editCourse", []);
    }

    function addCourse()
    {
        // Kiếm tra request_method
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

           
        }
        if(isset($_POST[''])){

        }
    }
}
