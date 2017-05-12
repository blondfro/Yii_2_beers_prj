<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Country;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Brewery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="brewery-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-primary">
        <div class="panel-heading">Details</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'name')->textInput
                    (['maxlength' => true]) ?>

                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'url')->textInput
                    (['maxlength' => true]) ?>

                </div>
                <div class="col-md-4">

                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'countryId')
                        ->dropDownList(
                            ArrayHelper::map(
                                Country::find()
                                    ->asArray()
                                    ->orderBy('name')
                                    ->all(),
                                'id', 'name'),
                            [
                                'prompt' => 'What country is this brewery in',
                            ])
                        ->label('Country');
                    ?>
                </div>
            </div>
        </div>
    </div>
<!--
    <?= $form->field($model, 'countryId')->textInput() ?>
-->




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-default pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
