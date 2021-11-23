<?php
namespace frontend\controllers;

use shop\entities\User\User;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * @return mixed
     */
    public function actionIndex()
    {


            print_r(\Yii::$app->security->generatePasswordHash('shokhaa'));
            die();
            if ($user->save()) {
                echo 'good';
            }
        $this->layout = 'home';
        return $this->render('index');
    }
}
