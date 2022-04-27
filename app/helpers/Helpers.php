<?php

namespace App\helpers;

use App\Models\route\Route;

class Helpers
{

    public static function perPage($perPage = 10)
    {
        return $perPage;
    }

    public static function  getRoutes()
    {
        return Route::select('name', 'id')->get();
    }
}
