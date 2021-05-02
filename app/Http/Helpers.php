<?php

    //highlights the selected navigation on admin panel
    if (! function_exists('areActiveNav')) {
        function areActiveNav(Array $routes, $output = "active")
        {
            foreach ($routes as $route) {
                if (Route::currentRouteName() == $route) return $output;
            }

        }
    }
    if (! function_exists('areMenuOpen')) {
        function areMenuOpen(Array $routes, $output = "menu-open")
        {
            foreach ($routes as $route) {
                if (Route::currentRouteName() == $route) return $output;
            }

        }
    }
?>
