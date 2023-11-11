<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductTest $model */

$this->title = 'Create Product Test';
$this->params['breadcrumbs'][] = ['label' => 'Product Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-test-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model', 'category')) ?>

</div>
