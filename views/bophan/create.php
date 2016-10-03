<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bophan */

$this->title = 'Create Bophan';
$this->params['breadcrumbs'][] = ['label' => 'Bophans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bophan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
