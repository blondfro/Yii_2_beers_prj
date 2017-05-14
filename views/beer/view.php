<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


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
            <div class="row">
                <div class="col-md-4">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            // 'id',
                            'beer_name'
                        ],
                    ]) ?>
                </div>
                <div class="col-md-4">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            // 'beer_type',
                            // 'beer_type_id',
                            'beerType.name'
                        ],
                    ]) ?>
                </div>
                <div class="col-md-4">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'beer_abv'
                        ],
                    ]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'beer_ibu',
                        ],
                    ]) ?>
                </div>
                <div class="col-md-4">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'rating_score'
                        ],
                    ]) ?>
                </div>

            </div>

            <div class="row">
                <div class="col-md-8">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'comment'
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
                                'value' => function ($model) {
                                    return $model->brewery->name;
                                },
                            ],

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
                                    return Html::a($data->venue->name, ['venue/view', 'id' => $data->venue_id]);
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
                            'beer_url:url'
                        ],
                    ]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'created_at:datetime'
                        ],
                    ]) ?>
                </div>
                <div class="col-md-4">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'checkin_url:url',
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
