<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelBanner;
use App\Models\modelMenu;
use App\Models\modelSubject;

class Home extends baseController
{
    private $menu;

    function __construct()
    {
        $this->menu = modelMenu::sortMenu();
    }

    public function index()
    {
        $dataBanner = modelBanner::all();
        $dataSubject = modelSubject::addNew();

        $this->render("customer.home",  [
            'banner' => $dataBanner[0],
            'menu' => $this->menu,
            'dataSubject' => $dataSubject,
        ]);
    }
}
