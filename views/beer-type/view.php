<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\BeerType */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Beer Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beer-type-view">

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
                            // 'name',
                            [
                                'attribute' => 'name',
                                'value' => function ($data) {
                                    return Html::a($data->name, ['beer/index', 'BeerSearch[beer_type_id]' => $data->id]);
                                },
                                'format' => 'html',
                            ],

                        ],
                    ]) ?>
                </div>

            </div>
        </div>
    </div>


    <?= GridView::widget([
        'dataProvider' => $beersOfThisType,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'beer_name',

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
