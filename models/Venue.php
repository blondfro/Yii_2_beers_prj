<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venues".
 *
 * @property integer $id
 * @property string $name
 * @property string $city
 * @property string $state
 * @property string $latitude
 * @property string $longitude
 */
class Venue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'venues';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'city', 'state', 'latitude', 'longitude'], 'required'],
            [['name', 'city'], 'string', 'max' => 9],
            [['state'], 'string', 'max' => 30],
            [['latitude', 'longitude'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'city' => 'City',
            'state' => 'State',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
        ];
    }
}
