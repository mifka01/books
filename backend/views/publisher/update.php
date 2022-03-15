<?php

use yii\helpers\Html;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $model common\models\Publisher */
/* @var $dataProvider \yii\data\ActiveDataProvider*/

$this->title = 'Update Publisher: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Publishers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="publisher-update">

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
