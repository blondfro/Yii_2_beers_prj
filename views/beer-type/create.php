<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BeerType */

$this->title = 'Create Beer Type';
$this->params['breadcrumbs'][] = ['label' => 'Beer Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beer-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
