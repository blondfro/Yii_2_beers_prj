<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Beer */

$this->title = 'Create a New Beer';
$this->params['breadcrumbs'][] = ['label' => 'Beers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
