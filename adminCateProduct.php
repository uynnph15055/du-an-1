<?php

class adminCateProduct extends Controller
{

    // Chuyển đến trang quản lý sản phẩm.
    function index()
    {
        $getModel = $this->getModel("modelCateProduct");
        $dataCateProduct = $getModel->getCateProduct();
        $dataCateSecond = $this->Hierarchical($dataCateProduct, 0);

        $this->viewAdmin("admin", $data = [
            'folder' => 'cateProduct',
            'from' => 'adminCateProduct',
            'dataCateProduct' => $dataCateProduct,
            'dataCateSecond' => $dataCateSecond,
        ]);
    }

    // Thực hiện chức năng thêm sản phẩm 
    function  add()
    {
        $url = "./../../adminCateProduct/";
        $getModel = $this->getModel("modelCateProduct");

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);


            if (empty($cate_name) || empty($cate_slug)) {
                $_SESSION['error'] = "Bạn đang bỏ trống dữ liệu";
                header('Location: ' . $url);
            } else {
                if (isset($_FILES['cate_img'])) {
                    $file = $_FILES['cate_img'];
                    $file_name = $file['name'];

                    move_uploaded_file($file['tmp_name'], './public/img/imgCatePr/' . $file_name);
                }

                if (empty($file_name)) {
                    $_SESSION['error'] = "Bạn chưa chọn ảnh";
                    header('Location: ' . $url);
                    die();
                }

                $this->checkString($cate_name, $name = 'tên danh mục', $url);

                $data = [
                    'cate_name' => $cate_name,
                    'cate_img' => $file_name,
                    'cate_slug' => $cate_slug,
                    'parent_id' => $parent_id,
                ];

                $getModel->InsertCateProduct($data);
                header('Location: ' . $url);
            }
        }
    }

    function delete($cate_id)
    {
        $getModel = $this->getModel("modelCateProduct");
        $getModel->deleteCateProduct($cate_id);
        header('Location: ./../../adminCateProduct/');
    }

    // Hàm chuẩn dòng sản phẩm đến form sửa danh mục
    function editPage($slug)
    {
        $getCate = $this->getModel('modelCateProduct');
        $dataRow =  $getCate->getCateProductSlug($slug);
        $dataCateProduct =  $getCate->getCateProduct();
        $dataCateSecond = $this->Hierarchical($dataCateProduct, 0);

        $this->viewAdmin('adminSecond', $data = [
            'from' => 'editCateProduct',
            'folder' => 'cateProduct',
            'dataRow' => $dataRow,
            'dataCateSecond' => $dataCateSecond,
        ]);
    }

    function edit(){

    }
}
