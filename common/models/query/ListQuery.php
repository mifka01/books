<?php

namespace common\models\query;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;


class ListQuery extends ActiveQuery
{
    public function list()
    {
        return ArrayHelper::map(self::all(),'id', function($model){
            return $model->name.' '.$model->surname;
        });
    }
    public function fullName(){
        $author = self::one();
        return $author->name .' '. $author->surname;
    }
}