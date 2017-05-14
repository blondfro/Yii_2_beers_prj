<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\BeerType;
use app\models\Brewery;
use app\models\Venue;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Beer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="beer-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-primary">
        <div class="panel-heading">Beer Details</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'beer_name')
                        ->textInput(['maxlength' => true])
                    ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'beer_type_id')
                        ->dropDownList(
                            ArrayHelper::map(
                                BeerType::find()
                                    ->asArray()
                                    ->orderBy('name')
                                    ->all(),
                                'id', 'name'),
                            [
                                'prompt' => 'What type of beer is this?',
                            ])
                        ->label('Beer type');
                    ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'beer_abv')
                        ->textInput([
                            'maxlength' => true,
                        ])
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'beer_ibu')
                        ->textInput()
                    ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'rating_score')
                        ->textInput([
                            'maxlength' => true,
                        ])
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <?= $form->field($model, 'comment')
                        ->textInput([
                            'maxlength' => true,
                        ])
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">Additional Details</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'brewery_id')
                        ->dropDownList(
                            ArrayHelper::map(
                                Brewery::find()
                                    ->asArray()
                                    ->orderBy('name')
                                    ->all(),
                                'id', 'name'),
                            [
                                'prompt' => 'What brewery does this come from',
                            ])
                        ->label('Brewery');
                    ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'venue_id')
                        ->dropDownList(
                            ArrayHelper::map(
                                Venue::find()
                                    ->asArray()
                                    ->orderBy('name')
                                    ->all(),
                                'id', 'name'),
                            [
                                'prompt' => 'What Venue will this be at?',
                            ])
                        ->label('Venue');
                    ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'beer_url')
                        ->textInput([
                            'maxlength' => true,
                        ])
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'created_at')
                        ->textInput([
                            'disabled' => true,
                        ])
                    ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'last_modified')
                        ->textInput([
                            'disabled' => true,
                        ])
                    ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'checkin_url')
                        ->textInput([
                            'maxlength' => true,
                        ])
                    ?>
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
    </div>




<!--
    <? $form->field($model, 'beer_type')->
    textInput(['maxlength' => true]) ?>
    <? $form->field($model, 'beer_type_id')->textInput() ?>
    -->















<!--
    <?= $form->field($model, 'brewery_id')
        ->textInput()
    ?>
-->


    <!--
    <?= $form->field($model, 'venue_id')
        ->textInput()
    ?>
    -->


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-default pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
