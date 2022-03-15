<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use common\models\Book;
use common\models\User;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\Borrowing */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="borrowing-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'book')->dropdownList(Book::find()->list()) ?>
            <a href="<?= Url::to('/book/create')?>"><small class="text-muted float-right">New</small></a>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'user')->dropdownList(User::find()->list()) ?>
            <a href="<?= Url::to('/user/create')?>"><small class="text-muted float-right">New</small></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'borrow_date')->textInput(['type' => 'date']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'return_date')->textInput(['type' => 'date']) ?>
        </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
