<?php

namespace app\controllers;
use app\models\User;

use Yii;
use yii\web\Controller;

class UserController extends \yii\web\Controller
{
    public function actionLogin()
    {
        return $this->render('login');
    }

    public function actionRegister()
    {
        $user = new User();

        if ($user->load(Yii::$app->request->post())) {
            if ($user->validate()) {

                $user->save();  // Save to DB
                // Show Msessage 
                yii::$app->getSession()->setFlash('success', 'User Registration successfull!');
                return $this->redirect('index.php') ;
            }
        }
    
        return $this->render('register', ['user' => $user,]);
    }

}
