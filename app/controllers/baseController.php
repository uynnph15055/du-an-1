<?php

namespace App\Controllers;

use Jenssegers\Blade\Blade;

class baseController
{
    protected function render($view, $data = [])
    {
        $blade = new Blade('./app/views', './storage');
        echo $blade->make($view, $data)->render();
    }

    public function dd()
    {
        echo '<pre>';
        array_map(function ($x) {
            var_dump($x);
        }, func_get_args());
        echo '</pre>';
        die;
    }

    public function printArray(array $a): void
    {
        echo "[<br>";
        foreach ($a as $key => $value) {
            echo "&nbsp&nbsp&nbsp&nbsp[$key] => $value<br>";
        }
        echo "]<br>";
    }
}
