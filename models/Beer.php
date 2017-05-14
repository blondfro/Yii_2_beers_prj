<?php

namespace app\models;

use Yii;
use app\models\BeerType;
use app\models\Brewery;
use app\models\Venue;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

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
 * @property string $last_modified
 * @property string $checkin_url
 * @property string $beer_url
 * @property integer $brewery_id
 * @property integer $venue_id
 */
class Beer extends \yii\db\ActiveRecord
{

    public $breweryName;
    public $venueName;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'beers';
    }


    /**
     * @return array
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'last_modified'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['last_modified'],
                ],
                'value' => new Expression("NOW()"),
            ],
        ];
    }




    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'beer_type_id',
                    'beer_ibu',
                    'brewery_id',
                    'venue_id',
                ], 'integer',
            ],

            [
                [
                    'beer_abv',
                    'rating_score',
                ], 'number',
            ],

            [
                [
                    'created_at',
                    'last_modified',
                ], 'safe',
            ],

            [
                [
                    'brewery_id',
                    'venue_id',
                ], 'required',
            ],

            [
                [
                    'beer_name',
                ], 'string',
                'max' => 64,
            ],

            [
                [
                    'beer_type',
                ], 'string',
                'max' => 32,
            ],

            [
                [
                    'comment',
                ], 'string',
                'max' => 140,
            ],

            [
                [
                    'checkin_url',
                    'beer_url',
                ], 'string',
                'max' => 31,
            ],

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
            'beerTypeName' => 'Beer Type',
            'beer_abv' => 'Beer Abv',
            'beer_ibu' => 'Beer Ibu',
            'comment' => 'Comment',
            'rating_score' => 'Rating Score',
            'created_at' => 'Created',
            'last_modified' => 'Last modified',
            'checkin_url' => 'Checkin Url',
            'beer_url' => 'Beer Url',
            'brewery_id' => 'Brewery ID',
            'breweryName' => 'Brewery Name',
            'venue_id' => 'Venue ID',
            'venueName' => 'Venue Name',
        ];
    }



    /*
 * One-to-many getter to retrieve the attributes of another model from foreign key in Beer model
 */
    public function getBeerType()
    {
        return $this->hasOne(BeerType::className(), ['id' => 'beer_type_id']);
    }

    public function getBrewery()
    {
        return $this->hasOne(Brewery::className(), ['id' => 'brewery_id']);
    }

    public function getVenue()
    {
        return $this->hasOne(Venue::className(), ['id' => 'venue_id']);
    }



}
