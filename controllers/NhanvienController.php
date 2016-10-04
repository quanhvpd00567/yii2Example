<?php

namespace app\controllers;

use Yii;
use app\models\Nhanvien;
use app\models\NhanvienSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Bophan;
use yii\base\Exception;
/**
 * NhanvienController implements the CRUD actions for Nhanvien model.
 */
class NhanvienController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Nhanvien models.
     * @return mixed
     */
    public function actionIndex()
    {
      $this->layout ="layoutadmin";
        $searchModel = new NhanvienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id)
    {

      $this->layout ="layoutadmin";
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $this->layout ="layoutadmin";
        $model = new Nhanvien();
        $listbophan = Bophan::find()->asArray()->all();
      //  $listbophan = $bophan->getList();
        $model->gender =1;
        $model->status =0;
        $data = Yii::$app->request->post('Nhanvien');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
          $model->password=  Yii::$app->getSecurity()->generatePasswordHash($data['password']);
          $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('create', [
                'model' => $model,
                'listbophan'=> $listbophan,
            ]);
        }
    }

    public function actionUpdate($id)
    {
      $this->layout ="layoutadmin";
        $model = $this->findModel($id);
        $listbophan = Bophan::find()->asArray()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        } else {
            return $this->render('update', [
                'model' => $model,
                'listbophan'=> $listbophan,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Nhanvien::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionChangepassword()
    {
      echo "asdads";
    }
}
