<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%publisher}}".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $nationality
 * @property int|null $added_by
 * @property string|null $updated_at
 * @property string|null $created_at
 *
 * @property User $addedBy
 * @property Book[] $books
 */
class Publisher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%publisher}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['added_by'], 'integer'],
            [['updated_at', 'created_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['nationality'], 'string', 'max' => 50],
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
            'nationality' => 'Nationality',
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
        return $this->hasMany(Book::className(), ['publisher' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\PublisherQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PublisherQuery(get_called_class());
    }
}
