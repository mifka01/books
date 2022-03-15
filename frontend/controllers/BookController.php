<?php

namespace frontend\controllers;

use common\models\Borrowing;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use common\models\Book;
use yii\web\NotFoundHttpException;

class BookController extends Controller
{
    public function actionIndex($search='',$sorter='')
    {
        $dataProvider = new ActiveDataProvider([
           'query' => Book::find()->showed()
        ]);
        if($search != ''){
            $dataProvider->query = $dataProvider->query->search($search);
        }
        if($sorter !=''){
            $dataProvider->query = $dataProvider->query->sorter($sorter);
        }
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);
        $borrowing = new Borrowing();

        return $this->render('view', [
            'model' => $model,
            'borrowing' =>$borrowing,
        ]);
    }
    /**
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Book::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}