<?php
/* @var $model \common\models\Book */
/* @var $borrowing \common\models\Borrowing */
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;
?>

<div class="row">
<div class="col-8">
<div class="row">
<h2><?= $model->title?></h2>
</div>
<div class="row text-muted">
    ISBN &raquo; <?= $model->isbn?>
</div>
<div class="row text-muted">
   Author &raquo; <?= $model->getAuthor()->fullName()?>,
   Illustrator &raquo; <?= $model->getIllustrator()->fullName()?>
</div>

<div class="row text-muted">
    Publisher &raquo; <?= $model->getPublisher()->one()->name?>,
    <?= $model->publishion_date?>
</div>
<div class="row text-muted">
    <div class="p-0"> Pages &raquo; <?= $model->pages?></div>
</div>
</div>
<div class="col-4 d-flex flex-column">
    <?php if($model->available) : ?>
    <div class="borrowing-form">
        <?php $form = ActiveForm::begin(['action' => Url::to('/borrowing/create'), 'method'=>'post']); ?>
        <div class="form-group">
            <?= $form->field($borrowing, 'book')->textInput(['type' => 'hidden',  'class'=>'d-none','value' =>$model->id])->label(false) ?>
            <?= $form->field($borrowing, 'return_date')->textInput(['type' => 'date']) ?>
            <?= Html::submitButton('Borrow', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <?php else : ?>
    <div class="container-fluid mt-auto">
        <button class="text-white btn btn-danger" disabled>
            Available <?= DateTime::createFromFormat('Y-m-d', $model->getBorrowings()->active()->one()->return_date)->format('d.m.Y');?>
        </button>
    </div>
    <?php endif; ?>
</div>
</div>

<div class="row mt-3">
    <?= $model->description?>
</div>




