<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelAdministrators;

class Administrators extends baseController
{
    public function index()
    {
        $dataAdministrators = modelAdministrators::all();
        $this->render("admin.administrators.listAdministrators", ['dataAdministrators' => $dataAdministrators]);
    }
    public function AddAdministrators()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (!empty($name) || !empty($email)  || !empty($password)  || !empty($phone)) {
                $file = $_FILES['img'];

                if ($file['size'] > 0) {
                    $file_name = $file['name'];
                    move_uploaded_file($file['tmp_name'], './public/img/' . $file_name);
                } else {
                    $_SESSION['error'] = "Bạn chưa chọn ảnh !!!";
                    header('Location: ./danh-sach-admin');
                    die();
                }

                $dataAdministrators = modelAdministrators::all();
                foreach ($dataAdministrators as $key) {
                    if ($key['email'] === $email) {
                        $_SESSION['error'] = "Email Đã tồn tại !!!";
                        header('Location: ./danh-sach-admin');
                        die();
                    }
                }
                if (strlen($password) < 6) {
                    $_SESSION['error'] = "Mật Khẩu phải từ 6 số !!!";
                    header('Location: ./danh-sach-admin');
                    die();
                }
                if (!is_numeric($phone)) {
                    $_SESSION['error'] = "phone không phải là số !!!";
                    header('Location: ./danh-sach-admin');
                    die();
                }

                if (strlen($phone) > 11) {
                    $_SESSION['error'] = "Sdt không hợp lệ !!!";
                    header('Location: ./danh-sach-admin');
                    die();
                }



                $data = [
                    'name' => $name,
                    'email' => $email,
                    'img' => $file_name,
                    'phone' => $phone,
                    'password' => $password,
                ];

                // $this->dd($data);

                modelAdministrators::insertAdministrators($data);
                $_SESSION['success'] = "Thêm Thành Công !!!";
                header('Location: ./danh-sach-admin');
            } else {
                $_SESSION['error'] = "Bạn đang bỏ trống dữ liệu !!!";
                header('Location: ./danh-sach-admin');
                die();
            }
        }
    }

    public function deleteAdministrators()
    {
        $id = isset($_GET['id'])  ? $_GET['id'] : null;

        if (!$id) {
            header('Location: ./danh-sach-admin?mess=id hiện không tồn tại');
            die();
        }

        $models =  modelAdministrators::where("id", "=", $id)->get();
        if (empty($models)) {
            header('Location: ./danh-sach-admin?mess=id không tồn tại');
            die();
        } else {
            modelAdministrators::delete("id", "=", $id)->executeQuery();
            $_SESSION['success'] = "Xóa thành công !!!";
            header('Location: ./danh-sach-admin');
        }
    }
    public function updateAdministrators()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (!empty($name) || !empty($email) || !empty($password)  || !empty($phone)) {
                $file = $_FILES['img'];

                if ($file['size'] > 0) {
                    $file_name = $file['name'];
                    move_uploaded_file($file['tmp_name'], './public/img/' . $file_name);
                } else {
                    $_SESSION['error'] = "Bạn chưa chọn ảnh !!!";
                    header('Location: ./danh-sach-admin');
                    die();
                }

                if (strlen($password) < 6) {
                    $_SESSION['error'] = "Mật Khẩu phải từ 6 số !!!";
                    header('Location: ./danh-sach-admin');
                    die();
                }
                if (!is_numeric($phone)) {
                    $_SESSION['error'] = "phone không phải là số !!!";
                    header('Location: ./danh-sach-admin');
                    die();
                }

                if (strlen($phone) > 11) {
                    $_SESSION['error'] = "Sdt không hợp lệ !!!";
                    header('Location: ./danh-sach-admin');
                    die();
                }



                $data = [
                    'id' => $id,
                    'name' => $name,

                    'img' => $file_name,
                    'phone' => $phone,
                    'password' => $password,
                ];

                // $this->dd($data);

                modelAdministrators::updateAdministrators($data);
                $_SESSION['success'] = "Sửa Thành Công !!!";
                header('Location: ./danh-sach-admin');
            } else {
                $_SESSION['error'] = "Bạn đang bỏ trống dữ liệu !!!";
                header('Location: ./danh-sach-admin');
                die();
            }
        }
    }
}
