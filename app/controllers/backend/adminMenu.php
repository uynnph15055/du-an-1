<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelMenu;

class adminMenu extends baseController
{

    // Danh sách menu.
    public function index()
    {
        if (!isset($_SESSION['admin_info'])) {
            header('Location: dang-nhap-dang-ky');
        };
        $dataMenu = modelMenu::all();
        $number = count($dataMenu);
        $this->render("admin.adminMenu.listMenu", [
            'dataMenu' => $dataMenu,
            'number' => $number
        ]);
    }

    public function addMenu()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            $menu = modelMenu::all();
            if (count($menu) == 4) {
                $_SESSION['error'] = "Đã quá số lượng cho phép !!!";
                header('Location: danh-sach-menu');
                die();
            }

            if (!empty($menu_name) && !empty($menu_slug) && !empty($index)) {
                if ($menu_name === "Trang chủ") {
                    $menu_slug = "./";
                }

                $dataMenu = modelMenu::where("menu_slug", "=", $menu_slug)->get();
                if (!empty($dataMenu)) {
                    $_SESSION['error'] = "Menu này đã tồn tại !!!";
                    header('Location: danh-sach-menu');
                    die();
                }

                $data = [
                    'menu_name' => $menu_name,
                    'menu_slug' => $menu_slug,
                    'menu_index' => $index,
                ];

                modelMenu::insertMenu($data);
                header('Location: danh-sach-menu');
            } else {
                $_SESSION['error'] = "Bạn đang bỏ trống dữ liệu !!!";
                header('Location: danh-sach-menu');
                die();
            }
        }
    }

    // Hàm xóa menu
    public function deleteMenu()
    {
        $id = isset($_GET['id'])  ? $_GET['id'] : null;

        if (!$id) {
            header('Location: ./danh-sach-menu?mess=id hiện không tồn tại');
            die();
        }

        $models = modelMenu::where("menu_id", "=", $id)->get();
        if (empty($models)) {
            header('Location: ./danh-sach-menu?mess=id không tồn tại');
            die();
        } else {

            modelMenu::delete("menu_id", "=", $id)->executeQuery();
            $_SESSION['success'] = "Xóa thành công !!!";
            header('Location: ./danh-sach-menu');
        }
    }

    public function editPage()
    {
        $id = isset($_GET['id'])  ? $_GET['id'] : null;

        if (!$id) {
            header('Location: ./danh-sach-menu?mess=id hiện không tồn tại');
            die();
        }

        $models = modelMenu::where("menu_id", "=", $id)->get();
        // $this->dd($models);
        $dataMenu = modelMenu::all();
        if (empty($models)) {
            header('Location: ./danh-sach-menu?mess=id không tồn tại');
            die();
        } else {
            $this->render("admin.adminMenu.listMenu",  ['row' => $models[0], 'dataMenu' => $dataMenu]);
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (!empty($menu_name) && !empty($menu_slug) && !empty($index)) {

                $data = [
                    'menu_id' => $menu_id,
                    'menu_name' => $menu_name,
                    'menu_slug' => $menu_slug,
                    'menu_index' => $index,
                ];

                modelMenu::updateMenu($data);
                header('Location: danh-sach-menu');
            } else {
                $_SESSION['error'] = "Bạn đang bỏ trống dữ liệu !!!";
                header('Location: danh-sach-menu');
                die();
            }
        }
    }

    public function updateIndexs()
    {
        if ($_SERVER['REQUEST_METHOD'] ==  "POST") {
            extract($_POST);

            foreach ($menu_index as $key => $value) {
                if ($value > 4 || $value < 0) {
                    $_SESSION['error'] = "Chỉ mục của bạn quá hạn !!!";
                    header('Location: danh-sach-menu');
                    die();
                } elseif ($value == '') {
                    $_SESSION['error'] = "Chỉ mục đang bỏ trống !!!";
                    header('Location: danh-sach-menu');
                    die();
                } else {
                    modelMenu::updateIndex($value);
                    $_SESSION['success'] = "Cập nhật thành công !!!";
                    header('Location: danh-sach-menu');
                }
            }
        }
    }
}
