<?php

use app\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\admin\models\OrderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'created_at',
            'address',
            // 'user_id',
            // 'courier_id',
            // 'status_id',
            [
                'label' => 'Статус',
                'attribute' => 'status_id',
                'value' => fn($model) => $status[$model->status_id],
                'filter' => $status,
            ], 
            [
                'label' => 'Действия',
                'format' => 'html',
                'value' => function($model) {
                    return "<div>" 
                        . Html::a('Принять', ['set-status', 'id' => $model->id, 'status' => 1], ['class' => 'btn btn-outline-success d-block'])
                        . Html::a('Отменить', ['set-status', 'id' => $model->id, 'status' => 2], ['class' => 'btn btn-outline-danger d-block'])
                        . "</div>"
                        ;
                }
            ]
            //'count',
            //'cost',
            //'time_delivery',
            //'pay_type_id',
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, Order $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id' => $model->id]);
            //      }
            // ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
