<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <h2>О нас второй раз</h2>

    <p>
        This is the About page. You may modify the following file to customize its content!</br>
        Hello there!
    </p>



    <code><?= __FILE__ ?></code>
</div>
