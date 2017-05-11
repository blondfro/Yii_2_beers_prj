<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Venue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venue-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-primary">
        <div class="panel-heading">Details</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'name')->
                    textInput(['maxlength' => true]) ?>

                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'city')->
                    textInput(['maxlength' => true]) ?>

                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'state')->
                    textInput(['maxlength' => true]) ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($model, 'latitude')->
                    textInput(['maxlength' => true]) ?>

                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'longitude')->
                    textInput(['maxlength' => true]) ?>

                </div>
            </div>
        </div>
    </div>






    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
