<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
        <?= Html::a('Create Beer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'beer_name',
            'beer_type',
            'beer_type_id',
            'beer_abv',
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
