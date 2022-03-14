<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Illustrator */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="illustrator-form">

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

