<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
$url = isset($_GET['url']) ? $_GET['url'] : "/";
require_once "./vendor/autoload.php";

use App\Controllers\Backend\adminCateSubject;
use App\Controllers\Backend\adminLesson;
use App\Controllers\Backend\adminQuestion;
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
    case 'sua-danh-muc';
        $ctr = new adminCateSubject();
        echo $ctr->edit();
        break;
    case 'update-danh-muc';
        $ctr = new adminCateSubject();
        echo $ctr->update();
        break;
        // Danh sách môn học.
    case 'chi-tiet-mon-hoc';
        $ctr = new adminLesson();
        echo $ctr->index();
        break;
        // Danh sách câu hỏi.
    case 'danh-sach-cau-hoi';
        $ctr = new adminQuestion;
        echo $ctr->index();
        break;
    case 'trang-them-cau-hoi';
        $ctr = new adminQuestion;
        echo $ctr->addPage();
        break;
    case 'them-cau-hoi';
        $ctr = new adminQuestion;
        echo $ctr->addQuestion();
        break;
        // Danh sách bài học
    case 'them-bai-hoc';
        $ctr = new adminLesson();
        echo $ctr->insertLesson();
        break;
    case 'trang-them-bai-hoc';
        $ctr = new adminLesson();
        echo $ctr->addLesson();
        break;
    case 'xoa-bai-hoc';
        $ctr = new adminLesson();
        echo $ctr->deleteLesson();
        break;
    case 'trang-sua-bai-hoc';
        $ctr = new adminLesson();
        echo $ctr->editPage();
        break;
    case 'sua-bai-hoc';
        $ctr = new adminLesson();
        echo $ctr->editLesson();
        break;

        // -----------------
    default:
        "Không tồn tại file nào";
        break;
}
