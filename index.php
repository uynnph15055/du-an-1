<?php

session_start();
$url = isset($_GET['url']) ? $_GET['url'] : "/";

require_once "./vendor/autoload.php";
require_once "./common/database-config.php";

use App\Controllers\Backend\adminProduct;

switch ($url) {
    case 'admin-product':
        $ctr = new adminProduct();
        $ctr->index();
        break;
    case 'add-product-page':
        $ctr = new adminProduct();
        $ctr->addProductPage();
        break;
    case 'save-add-product':
        $ctr = new adminProduct();
        $ctr->addProduct();
        break;
    case 'remove-product':
        $ctr = new adminProduct();
        $ctr->remove();
        break;
    case 'edit-product':
        $ctr = new adminProduct();
        $ctr->editPage();
        break;
    case 'save-edit-product':
        $ctr = new adminProduct();
        $ctr->edit();
        break;

    default:
        "Không tồn tại file nào"; //Hellooooo
        break;
}
