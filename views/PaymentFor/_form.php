<?php

 /**
  * @package    KeuanganSekolah
  * @author     Reza Mukti <ycared@gmail.com>
  * @copyright  Copyright (c) 2015, KaryaKami.
  * @link       http://karyakami.com
  */


use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Semester;
use yii\helpers\ArrayHelper;

$all=Semester::find()->all();
$listData=ArrayHelper::map($all,'id','name');

/* @var $this yii\web\View */
/* @var $model app\models\PaymentFor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-for-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'semester_id')->dropDownList($listData,['prompt'=>'Pilih...']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Simpan') : Yii::t('app', 'Simpan'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
