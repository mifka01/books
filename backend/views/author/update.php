<?php

use yii\helpers\Html;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $model common\models\Author */
/* @var $dataProvider \yii\data\ActiveDataProvider*/


$this->title = 'Update Author: ' . $model->name . $model->surname;
$this->params['breadcrumbs'][] = ['label' => 'Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['update', 'id' => $model->id]];

?>
<div class="author-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <div class='books'>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_book',
            'summary'=>false
        ]);
        ?>
    </div>
</div>
