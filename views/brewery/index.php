<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BeerBrewerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Breweries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brewery-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create a New Brewery', ['create'], ['class' => 'btn btn-success']) ?>
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
            // 'countryId',
            'name',

            [
                'attribute' => 'countryName',
                'value' => function ($data) {
                    return Html::a($data->country->name, ['country/view', 'id' => $data->countryId]);
                },
                'format' => 'html',
            ],

            // 'url:url',
            [
                'attribute' => 'url',
                'label' => 'URL',
                'value' => function ($data) {
                    if (!empty($data->url)) {
                        return Html::a("<span class='glyphicon glyphicon-globe'></span>", $data->url, [
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
