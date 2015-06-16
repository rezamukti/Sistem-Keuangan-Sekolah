<?php

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
        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'student_nis',
            [
                'attribute'=>'student_nis',
                'label'=>'Nama Siswa/i',
                'value' => $student->full_name
            ],
            // 'payment_for_id',
            'payment_for_name',
            'month',
            'year',
            // 'price_invoice',
            'student_paid',
            // 'payment_status_id',
            [
                'attribute'=>'payment_method_id',
                'value' => $paymentMethod->name
            ],
            // 'user_id',
            'create_at:datetime',
        ],
    ]) ?>

</div>
