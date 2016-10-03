<?php

namespace app\controllers;

use Yii;
use app\models\Nhanvien;
use app\models\NhanvienSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Bophan;

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

    // public function actionExport()
    // {
    //   $data = Nhanvien::find()->all();
    //   $filename = 'Data-'.Date('YmdGis').'-nhanvien.xls';
    //    header("Content-type: application/vnd-ms-excel");
    //    header("Content-Disposition: attachment; filename=".$filename);
    //      echo '<table border="1" width="100%">
    //      <thead>
    //       <tr>
    //           <th>id</th>
    //           <th>name</th>
    //       </tr>
    //       </thead>';
    //       foreach($data as $item){
    //       echo '
    //             <tr>
    //               <td>'.$item['id'].'</td>
    //               <td>'.$item['title'].'</td>
    //             </tr>
    //           ';}
    //         echo '</table>';
    // }

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
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'listbophan'=> $listbophan,
            ]);
        }
    }

    /**
     * Updates an existing Nhanvien model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
      $this->layout ="layoutadmin";
        $model = $this->findModel($id);
        $listbophan = Bophan::find()->asArray()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'listbophan'=> $listbophan,
            ]);
        }
    }

    /**
     * Deletes an existing Nhanvien model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Nhanvien model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Nhanvien the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Nhanvien::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
