<?php
/**
 * Created by PhpStorm.
 * User: YOBA
 * Date: 27.12.2018
 * Time: 13:14
 */

namespace Controllers;

use App\App;
use Models\AddUserModel;
use Models\UsersModel;

class HomeController extends \App\Controller
{
    public function index()
    {
        return $this->render('home/index', [
            'model' => new UsersModel(),
        ]);
    }

    public function add()
    {
        $model = new AddUserModel();
        if($model->load()) {
            $model->processFormData();
            if(!$model->hasErrors()) {
                $model->reset();
                App::$user->setFlash('success', 'User added!');
            } else {
                foreach($model->getErrors() as $msg) {
                    App::$user->setFlash('warning', $msg);
                }
            }
        }

        return $this->render('home/add', [
            'model' => $model,
        ]);
    }
}