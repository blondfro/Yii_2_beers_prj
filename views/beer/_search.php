<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BeerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="beer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'beer_name') ?>

    <?= $form->field($model, 'beer_type') ?>

    <?= $form->field($model, 'beer_type_id') ?>

    <?= $form->field($model, 'beer_abv') ?>

    <?php // echo $form->field($model, 'beer_ibu') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'rating_score') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'checkin_url') ?>

    <?php // echo $form->field($model, 'beer_url') ?>

    <?php // echo $form->field($model, 'brewery_id') ?>

    <?php // echo $form->field($model, 'venue_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
