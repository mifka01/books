<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Illustrator */

$this->title = 'Create Illustrator';
$this->params['breadcrumbs'][] = ['label' => 'Illustrators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="illustrator-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
