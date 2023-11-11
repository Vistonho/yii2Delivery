<?php

use yii\bootstrap5\Html;

?>

<div class="card" style="width: 18rem;">
    <!-- <img src="..." class="card-img-top" alt="..."> -->
    <?= Html::img('@web/img/' . $model->image, ['class' => 'card-img-top', 'alt' => '...']); ?>
    <div class="card-body">
        <!-- <h5 class="card-title">Card title</h5> -->
        <?= Html::a("<h5 class=\"card-title\">{$model->title}</h5>", ['view', 'id' => $model->id]); ?>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
        <?= (Yii::$app->user->identity) ? Html::a("В корзину", '', ['class' => 'btn btn-primary']) : ''; ?>
    </div>
</div>