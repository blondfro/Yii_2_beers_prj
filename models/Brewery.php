<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "breweries".
 *
 * @property integer $id
 * @property integer $countryId
 * @property string $name
 * @property string $url
 */
class Brewery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'breweries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['countryId', 'name', 'url'], 'required'],
            [['countryId'], 'integer'],
            [['name'], 'string', 'max' => 9],
            [['url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'countryId' => 'Country ID',
            'name' => 'Name',
            'url' => 'Url',
        ];
    }
}
