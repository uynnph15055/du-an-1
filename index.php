<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
$url = isset($_GET['url']) ? $_GET['url'] : "/";

require_once "./vendor/autoload.php";

use App\Controllers\Backend\adminSubject;

switch ($url) {
    case '/':
        $ctr = new adminSubject();
        echo $ctr->index();
        break;
    case 'them-mon-hoc':
        $ctr = new adminSubject();
        echo $ctr->addSubject();
        break;
    case 'xoa-khoa-hoc':
        $ctr = new adminSubject();
        echo $ctr->delete();
        break;

    default:
        "Không tồn tại file nào";
        break;
}
