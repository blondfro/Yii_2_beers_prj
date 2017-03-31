<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "beers".
 *
 * @property string $beer_name
 * @property string $brewery_name
 * @property string $beer_type
 * @property string $beer_abv
 * @property integer $beer_ibu
 * @property string $comment
 * @property string $venue_name
 * @property string $venue_city
 * @property string $venue_state
 * @property string $venue_lat
 * @property string $venue_lng
 * @property string $rating_score
 * @property string $created_at
 * @property string $checkin_url
 * @property string $beer_url
 * @property string $brewery_url
 * @property string $brewery_country
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
            [['beer_abv', 'venue_lat', 'venue_lng', 'rating_score'], 'number'],
            [['beer_ibu'], 'integer'],
            [['created_at'], 'safe'],
            [['beer_name'], 'string', 'max' => 64],
            [['brewery_name'], 'string', 'max' => 52],
            [['beer_type'], 'string', 'max' => 32],
            [['comment'], 'string', 'max' => 140],
            [['venue_name'], 'string', 'max' => 61],
            [['venue_city'], 'string', 'max' => 22],
            [['venue_state'], 'string', 'max' => 28],
            [['checkin_url', 'beer_url'], 'string', 'max' => 31],
            [['brewery_url'], 'string', 'max' => 34],
            [['brewery_country'], 'string', 'max' => 18],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'beer_name' => 'Beer Name',
            'brewery_name' => 'Brewery Name',
            'beer_type' => 'Beer Type',
            'beer_abv' => 'Beer Abv',
            'beer_ibu' => 'Beer Ibu',
            'comment' => 'Comment',
            'venue_name' => 'Venue Name',
            'venue_city' => 'Venue City',
            'venue_state' => 'Venue State',
            'venue_lat' => 'Venue Lat',
            'venue_lng' => 'Venue Lng',
            'rating_score' => 'Rating Score',
            'created_at' => 'Created At',
            'checkin_url' => 'Checkin Url',
            'beer_url' => 'Beer Url',
            'brewery_url' => 'Brewery Url',
            'brewery_country' => 'Brewery Country',
        ];
    }
}
