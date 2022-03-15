<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Borrowing;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Borrowings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="borrowing-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Borrowing', ['create'], ['class' => 'btn btn-dark']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'book',
                'value' => function($model) {
                    return $model->getBook()->one()->isbn;
                }
            ],
            ['attribute' => 'book.title',
                'value' => function($model) {
                    return $model->getBook()->one()->title;
                }
            ],
            ['attribute' => 'user',
                'value' => function($model) {
                    return $model->getUser()->one()->email;
                }
            ],
            'borrow_date:date',
            'return_date:date',
            [
                'class' => ActionColumn::className(),
                'visibleButtons' => ['view' => false],
                'urlCreator' => function ($action, Borrowing $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
