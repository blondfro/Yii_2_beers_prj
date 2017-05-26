<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * BeerSearch represents the model behind the search form about `app\models\Beer`.
 */
class BeerSearchByType extends BeerSearch
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'beer_type_id', 'beer_ibu', 'brewery_id', 'venue_id'], 'integer'],
            [['beer_name', 'beer_type', 'comment', 'created_at', 'checkin_url', 'beer_url'], 'safe'],
            [['beer_abv', 'rating_score'], 'number'],
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
        $query = Beer::find()
            ->joinWith('beerType')
            ->joinWith('brewery')
            ->joinWith('venue')/* this is name of the relation in Beers model */

            /* Custom filter for just this type of beer */
            ->where(['beer_type_id' => $params['id']]);


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        /* Custom sorting for custom attributes */
        $dataProvider->setSort([
            'attributes' => [
                'beer_name',
                'beer_abv',

                'beerTypeName' => [
                    'asc' => ['beer_type.name' => SORT_ASC],
                    'desc' => ['beer_type.name' => SORT_DESC],
                    'default' => SORT_ASC
                ],
                'breweryName' => [
                    'asc' => ['brewery.name' => SORT_ASC],
                    'desc' => ['brewery.name' => SORT_DESC],
                    'default' => SORT_ASC
                ],
            ],

            /* by default, sort resultset by beer_name ASC */
            'defaultOrder' => [
                'beer_name' => SORT_ASC,
            ],

        ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'beer_type_id' => $this->beer_type_id,
            'beer_abv' => $this->beer_abv,
            'beer_ibu' => $this->beer_ibu,
            'rating_score' => $this->rating_score,
            'created_at' => $this->created_at,
            'brewery_id' => $this->brewery_id,
            'venue_id' => $this->venue_id,
        ]);

        $query->andFilterWhere(['like', 'beer_name', $this->beer_name])
            ->andFilterWhere(['like', 'beer_type', $this->beer_type])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'checkin_url', $this->checkin_url])
            ->andFilterWhere(['like', 'beer_url', $this->beer_url]);

        return $dataProvider;
    }
}
