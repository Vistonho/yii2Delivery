<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Эта странца о нас переведа на русский язык благодаря трудолюбивым разработчикам!
    </p>

    <code><?= __FILE__ ?></code>
</div>
