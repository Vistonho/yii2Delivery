<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\VarDumper;

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('/web/test_css/whereFind.css')

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Не стесняйтесь обращаться, мы всегда готовы ответить на ваши вопросы, предоставить помощь или услышать ваши отзывы.</p>

    <p>📍 Адрес: набережная реки Смоленки, дом 1</p>

    <div class="my-content"></div>

    

    <code><?= __FILE__ ?></code>


</div>


