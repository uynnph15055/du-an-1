<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelCateSubject;

class adminCateSubject extends baseController
{

    function index()
    {
        $cateSubject = modelCateSubject::all();
        $this->render("admin.cateSubject.listCateSubject", ['dataCate' => $cateSubject]);
    }

    // Thêm danh mục
    function addCate()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (!empty($cate_name) || !trim($cate_name) || !empty($cate_slug) || !trim($cate_slug)) {

                $dataCate = modelCateSubject::all();

                // Kiểm tra xem danh mục vừa nhập có tồn tại trong hệ thống ko
                $key = array_search($cate_slug, array_column($dataCate, 'cate_slug'));
                // $this->dd($key);
                if ($key === 0 || $key > 0) {
                    $_SESSION['error'] = "Danh mục này đã tồn tại !!!";
                    header('Location: ./danh-sach-loai-mon-hoc');
                    die();
                }

                $date_create = date('Y-m-d');
                // $this->dd($date_create);
                $data = [
                    'cate_name' => $cate_name,
                    'cate_slug' => $cate_slug,
                    'date_create' => $date_create,
                ];
                modelCateSubject::insertCate($data);
                header('Location: ./danh-sach-loai-mon-hoc');
            } else {
                $_SESSION['error'] = "Bạn đang bỏ trống dữ liệu !!!";
                header('Location: ./danh-sach-loai-mon-hoc');
                die();
            }
        }
    }

    // Hàm xóa
    function delete()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if (!$id) {
            header('Location: ./mess=id hiện không tồn tại');
            die();
        }

        $models = modelCateSubject::where("cate_id", "=", $id)->get();
        if (empty($models)) {
            header('Location: ./danh-sach-loai-mon-hoc?mess=id không tồn tại');
            die();
        } else {
            modelCateSubject::delete("cate_id", "=", $id)->executeQuery();
            header('Location: ./danh-sach-loai-mon-hoc');
        }
    }

    //edit
    function edit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $model = modelCateSubject::where("cate_id", "=", $id)->get();
        $cateSubject = modelCateSubject::all();
        $this->render("admin.cateSubject.listCateSubject", [
            'modelCate' => $model,
            'dataCate' => $cateSubject,
            'editCate' => 'editCate'
        ]);
    }
    function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (empty($cate_name) || empty($cate_slug)) {
                $date_create = date('Y-m-d');
                // $this->dd($date_create);
                $_SESSION['error'] = "Bạn đang bỏ trống dữ liệu !!!";
                header('Location: ./danh-sach-loai-mon-hoc');
                die();
            } else {
                $data = [
                    'cate_id' => $cate_id,
                    'cate_name' => $cate_name,
                    'cate_slug' => $cate_slug,
                    'date_create' => $date_create,
                ];
                modelCateSubject::updateCate($data);
                header('Location: ./danh-sach-loai-mon-hoc');
            }
        }
    }
}
