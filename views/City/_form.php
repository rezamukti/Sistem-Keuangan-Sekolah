<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Regency;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\City */
/* @var $form yii\widgets\ActiveForm */

$regency=Regency::find()->all();
$listData=ArrayHelper::map($regency,'id','name');



?>

<div class="city-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'regency_id')->dropDownList($listData,['prompt'=>'Select...']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
