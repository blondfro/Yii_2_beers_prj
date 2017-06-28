<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Brewery */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Breweries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brewery-view">

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
                            'name'
                        ],
                    ]) ?>
                </div>

                <div class="col-md-4">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                           'url:url'
                        ],
                    ]) ?>
                </div>

                <div class="col-md-4">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            //'countryId'

                            // 'country.name',
                            [
                                'attribute' => 'country.name',
                                'value' => function ($data) {
                                    return Html::a($data->country->name, ['country/view', 'id' => $data->country->id]);
                                },
                                'format' => 'html',
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

    <!--    this adde in the beers that are available at this venue. -->
    <?= GridView::widget([
        'dataProvider' => $beersOfThisType,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'name',
            [
                'attribute' => 'beer_name',
                'value' => function ($data) {
                    return Html::a($data->beer_name, ['beer/view', 'id' => $data->id]);
                },
                'format' => 'html',
            ],

            ['class' => 'yii\grid\ActionColumn'],
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
