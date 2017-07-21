<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\Venue */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Venues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venue-view">

    <div class="panel panel-primary">
        <div class="panel-heading small">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            //'name',

                            // changes name to be a link to the beers view filtering based on the
                            // currently viewed venue id.
                            [
                                'attribute' => 'name',
                                'value' => function ($data) {
                                    return Html::a($data->name, ['beer/index', 'BeerSearch[venue_id]' => $data->id]);
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
                                'attribute' => 'city',
                                'value' => function ($data) {
                                    return (!empty($data->city) ? $data->city : "<span class='not-set'>not set</span>");
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
                                'attribute' => 'state',
                                'value' => function ($data) {
                                    return (!empty($data->state) ? $data->state : "<span class='not-set'>not set</span>");
                                },
                                'format' => 'html',
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'latitude'
                        ],
                    ]) ?>
                </div>
                <div class="col-md-2">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'longitude'
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

    <?= Html::tag('h4', "These are all the beers available at this venue:"); ?>
    <!--    this displays all beers that are available at this venue -->
    <?= GridView::widget([
        'dataProvider' => $beersOfThisType,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'beer_name',

            [
                'controller' => 'beer',
                'class' => 'yii\grid\ActionColumn',
            ],
        ],
    ]); ?>


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
