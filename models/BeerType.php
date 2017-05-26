<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "beer_type".
 *
 * @property integer $id
 * @property string $name
 */
class BeerType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'beer_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Beer Type',
            'beerCount' => '# of Beers',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBeers()
    {
        return $this->hasMany(Beer::className(), ["beer_type_id" => "id"]);
    }


    /**
     * Returns the number of beers of the given type
     * @return int|string
     */
    public function getBeerCount()
    {
        return $this->hasMany(Beer::className(), ["beer_type_id" => "id"])->count();
    }

}
