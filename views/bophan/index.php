<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BophanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bophans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bophan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bophan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
          //  'status',

            ['class' => 'yii\grid\ActionColumn',
              'header'=>'Action',
            ],
        ],
    ]); ?>
</div>
