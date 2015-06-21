<?php

 /**
  * @package    KeuanganSekolah
  * @author     Reza Mukti <ycared@gmail.com>
  * @copyright  Copyright (c) 2015, KaryaKami.
  * @link       http://karyakami.com
  */


use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use app\models\PaymentFor;
use app\models\PaymentMethod;

$paymentFor=PaymentFor::find()->all();
$listpaymentFor=ArrayHelper::map($paymentFor,'id','name');

$paymentMethod=PaymentMethod::find()->all();
$listPaymentMethod=ArrayHelper::map($paymentMethod,'id','name');


/* @var $this yii\web\View */
/* @var $model app\models\PaymentTransaction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-transaction-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php // echo $form->errorSummary($model); ?>

    <?= $form->field($model, 'student_nis')->textInput() ?>

    <?= $form->field($model, 'payment_for_id')->dropDownList($listpaymentFor, ['prompt'=>'Pilih..']) ?>

    <?= $form->field($model, 'student_paid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'month')->dropDownList(['Januari' => 'Januari', 'Febuari'=>'Febuari', 'Maret'=>'Maret', 'April'=>'April', 'Mei' =>'Mei', 'Juni'=>'Juni', 'Juli'=>'Juli', 'Agustus' =>'Agustus', 'September' =>'September', 'Oktober'=>'Oktober', 'November'=>'November', 'Desember'=>'Desember'], ['prompt'=>'Pilih..']) ?>

    <?= $form->field($model, 'payment_method_id')->dropDownList($listPaymentMethod, ['id'=>1], ['prompt'=>'Pilih..']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Simpan') : Yii::t('app', 'Simpan'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
