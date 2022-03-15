<?php

namespace common\models\query;

use yii\helpers\ArrayHelper;

/**
 * This is the ActiveQuery class for [[\common\models\Book]].
 *
 * @see \common\models\Book
 */
class BookQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Book[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Book|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Book[]|array
     */
    public function showed()
    {
        return $this->andWhere(['show' => 1]);
    }
    /**
     * {@inheritdoc}
     * @return \common\models\Book[]|array
     */
    public function search($search)
    {
        return $this
            ->leftJoin('author', '`book`.`author` = `author`.`id`')
            ->leftJoin('publisher', '`book`.`publisher` = `publisher`.`id`')
            ->leftJoin('illustrator', '`book`.`illustrator` = `illustrator`.`id`')
            ->andFilterWhere ( [ 'OR' ,
                [ 'like' , 'title' , $search ],
                [ 'like' , 'isbn' , $search ],
                [ 'like' , 'concat(author.name, " ",author.surname)' , $search ],
                [ 'like' , 'concat(illustrator.name, " ",illustrator.surname)' , $search ],
                [ 'like' , 'publisher.name' , $search ],
            ] );
    }
    public function sorter($sorter){

        switch ($sorter) {
            case 'New':
                return $this->orderBy(['publishion_date'=>SORT_DESC]);
            case 'Available':
                return $this->available();
            case 'Best':
                return $this->select(['book.*', 'COUNT(borrowing.id) AS borrows'])
                    ->leftjoin('borrowing', 'book.id=borrowing.book')
                    ->groupBy('book.id')
                    ->orderBy(['borrows' => SORT_DESC]);
            case 'Fast read':
                return $this->orderBy(['pages' => SORT_ASC]);
            default:
        return $this;
        }

    }
    public function available(){
        return $this->andWhere(['available'=>1]);
    }
    public function list()
    {
        return ArrayHelper::map(self::available()->all(),'id', function($model){
            return $model->isbn;
        });
    }

}
