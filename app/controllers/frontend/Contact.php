<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelMenu;

class Contact extends baseController
{
    private $menu;
    public function __construct()
    {
        $this->menu = modelMenu::sortMenu();
    }

    public function index()
    {
        $this->render("customer.contact", [
            'menu' => $this->menu,
        ]);
    }
}
