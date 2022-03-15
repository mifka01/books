<?php

namespace common\models;

use Cassandra\Date;
use Yii;
use yii\behaviors\TimestampBehavior;



/**
 * This is the model class for table "{{%borrowing}}".
 *
 * @property int $id
 * @property int|null $book
 * @property int|null $user
 * @property string|null $borrow_date
 * @property string|null $return_date
 * @property int|null $updated_at
 * @property int|null $created_at
 *
 * @property Book $book0
 * @property User $user0
 */
class Borrowing extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%borrowing}}';
    }
    public function behaviors(){
    return [
        TimestampBehavior::class,
    ];


}

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['borrow_date', 'return_date', 'book','user'], 'required'],
            [['book', 'user', 'updated_at', 'created_at'], 'integer'],
            [['borrow_date','return_date'], 'date', 'format' => 'php:Y-m-d'],
            ['borrow_date', 'validateBorrowDate'],
            ['return_date', 'validateBorrowDate'],
            [['borrow_date', 'return_date'], 'safe'],
            [['book'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book' => 'id']],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user' => 'id']],
        ];
    }

    public function validateBorrowDate($attribute, $params) {
        $now = new \DateTime();
        $now->modify('-1 day');
        if($attribute == 'borrow_date'){
            $borrow_date = new \DateTime($this->borrow_date);
            $return_date= new \DateTime($this->return_date);
            if($borrow_date > $return_date){
            $this->addError($attribute,('The borrow date must be before the Return date.'));
            }
            if($borrow_date < $now){
                $this->addError($attribute,('The borrow date cannot be earlier than today.'));
            }
        }
        else{
            $borrow_date = new \DateTime($this->borrow_date);
            $return_date= new \DateTime($this->return_date);

            if($return_date < $now){
                $this->addError($attribute,('The return date cannot be earlier than today.'));
            }
            $month = $now->modify(('+1 month'))->modify('+1 day');
            if($return_date > $month){
                $this->addError($attribute,('The return date cannot be more than a month.'));
            }
        }
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book' => 'Book',
            'user' => 'User',
            'borrow_date' => 'Borrow Date',
            'return_date' => 'Return Date',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Book0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\BookQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book']);
    }

    /**
     * Gets query for [[User0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\BorrowingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\BorrowingQuery(get_called_class());
    }
}
