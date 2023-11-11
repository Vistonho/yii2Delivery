<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\ProductTest $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Product Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-test-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            [   
                'attribute' => 'image',
                'format' => 'html',
                'value' => Html::img('@web/img/' . $model->image, ['class' => 'image-min']),
            ],
            [   
                'attribute' => 'category_id',
                // 'format' => 'html',
                'value' => $category[$model->category_id],
            ],
            // 'category_id',
        ],
    ]) ?>

    <?php $this->registerCssFile('@web/css/product.css'); ?>

</div>
