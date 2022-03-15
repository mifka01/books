<?php

namespace common\models\query;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

/**
 * This is the ActiveQuery class for [[\common\models\Publisher]].
 *
 * @see \common\models\Publisher
 */
class PublisherQuery extends ActiveQuery
{
    public function list()
    {
        return ArrayHelper::map(self::all(),'id', 'name');
    }
}
