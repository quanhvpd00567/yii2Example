<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Nhanvien */

$this->title = 'Tao moi nhan vien';
$this->params['breadcrumbs'][] = ['label' => 'Nhanviens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nhanvien-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listbophan'=> $listbophan,
    ]) ?>

</div>
