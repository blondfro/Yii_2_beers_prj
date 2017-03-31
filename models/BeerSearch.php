<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Beer;

/**
 * BeerSearch represents the model behind the search form about `app\models\Beer`.
 */
class BeerSearch extends Beer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'beer_ibu'], 'integer'],
            [['beer_name', 'brewery_name', 'beer_type', 'comment', 'venue_name', 'venue_city', 'venue_state', 'created_at', 'checkin_url', 'beer_url', 'brewery_url', 'brewery_country'], 'safe'],
            [['beer_abv', 'venue_lat', 'venue_lng', 'rating_score'], 'number'],
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
        $query = Beer::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'beer_abv' => $this->beer_abv,
            'beer_ibu' => $this->beer_ibu,
            'venue_lat' => $this->venue_lat,
            'venue_lng' => $this->venue_lng,
            'rating_score' => $this->rating_score,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'beer_name', $this->beer_name])
            ->andFilterWhere(['like', 'brewery_name', $this->brewery_name])
            ->andFilterWhere(['like', 'beer_type', $this->beer_type])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'venue_name', $this->venue_name])
            ->andFilterWhere(['like', 'venue_city', $this->venue_city])
            ->andFilterWhere(['like', 'venue_state', $this->venue_state])
            ->andFilterWhere(['like', 'checkin_url', $this->checkin_url])
            ->andFilterWhere(['like', 'beer_url', $this->beer_url])
            ->andFilterWhere(['like', 'brewery_url', $this->brewery_url])
            ->andFilterWhere(['like', 'brewery_country', $this->brewery_country]);

        return $dataProvider;
    }
}
