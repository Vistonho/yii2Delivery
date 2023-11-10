<?php

use yii\bootstrap5\Html;
?>
<div class="admin-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <?= Html::a('категории', '/admin/category', ['class' => 'btn btn-primary']) ?>
    <?= Html::a('заказы', '/admin/order', ['class' => 'btn btn-primary']) ?>
</div>

