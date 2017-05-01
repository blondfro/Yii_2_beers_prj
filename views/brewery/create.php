<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Brewery */

$this->title = 'Create Brewery';
$this->params['breadcrumbs'][] = ['label' => 'Breweries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brewery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
