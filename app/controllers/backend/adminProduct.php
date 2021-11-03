<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelCate;
use App\Models\modelProduct;

class adminProduct extends baseController
{
    // Hàm chạy đến trang đầy tiên khi khởi tạo class
    public function index()
    {
        $dbProduct = modelProduct::all();
        $this->render('admin.adminProduct.adminProduct', ['dataProduct' => $dbProduct]);
    }

    // Chuyến đến trang thêm san phẩm
    public function addProductPage()
    {
        $dataCate = modelCate::all();
        $this->render('admin.adminProduct.addProduct', ['dataCate' => $dataCate]);
    }

    // Thục thi thêm sản phẩm()
    public function addProduct()
    {
        $requestData = $_POST;
        // $this->dd($requestData);
        $model = new modelProduct();
        $model->fill($requestData);

        $file = $_FILES['product_img'];
        if ($file['size'] < 0) {
            $_SESSION['error'] = "Bạn chưa chọn ảnh !!!";
            header('Location: ./');
            die();
        } else {
            // Hàm uniqid là hàm sinh la mã thời gian là minis để ảnh ko trùng
            $file_name = uniqid() . '-' . $file['name'];
            move_uploaded_file($file['tmp_name'], './public/img/' . $file_name);
        }
        $model->product_img = $file_name;
        $model->save();
        header('Location: ./');
    }

    // Hàm xóa sản phẩm
    public function remove()
    {
        $productId = isset($_GET['id'])  ? $_GET['id'] : null;
        if (!$productId) {
            header('Location: ./mess=id hiện không tồn tại');
            die();
        }

        $models = modelProduct::find($productId);
        if (empty($models)) {
            header('Location: ./mess=id không tồn tại');
            die();
        } else {
            modelProduct::destroy($productId);
            // echo "Xóa thành công";
            header('Location: ./');
        }
    }

    // Hàm edit sản phẩm
    public function editPage()
    {
        // Kiểm tra id trên thanh url có bỏ trống không.
        $productId = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$productId) {
            header('Location: ./mess=id hiện không tồn tại');
            die();
        }
        // Kiểm tr id trên url có tồn tại trong db không
        $model = modelProduct::find($productId);
        if ($model == null) {
            header('Location: ./mess=id không tồn tại');
            die();
        }
        // Lấy ra tất cả dữ liệu của danh mục.
        $cate = modelCate::all();

        $this->render('admin.adminProduct.editProduct', [
            'cate' => $cate,
            'model' => $model,
        ]);
    }

    function edit()
    {
        $productId = isset($_GET['id'])  ? $_GET['id'] : null;
        if (!$productId) {
            header('Location: ./mess=id hiện không tồn tại');
            die();
        }

        $models = modelProduct::find($productId);
        if (empty($models)) {
            header('Location: ./mess=id không tồn tại');
            die();
        }

        $requestData = $_POST;
        // $this->dd($requestData);
        $model = modelProduct::find($productId);

        $model->fill($requestData);

        $file = $_FILES['product_img'];
        $file_name = '';
        $file_name = $model->product_img;
        if ($file['size'] > 0) {
            $file_name = uniqid() . '-' . $file['name'];
            move_uploaded_file($file['tmp_name'], './public/img/' . $file_name);
        }

        $model->product_img = $file_name;
        $model->save();
        header('Location: ./');
    }
}
