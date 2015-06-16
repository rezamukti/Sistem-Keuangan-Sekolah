<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaymentTransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Pembayaran');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-transaction-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Buat Transaksi Pembayaran'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'student_nis',
            // 'payment_for_id',
            'payment_for_name',
            'month',
            'year',
            // 'price_invoice',
            'student_paid',
            // 'payment_status_id',
            // 'payment_method_id',
            // 'user_id',
            [
                'attribute' => 'create_at',
                'format' =>  ['date', 'php:d-m-Y H:i:s'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
                'contentOptions' => ['style' => 'width:70px;text-align:center'],
            ],
        ],
    ]); ?>

</div>
