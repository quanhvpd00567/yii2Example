<?php

namespace app\controllers;
use app\models\TbUsers;
use Yii;
class UserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout ="layoutadmin";
        return $this->render('index');
    }
    public function actionAdd()
    {
         $this->layout ="layoutadmin";
         $model = new TbUsers();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        //         // form inputs are valid, do something here
              echo  $name = Yii::$app->request->TbUsers[fullname];
                  return;
         }else{
            return $this->render('add', ['model' => $model,]);
        }

    }

}
