<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-contact">
    <h3><?= Html::encode($this->title) ?></h3>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'register-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>

                    <? echo $form->field($model, 'name') ?>
                    <? echo $form->field($model, 'surname') ?>
                    <? echo $form->field($model, 'patronymic') ?>

                    <? echo $form->field($model, 'login')->textInput(['autofocus' => true]) ?>

                    <? echo $form->field($model, 'email') ?>
                    <? echo $form->field($model, 'phone') ?>

                    <? echo $form->field($model, 'password')->passwordInput() ?>

                    <? echo $form->field($model, 'password_repeat')->passwordInput() ?>

                    <?= $form->field($model, 'imageFile')->fileInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

</div>