<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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
            </div>
            <div class="row">
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
