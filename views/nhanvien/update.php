<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nhanvien */

$this->title = 'Update: ' . $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Nhanviens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="nhanvien-update">
          <h1><?= Html::encode($this->title) ?></h1>
          <?= $this->render('_form', [
              'model' => $model,
              'listbophan'=> $listbophan,
          ]) ?>
      </div>
    </div>
    <div class="col-md-6">
    
      <?= $this->render('_formChangePass') ?>
    </div>
  </div>
</div>

 <script>
     document.getElementById('checkboxChangePass').onclick = function(){
         if(this.checked == true)
         {

          document.getElementById('passwordNew').disabled = false;
          document.getElementById('passwordagain').disabled = false;
          document.getElementById('btnchangepass').disabled = false;
        }else{
          document.getElementById('passwordNew').disabled = true;
          document.getElementById('passwordagain').disabled = true;
          document.getElementById('btnchangepass').disabled = true;
        }
     }
</script>
