<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Illustrator;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Illustrators';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="illustrator-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Illustrator', ['create'], ['class' => 'btn btn-dark']) ?>
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
                    return Html::a($model->name.' '.$model->surname ,Url::to(['update','id'=> $model->id]));
                }
            ],
            'nationality',
            'birthdate:date',
            //'added_by',
            //'updated_at',
            //'created_at',
            [
                'class' => ActionColumn::className(),
                'visibleButtons' => ['view' => false],
                'urlCreator' => function ($action, Illustrator $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
