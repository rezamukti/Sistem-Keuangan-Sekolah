<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentTransactionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-transaction-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'student_nis') ?>

    <?= $form->field($model, 'payment_for_id') ?
    >
    <?= $form->field($model, 'month') ?>

    <?= $form->field($model, 'payment_for_name') ?>

    <?= $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'price_invoice') ?>

    <?php // echo $form->field($model, 'student_paid') ?>

    <?php // echo $form->field($model, 'payment_status_id') ?>

    <?php // echo $form->field($model, 'payment_method_id') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'create_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
