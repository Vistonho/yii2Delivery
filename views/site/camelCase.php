<?php

/** @var yii\web\View $this */

use app\models\User;
use yii\helpers\Html;
use yii\helpers\VarDumper;

$this->title = 'Информация о компании';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('/web/test_css/about.css');

?>
<div class="site-about">
    <h1>CamelCase Routing Test</h1>

    <div class="my-images" style="display: flex; gap: 20px;">
        <img src=" <?= Yii::getAlias('@web') . '/test_images/2026.jpg' ?> " alt="2026year" style="max-width: 50%;">

        <?= Html::img('@web/test_images/2027.jpg', ['alt' => '2027year', 'style' => "max-width: 50%;"]); ?>
    </div>

</div>


