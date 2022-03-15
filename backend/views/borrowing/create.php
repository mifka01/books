<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Borrowing */

$this->title = 'Create Borrowing';
$this->params['breadcrumbs'][] = ['label' => 'Borrowings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="borrowing-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
