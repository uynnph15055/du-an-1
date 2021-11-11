<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelMenu;

class adminMenu extends baseController
{

    // Danh sách menu.
    function index()
    {
        $dataMenu = modelMenu::all();
        $number = count($dataMenu);
        $this->render("admin.adminMenu.listMenu", [
            'dataMenu' => $dataMenu,
            'number' => $number
        ]);
    }

    function addMenu()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (!empty($menu_name) && !empty($menu_slug)) {

                $data = [
                    'menu_name' => $menu_name,
                    'menu_slug' => $menu_slug,
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
    function deleteMenu()
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

    function editPage()
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

    function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (!empty($menu_name) && !empty($menu_slug)) {

                $data = [
                    'menu_id' => $menu_id,
                    'menu_name' => $menu_name,
                    'menu_slug' => $menu_slug,
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
}
