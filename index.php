<?php

session_start();
$url = isset($_GET['url']) ? $_GET['url'] : "/";
require_once "./vendor/autoload.php";

use App\Controllers\Backend\adminCourse;

switch ($url) {
    case '/':
        $ctr = new adminCourse();
        echo $ctr->index();
        break;
    case 'addCourse':
        $ctr = new adminCourse();
        echo $ctr->addCourse();
        break;
    case 'sua-khoa-hoc':
        $ctr = new adminCourse();
        echo $ctr->editPage();
        break;

    default:
        "Không tồn tại file nào";
        break;
}
