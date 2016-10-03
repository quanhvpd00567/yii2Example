<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Bophan;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NhanvienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nhanviens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nhanvien-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Them moi nhan vien', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
          //  'id',
            'fullname',
            'gender'=>[
              'attribute'=>'gender',
              'value'=>function($model){
                      if( $model->gender == 1){
                         return 'nam';
                      }else
                      {  return 'Nu';};
                    }],
            'email:email',
             'id_bophan',
                       [
                         'attribute'=>'Bo phan',
                         'value'=>function($data){
                              $tenbophan = Bophan::getName($data->id_bophan);
                              return $tenbophan;
                         }
                       ],
            //password',
            'address',
             'phone',
             'level' => [
                 'attribute'=>'level',
                 'value'=>function($models){
                   if($models->level == 1)
                   {
                     return 'Truong Phong';
                   }else{
                     return 'Nhan vien';
                   };}],
            // 'status',
            [
              'class' => 'yii\grid\ActionColumn',
              'header'=>'Action',
            ],
        ],
    ]); ?>
</div>
