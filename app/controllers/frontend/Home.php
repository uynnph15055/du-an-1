<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelAssess;
use App\Models\modelBanner;
use App\Models\modelMenu;
use App\Models\modelSubject;
use App\Models\modelBill;

class Home extends baseController
{
    private $menu;

    function __construct()
    {
        $this->menu = modelMenu::sortMenu();
    }

    public function index()
    {


        if (!isset($_SESSION['user_info'])) {
            $dataAssess = modelAssess::getAssessStudent();
            $dataSubject = modelSubject::addNew();
            $dataBanner = modelBanner::all();
            $this->render("customer.home",  [
                'banner' => $dataBanner[0],
                'menu' => $this->menu,
                'dataAssess' => $dataAssess,
                'dataSubject' => $dataSubject,
            ]);
        } else {
            $dataAssess = modelAssess::getAssessStudent();
            // $this->dd($dataAssess);
            $dataBanner = modelBanner::all();
            $dataSubject = modelSubject::addNew();
            $dataBill = modelBill::all();


            $this->render("customer.home",  [
                'dataBill' => $dataBill,
                'banner' => $dataBanner[0],
                'menu' => $this->menu,
                'user' => $_SESSION['user_info'][0],
                'dataSubject' => $dataSubject,
                'dataAssess' => $dataAssess,
            ]);
        }
    }
}
