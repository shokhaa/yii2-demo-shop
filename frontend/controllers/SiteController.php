<?php
namespace frontend\controllers;

use shop\entities\User\User;
use shop\useCases\manage\UserManageService;
use yii\console\Exception;
use yii\helpers\ArrayHelper;
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

    private $service;

    public function __construct($id, $module, UserManageService $service, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
    }


    /**
     * @return mixed
     */
    public function actionIndex()
    {


        $this->layout = 'home';
        return $this->render('index');
    }

    public function actionAssign(): void
    {
        $user = $this->findModel('shokhaa');
        $this->service->assignRole($user->id, 'admin');
    }

    private function findModel($username): User
    {
        if (!$model = User::findOne(['username' => $username])) {
            throw new Exception('User is not found');
        }
        return $model;
    }
}
