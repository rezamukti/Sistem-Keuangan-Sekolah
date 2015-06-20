<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\Gender;
use app\models\Religion;
use app\models\Province;
use app\models\Regency;
use app\models\City;
use app\models\Kelas;
use app\models\StudentStatus;

/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form yii\widgets\ActiveForm */

$gender=Gender::find()->all();
$listGender=ArrayHelper::map($gender,'id','name');

$religion=Religion::find()->all();
$listReligion=ArrayHelper::map($religion,'id','name');

$province=Province::find()->all();
$listProvince=ArrayHelper::map($province,'id','name');

$regency=Regency::find()->all();
$listRegency=ArrayHelper::map($regency,'id','name');

$city=City::find()->all();
$listCity=ArrayHelper::map($city,'id','name');

$kelas=Kelas::find()->all();
$listKelas=ArrayHelper::map($kelas,'id','name');

$student_status=StudentStatus::find()->all();
$listStudentStatus=ArrayHelper::map($student_status,'id','name');



?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'nis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

   <!--  <?= $form->field($model, 'nisn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth_place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth_date')->textInput() ?>

    <?= $form->field($model, 'gender_id')->dropDownList($listGender, ['prompt'=>'Pilih..'])?>

    <?= $form->field($model, 'religion_id')->dropDownList($listReligion, ['prompt'=>'Pilih..']) ?>

    <?= $form->field($model, 'mother_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'father_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_occupation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province_id')->dropDownList($listProvince, ['prompt'=>'Pilih..'])?>

    <?= $form->field($model, 'regency_id')->dropDownList($listRegency, ['prompt'=>'Pilih..']) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city_id')->dropDownList($listCity, ['prompt'=>'Pilih..']) ?>

    <?= $form->field($model, 'rt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'postal_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'class_id')->dropDownList($listKelas, ['prompt'=>'Pilih..']) ?>

    <?= $form->field($model, 'student_status_id')->dropDownList($listStudentStatus, ['prompt'=>'Pilih..']) ?>
 -->
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Simpan') : Yii::t('app', 'Simpan'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
