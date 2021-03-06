<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\slider\Slider;


/* @var $this yii\web\View */
/* @var $model app\models\Beer */

$this->title = $model->beer_name;
$this->params['breadcrumbs'][] = ['label' => 'Beers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beer-view">

    <div class="panel panel-primary">
        <div class="panel-heading small">
            <div class="panel-title">
                <h1><?= Html::encode($this->title) ?></h1>
            </div>
        </div>
        <div class="panel-body">
            <div class="row" style="padding-bottom: 10px; padding-top: 15px">
                <div class="col-md-4">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            // 'id',
                            'beer_name',
                        ],
                    ]) ?>
                </div>
                <div class="col-md-4">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            // 'beer_type',
                            // 'beer_type_id',

                            // 'beerType.name',
                            [
                                'attribute' => 'beerType.name',
                                'value' => function ($data) {
                                    return Html::a($data->beerType->name, ['beer/index', 'BeerSearch[beer_type_id]' => $data->beer_type_id]);
                                },
                                'format' => 'html',
                            ],
                        ],
                    ]) ?>
                </div>
                <div class="col-md-4 text-center">

                    <div class="row">
                        <div class="col-md-5 col-md-pull-1">
                            <h5 style="font-weight: bold">Beer Abv</h5>
                        </div>
                        <div class=" col-md-pull-1 slider slider-horizontal">
                            <?=
                            Slider::widget(
                                [
                                    'name' => 'rating_2',
                                    'value' => $model->beer_abv,
                                    'sliderColor' => Slider::TYPE_PRIMARY,
                                    'handleColor' => Slider::TYPE_PRIMARY,
                                    'pluginOptions' => [
                                        'min' => 2,
                                        'max' => 12,
                                        'step' => 0.01,
                                        'precision' => 2,
                                        'tooltip' => 'always',
                                        'value' => 3.0,
                                    ],
                                    'options' => ['disabled' => true]
                                ]);
                            ?>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row" style="padding-bottom: 10px; padding-top: 15px">
                <div class="col-md-4 text-center">
                    <div class="row">

                        <div class="col-md-5 col-md-pull-1">
                            <h5 style="font-weight: bold">Beer ibu</h5>
                        </div>
                        <div class="col-md-7 col-md-pull-1 slider
                        slider-horizontal">
                            <?=
                            Slider::widget(
                                [
                                    'name' => 'rating_2',
                                    'value' => $model->beer_ibu,
                                    'sliderColor' => Slider::TYPE_PRIMARY,
                                    'handleColor' => Slider::TYPE_PRIMARY,
                                    'pluginOptions' => [
                                        'min' => 5,
                                        'max' => 120,
                                        'step' => 1,
                                        'tooltip' => 'always',
                                        'value' => 3.0,
                                        'selection' => 'none',
                                        'ticks' => [0, 60, 120],
                                        'ticks_labels' => ["low", "med", "high"],
                                    ],
                                    'options' => ['disabled' => true]
                                ]);
                            ?>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 text-center">
                    <div class="row">
                        <div class="col-md-5">
                            <h5 style="font-weight: bold">Rating Score: </h5>
                        </div>
                        <div class="col-md-7 col-md-pull-1 slider
                        slider-horizontal">
                            <?=
                            Slider::widget(
                                [
                                    'name' => 'rating_2',
                                    'value' => $model->rating_score,
                                    'sliderColor' => Slider::TYPE_PRIMARY,
                                    'handleColor' => Slider::TYPE_PRIMARY,
                                    'pluginOptions' => [
                                        'handle' => 'square',
                                        'min' => 0,
                                        'max' => 5,
                                        'step' => 0.5,
                                        'precision' => 2,
                                        'tooltip' => 'always',
                                        'value' => 3.0,
                                        'selection' => 'before',
                                    ],
                                    'options' => ['disabled' => true]
                                ]);
                            ?>
                        </div>
                    </div>

                </div>

                <div class="col-md-4">

                </div>
            </div>

            <div class="row" style="padding-bottom: 10px; padding-top: 15px">
                <div class="col-md-8">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'comment',
                        ],
                    ]) ?>
                </div>
                <div class="col-md-4">

                </div>
            </div>

        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">Additional Details</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            //'brewery_id'
                            [
                                'attribute' => 'breweryName',
                                'value' => function ($data) {
                                    return Html::a($data->brewery->name, ['brewery/view', 'id' => $data->brewery_id]);
                                },
                                'format' => 'html',
                            ]
                        ],


                    ]) ?>
                </div>
                <div class="col-md-4">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            //'venue_id',

                            [
                                'attribute' => 'venueName',
                                'value' => function ($data) {
                                    if ($data->venue_id > 0) {
                                        return Html::a($data->venue->name, ['venue/view', 'id' => $data->venue_id]);
                                    } else {
                                        return "Not set";
                                    }
                                },
                                'format' => 'html',
                            ],

                        ],
                    ]) ?>
                </div>
                <div class="col-md-4">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            [
                                'attribute' => 'beer_url',
                                'value' => function ($data) {
                                    return Html::a($data->beer_url, $data->beer_url, [
                                        'title' => 'Title Tag',
                                        'target' => '_blank',
                                        'alt' => 'Alt Tag',
                                    ]);
                                },
                                'format' => 'raw',
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'created_at:datetime',
                            'last_modified:datetime',
                        ],
                    ]) ?>
                </div>
                <div class="col-md-4">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            [
                                'attribute' => 'checkin_url',
                                'value' => function ($data) {
                                    return Html::a($data->checkin_url, $data->checkin_url, [
                                        'title' => 'Title Tag',
                                        'target' => '_blank',
                                        'alt' => 'Alt Tag',
                                    ]);
                                },
                                'format' => 'raw',
                            ],
                        ],
                    ]) ?>
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
    </div>


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger pull-right',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
