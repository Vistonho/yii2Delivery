<?php

use app\models\ProductTest;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\ProductTestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Product Tests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-test-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="m-5">
        <div>Сортировка: </div>
        <?= $dataProvider->sort->link('id') . ' | ' . $dataProvider->sort->link('title') ?>
    </div>
    

    <?php Pjax::begin(); ?>
    <?php $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        // 'layout' => "{pager}\n{summary}\n<div class='mt-3'>{pager}</div>",
        'layout' => "{pager}\n<div class='d-flex gap-3'>{items}</div>\n<div class='mt-3'>{pager}</div>",
        'pager' => [
            'class' => \yii\bootstrap5\LinkPager::class,
            'linkOptions' => ['class' => 'page-link mt-5'],
        ],
        'itemOptions' => ['class' => 'item'],
        'itemView' => 'item',
        // 'itemOptions' => [
        //     'class' => 'd-flex',
        // ]
    ]) ?>

    <?php Pjax::end(); ?>

</div>
