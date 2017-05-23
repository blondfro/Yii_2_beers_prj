<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\BeerType;
use app\models\Brewery;
use yii\helpers\ArrayHelper;
use kartik\slider\Slider;

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
        <?php
        if ($_SERVER['QUERY_STRING']) {
            echo Html::a('Reset filters', ['index'], ['class' => 'btn btn-info pull-right']);
        }
        ?>    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'beer_name',
            // 'beer_type',
            // 'beer_type_id',

            // 'beer_abv',
            [
                'attribute' => 'beer_abv',
                'value' => 'beer_abv',
                'filter' => Slider::widget([
                    'name' => 'beer_abv',
                    // 'value' => 0,
                    'sliderColor' => Slider::TYPE_GREY,
                    // 'handleColor' => Slider::TYPE_DANGER,
                    'pluginOptions' => [
                        // 'handle' => 'triangle',
                        // 'tooltip' => 'always',
                        'range' => true,
                        'min' => 2,
                        'max' => 12,
                        'step' => 0.01,
                        'precision' => 2,
                    ],
                    'pluginEvents' => [
                        'slideStart' => 'function() { console.log("slideStart"); }',
                        'slide' => 'function() { console.log("slide"); }',
                        'slideStop' => 'function() { console.log("slideStop"); }',
                        'slideEnabled' => 'function() { console.log("slideEnabled"); }',
                        'slideDisabled' => 'function() { console.log("slideDisabled"); }',
                    ],
                ])
            ],

            [
                'attribute' => 'beerTypeName',
                'value' => function($james) {
                    return Html::a($james->beerType->name, [
                            'beer-type/view',
                            'id'=>$james->beerType->id,
                            ],
                            [
                    'title' => 'See ' . $james->beerType->name . '\'s details',
                        ]);
                },
                'format' => 'raw',
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
                    return Html::a($james->brewery->name, [
                        'brewery/view',
                        'id' => $james->brewery->id,
                    ],
                        [
                            'title' => 'See ' . $james->brewery->name . '\'s details',
                        ]);
                },
                'format' => 'raw',
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
            [
                'attribute' => 'beer_url',
                'label' => 'URL',
                'value' => function ($data) {
                    if (!empty($data->beer_url)) {
                        return Html::a("<span class='glyphicon glyphicon-globe'></span>", $data->beer_url, [
                            'target' => '_blank',
                        ]);
                    }
                },
                'format' => 'raw',
                'filter' => '', /* Disables filter on this column from $searchModel */
                'contentOptions' => [
                    'style' => 'text-align: center; width: 30px;',
                ],
            ],

            // 'brewery_id',
            // 'venue_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
