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
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Добро пожаловать в мир Delivery - вашего надежного партнера по доставке! Мы задаем новые стандарты в индустрии доставки и стремимся обеспечить наших клиентов быстрыми, надежными и удобными услугами доставки.</p>

    <p>📩 Электронная почта: info@example.com</p>
    <p>☎️ Телефон: +7 (921) 305-85-37</p>

    <p>Не стесняйтесь обращаться, мы всегда готовы ответить на ваши вопросы, предоставить помощь или услышать ваши отзывы.</p>
    <code><?= __FILE__ ?></code>

    <div></div>

    <div class="my-images" style="display: flex; gap: 20px;">
        <img src=" <?= Yii::getAlias('@web') . '/test_images/2026.jpg' ?> " alt="2026year" style="max-width: 50%;">

        <?= Html::img('@web/test_images/2027.jpg', ['alt' => '2027year', 'style' => "max-width: 50%;"]); ?>
    </div>
    
    <!-- <img src="/web/test_images/2026.jpg" alt="2026year" style="max-width: 50%;"> -->
    <!-- <img src="../../web/test_images/2026.jpg" alt="2026year" style="max-width: 50%;"> -->


</div>


