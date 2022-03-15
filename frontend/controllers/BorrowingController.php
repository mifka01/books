<?php

namespace frontend\controllers;

use common\models\Borrowing;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\helpers\Url;
use common\models\Book;
use yii\web\NotFoundHttpException;

class BorrowingController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'create' => ['POST'],
                    ],
                ],
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ]
            ]
        );

    }

    public function actionSuccess(){
        $model = Borrowing::find()->andWhere(['id' => 23])->one();
        return $this->render('success', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Borrowing model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {

        $model = new Borrowing();

        if ($this->request->isPost) {
            $post = $this->request->post();
            $post['Borrowing']['user'] = $this->user->id;
            $post['Borrowing']['borrow_date'] = date('Y-m-d');
            if ($model->load($post) && $model->save()) {
                $book = $model->getBook()->one();
                $book->available = 0;
                $book->save();
                return $this->render('success', [
                    'model' => $model,
                ]);
            }
            return $this->render('/book/view',
                ['model'=>Book::find()->andWhere(['id'=>$post['Borrowing']['book']])->one(),
                'borrowing'=>$model]);
        } else {
            $model->loadDefaultValues();
        }

        return $this->goHome();
    }
}