<?php

namespace app\models;

use Yii;
use app\models\BeerType;
use app\models\Brewery;

/**
 * This is the model class for table "beers".
 *
 * @property integer $id
 * @property string $beer_name
 * @property string $beer_type
 * @property integer $beer_type_id
 * @property string $beer_abv
 * @property integer $beer_ibu
 * @property string $comment
 * @property string $rating_score
 * @property string $created_at
 * @property string $checkin_url
 * @property string $beer_url
 * @property integer $brewery_id
 * @property integer $venue_id
 */
class Beer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'beers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['beer_type_id', 'beer_ibu', 'brewery_id', 'venue_id'], 'integer'],
            [['beer_abv', 'rating_score'], 'number'],
            [['created_at'], 'safe'],
            [['brewery_id', 'venue_id'], 'required'],
            [['beer_name'], 'string', 'max' => 64],
            [['beer_type'], 'string', 'max' => 32],
            [['comment'], 'string', 'max' => 140],
            [['checkin_url', 'beer_url'], 'string', 'max' => 31],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'beer_name' => 'Beer Name',
            'beer_type' => 'Beer Type',
            'beer_type_id' => 'Beer Type ID',
            'beerTypeName' => 'Beer type',
            'beer_abv' => 'Beer Abv',
            'beer_ibu' => 'Beer Ibu',
            'comment' => 'Comment',
            'rating_score' => 'Rating Score',
            'created_at' => 'Created At',
            'checkin_url' => 'Checkin Url',
            'beer_url' => 'Beer Url',
            'brewery_id' => 'Brewery ID',
            'venue_id' => 'Venue ID',
        ];
    }



    /*
 * One-to-many getter to retrieve the attributes of the LocationType model from locationTypeID foreign key in Restaurant model
 */
    public function getBeerType()
    {
        return $this->hasOne(BeerType::className(), ['id' => 'beer_type_id']);
    }

    public function getBreweryName()
    {
        return $this->hasOne(BeerType::className(), ['id' => 'brewery_id']);
    }

    public function getVenueName()
    {
        return $this->hasOne(BeerType::className(), ['id' => 'venue_id']);
    }



}
