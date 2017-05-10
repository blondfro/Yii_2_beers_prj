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

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Beer Details</h3>
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
                <div class="col-md-4">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'brewery_id'
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
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'rating_score',
                        ],
                    ]) ?>
                </div>
            </div>

        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">Additional Beer Details</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'brewery_id'
                        ],
                    ]) ?>
                </div>
                <div class="col-md-4">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'venue_id',
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
                           'checkin_url:url'
                        ],
                    ]) ?>
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
    </div>

</div>
