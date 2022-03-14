<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%book}}".
 *
 * @property int $id
 * @property string $isbn
 * @property string $title
 * @property string|null $description
 * @property int|null $pages
 * @property int|null $show
 * @property int|null $available
 * @property int|null $author
 * @property int|null $illustrator
 * @property int|null $publisher
 * @property int|null $added_by
 * @property string $publishion_date
 * @property string|null $updated_at
 * @property string|null $created_at
 *
 * @property User $addedBy
 * @property Author $author0
 * @property Borrowing[] $borrowings
 * @property HasGenre[] $hasGenres
 * @property Illustrator $illustrator0
 * @property Publisher $publisher0
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%book}}';
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
            [['isbn', 'title','pages','show','available'], 'required'],
            [['description'], 'string'],
            [['pages', 'show', 'available', 'author', 'illustrator', 'publisher', 'added_by'], 'integer'],
            [['updated_at', 'created_at'], 'safe'],
            [['isbn'], 'string', 'max' => 17],
            [['title'], 'string', 'max' => 255],
            [['publishion_date'], 'integer', 'min' => 1000,'max'=>9999],
            [['added_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['added_by' => 'id']],
            [['author'], 'exist', 'skipOnError' => true, 'targetClass' => Author::className(), 'targetAttribute' => ['author' => 'id']],
            [['illustrator'], 'exist', 'skipOnError' => true, 'targetClass' => Illustrator::className(), 'targetAttribute' => ['illustrator' => 'id']],
            [['publisher'], 'exist', 'skipOnError' => true, 'targetClass' => Publisher::className(), 'targetAttribute' => ['publisher' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'isbn' => 'Isbn',
            'title' => 'Title',
            'description' => 'Description',
            'pages' => 'Pages',
            'show' => 'Show',
            'available' => 'Available',
            'author' => 'Author',
            'illustrator' => 'Illustrator',
            'publisher' => 'Publisher',
            'added_by' => 'Added By',
            'publishion_date' => 'Publishion Date',
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
     * Gets query for [[Author0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AuthorQuery
     */
    public function getAuthor0()
    {
        return $this->hasOne(Author::className(), ['id' => 'author']);
    }

    /**
     * Gets query for [[Borrowings]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\BorrowingQuery
     */
    public function getBorrowings()
    {
        return $this->hasMany(Borrowing::className(), ['book' => 'id']);
    }

    /**
     * Gets query for [[HasGenres]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\HasGenreQuery
     */
    public function getHasGenres()
    {
        return $this->hasMany(HasGenre::className(), ['book' => 'id']);
    }

    /**
     * Gets query for [[Illustrator0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\IllustratorQuery
     */
    public function getIllustrator0()
    {
        return $this->hasOne(Illustrator::className(), ['id' => 'illustrator']);
    }

    /**
     * Gets query for [[Publisher0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PublisherQuery
     */
    public function getPublisher0()
    {
        return $this->hasOne(Publisher::className(), ['id' => 'publisher']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\BookQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\BookQuery(get_called_class());
    }
}
