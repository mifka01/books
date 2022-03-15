<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Publisher;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Publishers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publisher-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Publisher', ['create'], ['class' => 'btn btn-dark']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'name',
                'format' => 'raw',
                'filter' =>'name',
                'value' => function($model){
                    return Html::a($model->name ,Url::to(['update','id'=> $model->id]));
                }
            ],
            'nationality',
            //'added_by',
            //'updated_at',
            //'created_at',
            [
                'class' => ActionColumn::className(),
                'visibleButtons' => ['view' => false],
                'urlCreator' => function ($action, Publisher $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
