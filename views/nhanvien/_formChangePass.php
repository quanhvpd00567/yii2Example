<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
 use yii\helpers\ArrayHelper;
?>
<h1>Change password</h1>
<?= Html::checkbox('checkboxChangePass',false,['value'=>'on','id'=>'checkboxChangePass',])?> <label for="checkboxChangePass">Check to change password</label>
<form class="form-horizontal" action="changepassword" method="post">
  <div class="form-group">
    <label for="inputPassword" class="col-sm-3 control-label">Password</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" disabled id="passwordNew" placeholder="Please, Enter new password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-3 control-label">Password Again</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" disabled id="passwordagain" placeholder="Please, Enter password again">
    </div>
  </div>
    <button type="submit" id="btnchangepass" class="btn btn-primary" disabled>Change password</button>
</form>
