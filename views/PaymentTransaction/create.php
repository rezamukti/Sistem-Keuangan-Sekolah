<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PaymentTransaction */

$this->title = Yii::t('app', 'Buat Transaksi Pembayaran');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Pembayaran'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-transaction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
