<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Book */
/* @var $authorDataProvider \yii\data\ActiveDataProvider */
/* @var $illustratorDataProvider \yii\data\ActiveDataProvider */
/* @var $publisherDataProvider \yii\data\ActiveDataProvider */


$this->title = 'Create Book';
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
