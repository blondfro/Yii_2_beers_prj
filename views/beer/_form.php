<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\BeerType;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Beer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="beer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'beer_name')
        ->textInput(['maxlength' => true])
    ?>

    <? //= $form->field($model, 'beer_type')->textInput(['maxlength' => true]) ?>
    <? //= $form->field($model, 'beer_type_id')->textInput() ?>
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

    <?= $form->field($model, 'beer_abv')
        ->textInput([
            'maxlength' => true,
        ])
    ?>

    <?= $form->field($model, 'beer_ibu')
        ->textInput()
    ?>

    <?= $form->field($model, 'comment')
        ->textInput([
            'maxlength' => true,
        ])
    ?>

    <?= $form->field($model, 'rating_score')
        ->textInput([
            'maxlength' => true,
        ])
    ?>

    <?= $form->field($model, 'created_at')
        ->textInput()
    ?>

    <?= $form->field($model, 'checkin_url')
        ->textInput([
            'maxlength' => true,
        ])
    ?>

    <?= $form->field($model, 'beer_url')
        ->textInput([
            'maxlength' => true,
        ])
    ?>

    <?= $form->field($model, 'brewery_id')
        ->textInput()
    ?>

    <?= $form->field($model, 'venue_id')
        ->textInput()
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
