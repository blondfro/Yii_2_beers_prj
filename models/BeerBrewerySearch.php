<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Brewery;

/**
 * BeerBrewerySearch represents the model behind the search form about `app\models\Brewery`.
 */
class BeerBrewerySearch extends Brewery
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'countryId'], 'integer'],
            [['name', 'countryName', 'url'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Brewery::find();
        $query->joinWith(['country']);
        // We could have used this if we didn't have the getCountries() getter in Brewery model
        // $query->innerJoin("countries", "countries.id = breweries.countryId");


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        /* Custom sorting for custom attributes */
        $dataProvider->setSort([
            'attributes' => [
                'name',
                // 'url', /* Disables the sort on url attribute bc it doesn't really make sense to sort on this */
            ],

            'defaultOrder' => [
                'name' => SORT_ASC,
            ]
        ]);


        // Adding a custom sort for my joined attributes
        // The table is the one our relation is configured to
        $dataProvider->sort->attributes['countryName'] = [
            'asc' => ['countries.name' => SORT_ASC],
            'desc' => ['countries.name' => SORT_DESC],
        ];




        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'countryId' => $this->countryId,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'countries.name', $this->countryName]);

        return $dataProvider;
    }
}
