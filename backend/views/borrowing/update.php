<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Borrowing */

$this->title = 'Update Borrowing: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Borrowings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['update', 'id' => $model->id]];
?>
<div class="borrowing-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
