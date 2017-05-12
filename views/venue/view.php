<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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
                            'name'
                        ],
                    ]) ?>
                </div>
                <div class="col-md-4">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'city'
                        ],
                    ]) ?>
                </div>
                <div class="col-md-4">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'state'
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
