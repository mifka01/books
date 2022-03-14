<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%author}}".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $nationality
 * @property string|null $birthdate
 * @property int|null $added_by
 * @property string|null $updated_at
 * @property string|null $created_at
 *
 * @property User $addedBy
 * @property Book[] $books
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%author}}';
    }

    public function behaviors(){
    return [
      TimestampBehavior::class,
      [
        'class' => BlameableBehavior::class,
        'createdByAttribute' => 'added_by',
        'updatedByAttribute' => false
      ]
    ];
    
    
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
      return [
            [['name', 'surname', 'nationality'], 'required'],
            [['birthdate', 'updated_at', 'created_at'], 'safe'],
            [['added_by'], 'integer'],
            [['name', 'surname'], 'string', 'max' => 255],
            [['nationality'], 'string', 'max' => 2],
            [['added_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['added_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'nationality' => 'Nationality',
            'birthdate' => 'Birthdate',
            'added_by' => 'Added By',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[AddedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getAddedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'added_by']);
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\BookQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['author' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\AuthorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AuthorQuery(get_called_class());
    }

}
