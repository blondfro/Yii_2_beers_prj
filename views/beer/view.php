<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Beer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Beers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'beer_name',
            'beer_type',
            'beer_type_id',
            'beer_abv',
            'beer_ibu',
            'comment',
            'rating_score',
            'created_at',
            'checkin_url:url',
            'beer_url:url',
            'brewery_id',
            'venue_id',
        ],
    ]) ?>

</div>
