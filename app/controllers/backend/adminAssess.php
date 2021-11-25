<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelAssess;

class adminAssess extends baseController
{

    public function index()
    {
        $dataAssess = modelAssess::all();
        // $this->dd($dataAssess);
        $this->render("admin.adminAssess.listAssess", [
            'dataAssess' => $dataAssess,
        ]);
    }
}
