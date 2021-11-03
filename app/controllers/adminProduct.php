<?php

class adminProduct extends Controller
{
    function index()
    {
        $getModel = $this->getModel("modelProduct");
        $dataProduct = $getModel->getProductMore();
        // dd($dataProduct);
        $this->viewAdmin("admin", $data = [
            'folder' => 'product',
            'from' => 'adminProduct',
            'dataProduct' =>  $dataProduct
        ]);
    }

    function addProduct()
    {
        // dd($_POST['product_property']);
        $url = "./../addProductPage/";
        $url_second = "./../../adminProduct/";

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (empty($product_name) || empty($product_intro) || empty($product_description) || empty($product_unit)) {

                $_SESSION['error'] = "Bạn đang bỏ trống dữ liệu";
                header('Location: ' . $url);
                die();
            } else {

                // Kiểm tra xem ảnh chính của sản phẩm có tồn tại không
                if (isset($_FILES['product_img'])) {
                    $file =  $_FILES['product_img'];
                    $product_img =  $file['name'];

                    if (empty($product_img)) {
                        $_SESSION['error'] = "Bạn chưa chọn ảnh !!!";
                        header('Location: ' . $url);
                        die();
                    }
                    move_uploaded_file($file['tmp_name'], './public/img/imgCateP/' . $product_img);
                }

                // Check ko chọn loại thuộc tĩnh và danh mục
                if ($product_property == 0) {
                    $_SESSION['error'] = "Bạn chưa chọn thuộc tĩnh cho sản phẩm !!!";
                    header('Location: ' . $url);
                    die();
                } elseif ($cate_name == 0) {
                    $_SESSION['error'] = "Bạn chưa chọn danh mục sản phẩm !!!";
                    header('Location: ' . $url);
                    die();
                }

                foreach ($product_price as $key) {
                    if ($key == '') {
                        $_SESSION['error'] = "Bạn chưa điền đủ giá !!!";
                        header('Location: ' . $url);
                        die();
                    }
                }

                // Lẫy dữ liệu chuyển bị chuyền lên db.
                $data = [
                    'product_name' => $product_name,
                    'product_img' => $product_img,
                    'product_property' => $product_property,
                    'cate_id' => $cate_name,
                    'product_description' => $product_description,
                    'product_intro' => $product_intro,
                    'product_unit' => $product_unit,
                    'product_slug' => $product_slug,
                ];

                // Gọi đến model Product và chèn dữ liệu vào.
                $getProduct = $this->getModel('modelProduct');
                $getProduct->InsertProduct($data);

                // Lấy ra id của sản phẩm mới cuyền vào.
                $dataProduct = $getProduct->getProduct();
                $dataRowEnd = end($dataProduct);
                // dd($dataRowEnd);
                $product_id = $dataRowEnd['product_id'];
                $getImgProduct = $this->getModel('modelProductImgSub');
                // Truyền ảnh phụ vào database
                foreach ($product_img_sub as $key) {
                    $dataImg = [
                        'product_id' => $product_id,
                        'img_sub' => $key,
                    ];
                    $getImgProduct->insertImg($dataImg);
                }
                header('Location: ' . $url_second);
            }
        }
    }

    function addProductPage()
    {
        $getProper = $this->getModel('modelProperti');
        $getModelCate = $this->getModel('modelCateProduct');
        $dataCategory = $getModelCate->getCateProduct();
        $dataProper = $getProper->getAllProperti();

        // dd($dataCategory);
        $this->viewAdmin("adminSecond", $data = [
            'folder' => 'product',
            'from' => 'addProduct',
            'dataCategory' => $dataCategory,
            'dataProperti' => $dataProper,
        ]);
    }
}
