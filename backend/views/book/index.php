<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Book;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-dark']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'isbn',
            'title',
            'pages',
            ['attribute' => 'show',
            'value' => function($model){
            return ($model->show) ? 'Yes' : 'No';
            }],
            ['attribute' => 'available',
                'value' => function($model){
                    return ($model->available) ? 'Yes' : 'No';
                }],
            ['attribute' => 'author',
             'value' => function($model) {
                return $model->getAuthor()->fullName();
             }
            ],
            ['attribute' => 'publisher',
                'value' => function($model) {
                    return $model->getPublisher()->one()->name;
                }
            ],
            [   'attribute' =>'borrowed',
                'label'=>'Borrowed',
                'value' => function($model){
                    return $model->getBorrowings()->count();
                }
            ],
            'created_at:datetime',
            [
                'class' => ActionColumn::className(),
                'visibleButtons' => ['view' => false],
                'urlCreator' => function ($action, Book $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],

        ],
    ]); ?>


</div>
