<?php 
namespace App\Controllers\Frontend;
use App\Controllers\baseController;
use App\Models\modelBanner;
class Banner extends baseController
{
 function index(){
    $dataBanner= modelBanner::getAll();
    $this->render("admin.adminBanner.listBanner", ['dataBanner' => $dataBanner]);
 }
 function addBanner(){
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        extract($_POST);

        if (!empty($banner_text)) {
            $file = $_FILES['banner_img'];

            if ($file['size'] > 0) {
                $file_name = $file['name'];
                move_uploaded_file($file['tmp_name'], './public/img/' . $file_name);
            } else {
                $_SESSION['error'] = "Bạn chưa chọn ảnh !!!";
                header('Location: ./danh-sach-banner');
                die();
            }
            // if(file_exists( './public/img/'.$file_name)){
            //     $_SESSION['error'] = "file ảnh đã tồn tại !!!";
            //     header('Location: ./danh-sach-banner');
            //     die(); 
            // }
        
            if(strlen($banner_text)>200){
                $_SESSION['error'] = "Text quá dài !!!";
                header('Location: ./danh-sach-banner');
                die();
            }
            $data = [

                'banner_text' => $banner_text,
                'banner_img' => $file_name,
            ];


            // $this->dd($data);
            modelBanner::insertBanner($data);

            header('Location: ./danh-sach-banner');
            $_SESSION['success'] = "Cập Nhật thành công !!!";
        } else {
            $_SESSION['error'] = "Bạn đang bỏ trống dữ liệu !!!";
            header('Location: ./danh-sach-banner');
            die();
        }
    }
 }
}
?>
