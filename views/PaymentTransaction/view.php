<?php

 /**
  * @package    KeuanganSekolah
  * @author     Reza Mukti <ycared@gmail.com>
  * @copyright  Copyright (c) 2015, KaryaKami.
  * @link       http://karyakami.com
  */


use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\PaymentMethod;
use app\models\Student;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentTransaction */

$paymentMethod = PaymentMethod::findOne($model->payment_method_id);
$student = Student::findOne(['nis' => $model->student_nis]);

$this->title = 'Detail Pembayaran';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detail Pembayaran'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-transaction-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Perbarui Data'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cetak Data'), ['pdf', 'id' => $model->id], ['class' => 'btn btn-success','target'=>'_blank']) ?>
        <?php 
        //     Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
        //     'class' => 'btn btn-danger',
        //     'data' => [
        //         'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
        //         'method' => 'post',
        //     ],
        // ]) 
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'payment_for_id',
            // 'price_invoice',
            // 'payment_status_id',
            // 'user_id',

            'student_nis',
            [
                'attribute'=>'student_nis',
                'label'=>'Nama Siswa',
                'value' => $student->full_name
            ],
            'payment_for_name',
            'month',
            'year',
            'student_paid',
            [
                'attribute'=>'payment_method_id',
                'value' => $paymentMethod->name
            ],
            'create_at:datetime',
        ],
    ]) ?>

</div>
