<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Beer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="beer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'beer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brewery_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'beer_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'beer_abv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'beer_ibu')->textInput() ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'venue_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'venue_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'venue_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'venue_lat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'venue_lng')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rating_score')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'checkin_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'beer_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brewery_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brewery_country')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-default']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
