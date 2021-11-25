<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelComment;

class adminComment  extends baseController
{
    public function index()
    {
        $lesson_id = isset($_GET['lesson_id']) ? $_GET['lesson_id'] : null;
        $page = isset($_GET['trang']) ? $_GET['trang'] : 1;
        $dataComments = modelComment::getAll($lesson_id);
        $number =  count($dataComments);
        $pages = ceil($number / 4);
        $index = ($page - 1) * 4;
        $dataComment = modelComment::selecttAll($lesson_id, $index);
        $this->render(
            "admin.adminComment.listAdminComment",
            [
                'dataComment' => $dataComment,
                'stt' => $index + 1,
                'number' => $number,
                'page' => $pages,
            ]
        );
    }
    // xóa bình luận
    public function delete()
    {
        $lesson_id = isset($_GET['lesson_id']) ? $_GET['lesson_id'] : null;
        $cmtt_id = isset($_GET['cmtt_id']) ? $_GET['cmtt_id'] : null;
        if (!$lesson_id) {
            header('Location: ./danh-sach-binh-luan?mess=id hiện không tồn tại');
            die();
        }

        $models = modelComment::where("cmtt_id", "=", $cmtt_id)->get();

        if (empty($models)) {
            header('Location: ./danh-sach-binh-luan?mess=id không tồn tại');
            die();
        } else {
            modelComment::delete("cmtt_id", "=", $cmtt_id)->executeQuery();

            header("Location:danh-sach-binh-luan?lesson_id=$lesson_id");
        }
    }
    public function delete_where()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);
            foreach ($name as $value) {
                modelComment::delete("cmtt_id", "=", $value)->executeQuery();
            }
            $_SESSION['success'] = "Xóa thành công !!!";
            header("Location:danh-sach-binh-luan?lesson_id=$lesson_id");
        }
    }
}
