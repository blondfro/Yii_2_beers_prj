<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-view">

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
        <div class="panel-heading">Panel heading without title</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-1">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id'
                        ],
                    ]) ?>
                </div>
                <div class="col-md-5">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'name:ntext',
                        ],
                    ]) ?>
                </div>

            </div>
        </div>
    </div>



</div>
