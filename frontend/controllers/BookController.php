<?php

namespace frontend\controllers;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use common\models\Book;

class BookController extends Controller
{
    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider([
           'query' => Book::find()->showed()
        ]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

}