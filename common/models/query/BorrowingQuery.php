<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Borrowing]].
 *
 * @see \common\models\Borrowing
 */
class BorrowingQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Borrowing[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Borrowing|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    public function active(){
        return $this->andWhere('return_date <= NOW()-1');
    }
}
