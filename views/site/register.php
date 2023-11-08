<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var ActiveForm $form */
?>
<div class="site-register">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'surname') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'phone') ?>
        <?= $form->field($model, 'password') ?>
        <?= $form->field($model, 'role_id') ?>
        <?= $form->field($model, 'created_at') ?>
        <?= $form->field($model, 'patronymic') ?>
        <?= $form->field($model, 'login') ?>
        <?= $form->field($model, 'photo') ?>
        <?= $form->field($model, 'auth_key') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-register -->
