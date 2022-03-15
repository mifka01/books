<?php

namespace common\models\query;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;


/**
 * This is the ActiveQuery class for [[\common\models\User]].
 *
 * @see \common\models\User
 */
class UserQuery extends ActiveQuery
{
    public function list()
    {
        return ArrayHelper::map(self::all(),'id', function($model){
            return $model->email;
        });
    }
}
