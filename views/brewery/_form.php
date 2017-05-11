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
<!--
    <?= $form->field($model, 'countryId')->textInput() ?>
-->
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

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
        ->label('Venue');
    ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
