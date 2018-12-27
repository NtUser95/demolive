<?php

namespace Controllers;

class ErrorController extends \App\Controller
{
    public function error404() {
        return $this->render('error/error404');
    }

    public function error500() {
        return $this->render('error/error500');
    }
}