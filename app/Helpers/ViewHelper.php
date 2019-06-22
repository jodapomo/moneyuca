<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;



class ViewHelper {



    public function isRouteActive( $routeName )

    {

        if( Route::currentRouteName() === $routeName ){

            return true;

        }

        return false;
        
    }

}