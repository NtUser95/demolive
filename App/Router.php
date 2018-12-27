<?php

namespace App;


class Router
{
    public function resolve()
    {
        $route = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($route);
        $result[0] = array_shift($route); // Controller
        $result[1] = array_shift($route); // Action
        $result[2] = $route; /// Params

        return $result;
    }
}