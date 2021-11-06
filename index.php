<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
$url = isset($_GET['url']) ? $_GET['url'] : "/";
require_once "./vendor/autoload.php";

use App\Controllers\Backend\adminCateSubject;
use App\Controllers\Backend\adminSubject;

switch ($url) {
    case 'danh-sach-mon':
        $ctr = new adminSubject();
        echo $ctr->index();
        break;
    case 'trang-them-mon-hoc':
        $ctr = new adminSubject();
        echo $ctr->addPage();
        break;
    case 'them-gia-mon':
        $ctr = new adminSubject();
        echo $ctr->formPrice();
        break;
    case 'them-mon-hoc':
        $ctr = new adminSubject();
        echo $ctr->addSubject();
        break;
    case 'xoa-khoa-hoc':
        $ctr = new adminSubject();
        $ctr->delete();
        break;
    case 'sua-khoa-hoc':
        $ctr = new adminSubject();
        echo $ctr->editSubject();
        break;
    case 'update-mon-hoc':
        $ctr = new adminSubject();
        $ctr->updateSubject();
        break;
        //  Danh mục khóa học.
    case 'danh-sach-loai-mon-hoc';
        $ctr = new adminCateSubject();
        echo $ctr->index();
        break;
    case 'them-danh-muc';
        $ctr = new adminCateSubject();
        echo $ctr->addCate();
        break;
    case 'xoa-danh-muc';
        $ctr = new adminCateSubject();
        echo $ctr->delete();
        break;

    default:
        "Không tồn tại file nào";
        break;
}
