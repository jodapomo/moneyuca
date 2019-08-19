<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;



class ViewHelper {



    public function isRouteActive( $routeName )

    {

        if (strpos(Route::currentRouteName(), $routeName) !== false) {
            return true;
        }

        return false;
        
    }

}