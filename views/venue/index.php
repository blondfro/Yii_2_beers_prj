<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VenueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Venues';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venue-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create a New Venue', ['create'], ['class' => 'btn btn-success']) ?>
        <?php
        if ($_SERVER['QUERY_STRING']) {
            echo Html::a('Reset filters', ['index'], ['class' => 'btn btn-info pull-right']);
        }
        ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',

            [
                'attribute' => 'city',
                'value' => function ($data) {
                    return (!empty($data->city) ? $data->city : "<span class='not-set'>not set</span>");
                },
                'format' => 'html',
            ],

            [
                'attribute' => 'state',
                'value' => function ($data) {
                    return (!empty($data->state) ? $data->state : "<span class='not-set'>not set</span>");
                },
                'format' => 'html',
            ],

            [
                'label' => 'Google Map',
                'value' => function ($data) {
                    return Html::a($data->latitude . ", " . $data->longitude, "http://maps.google.com/maps?z=12&t=m&q=loc:" . $data->latitude . "+" . $data->longitude, ['target' => '_blank']);
                },
                'format' => 'raw',
            ],
            //'latitude',
            // 'longitude',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
