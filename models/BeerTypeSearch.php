<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BeerType;

/**
 * BeerTypeSearch represents the model behind the search form about `app\models\BeerType`.
 */
class BeerTypeSearch extends BeerType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name'], 'safe'],
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
        $query = BeerType::find()
            ->joinWith('beers')
            ->from("beer_type")
            ->select(["beer_type.*", "(SELECT COUNT(beers.id) FROM beers WHERE beers.beer_type_id = beer_type.id) AS beerCount"])
            ->groupBy("beer_type.id");


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $dataProvider->setSort([
            'attributes' => [
                'name',
                'beerCount',
            ],

            /* by default, sort resultset by beer_name ASC */
            'defaultOrder' => [
                'beer_name' => SORT_ASC,
            ],

        ]);

        $dataProvider->sort->attributes['beerCount'] = [
            'asc' => ['beerCount' => SORT_ASC],
            'desc' => ['beerCount' => SORT_DESC],
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
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
