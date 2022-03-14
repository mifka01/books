<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use common\models\Author;
use common\models\Illustrator;
use common\models\Publisher;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Book */
/* @var $form yii\bootstrap4\ActiveForm */


?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'isbn')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>


    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'author')->dropdownList(Author::find()->list()) ?>
            <a href="<?= Url::to('/author/create')?>"><small class="text-muted float-right">New</small></a>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'illustrator')->dropdownList(Illustrator::find()->list()) ?>
            <a href="<?= Url::to('/illustrator/create')?>"><small class="text-muted float-right">New</small></a>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'publisher')->dropdownList(Publisher::find()->list()) ?>
            <a href="<?= Url::to('/publisher/create')?>"><small class="text-muted float-right">New</small></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'show')->dropDownList([1 => 'Yes', 0 => 'No']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'available')->dropDownList([1 => 'Yes', 0 => 'No']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'pages')->textInput(['type' => 'number']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'publishion_date')->textInput(['type' => 'number']) ?>
        </div>
    </div>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
