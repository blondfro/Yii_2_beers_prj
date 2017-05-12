<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\BeerType;
use app\models\Brewery;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BeerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Beers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create a New Beer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'beer_name',
            // 'beer_type',
            // 'beer_type_id',
            'beer_abv',

            [
                'attribute' => 'beerTypeName',
                'value' => function($james) {
                    return $james->beerType->name;
                },
                'filter' => Html::activeDropDownList($searchModel,
                    'beer_type_id', ArrayHelper::map(BeerType::find()
                        ->asArray()
                        ->distinct()
                        ->orderBy('name')
                        ->all(),
                    'id', 'name'),
                    [
                        'class'=>'form-control',
                        'prompt' => 'All',
                    ]
                ),
                'contentOptions' => ['style' => 'width: 300px;'],

            ],

            [
                'attribute' => 'breweryName',
                'value' => function($james) {
                    return $james->breweryName->name;
                },
                'filter' => Html::activeDropDownList($searchModel,
                    'brewery_id', ArrayHelper::map(Brewery::find()
                        ->asArray()
                        ->distinct()
                        ->orderBy('name')
                        ->all(),
                        'id', 'name'),
                    [
                        'class'=>'form-control',
                        'prompt' => 'All',
                    ]
                ),
                'contentOptions' => ['style' => 'width: 300px;'],

            ],

            // 'beer_ibu',
            // 'comment',
            // 'rating_score',
            // 'created_at',
            // 'checkin_url:url',
            // 'beer_url:url',
            // 'brewery_id',
            // 'venue_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
