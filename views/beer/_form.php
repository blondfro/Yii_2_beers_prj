<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Beer */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin(); ?>

<div class="beer-form">

    <div class="panel panel-default">
        <div class="panel-heading">Beer: </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'beer_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'beer_type')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'beer_abv')->textInput(['maxlength' => true]) ?>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'beer_ibu')->textInput() ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'beer_url')->textInput(['maxlength' => true]) ?>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'brewery_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'brewery_country')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'brewery_url')->textInput(['maxlength' => true]) ?>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>
                </div>

            </div>

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Venue: </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'venue_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'venue_city')->textInput(['maxlength' => true]) ?>

                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'venue_state')->textInput(['maxlength' => true]) ?>

                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'venue_lat')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'venue_lng')->textInput(['maxlength' => true]) ?>
                </div>

            </div>





        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Miscellaneous:</div>
        <div class="panel-body">
            <div class="col-md-4">
                <?= $form->field($model, 'rating_score')->textInput(['maxlength' => true]) ?>

            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'created_at')->textInput() ?>

            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'checkin_url')->textInput(['maxlength' => true]) ?>

            </div>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-default']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
