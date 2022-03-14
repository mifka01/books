<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Book */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'isbn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pages')->textInput() ?>

    <?= $form->field($model, 'show')->textInput() ?>

    <?= $form->field($model, 'available')->textInput() ?>

    <?= $form->field($model, 'author')->textInput() ?>

    <?= $form->field($model, 'illustrator')->textInput() ?>

    <?= $form->field($model, 'publisher')->textInput() ?>

    <?= $form->field($model, 'added_by')->textInput() ?>

    <?= $form->field($model, 'publishion_date')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
