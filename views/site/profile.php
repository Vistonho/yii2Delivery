<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Личный кабинет';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <h3>Здравствуйте, <?= Yii::$app->user->identity->login ?>!</h3>
    <span>Ваша аватарка: </span>
    <img src="<?= '/web/test_images/' . Yii::$app->user->identity->photo ?>" alt="image" style="max-width: 10%;">

    <?php $form = ActiveForm::begin(['id' => 'photo-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'photo')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'photo-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>