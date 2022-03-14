<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Author */
/* @var $form yii\bootsrap4\ActiveForm */
?>

<div class="author-form">

    <?php $form = ActiveForm::begin(); ?>
<div class='row'>

    <div class='col-md-6'>
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class='col-md-6'>
        <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
    </div>

</div>
 <div class='row'>

    <div class='col-md-6'>
       <?= $form->field($model, 'nationality')->textInput(['maxlength' => true]) ?>
    </div>
    <div class='col-md-6'>

       <?= $form->field($model, 'birthdate')->textInput(['maxlength' => true, 'type' => 'date']) ?>
    
    </div>

</div>
<div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
