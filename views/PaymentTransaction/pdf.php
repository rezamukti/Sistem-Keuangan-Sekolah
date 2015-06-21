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
use app\models\SettingSystem;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentTransaction */

$paymentMethod = PaymentMethod::findOne($model->payment_method_id);
$student = Student::findOne(['nis' => $model->student_nis]);
$settingSystem = SettingSystem::findOne(['id' => 1]);
?>



<div style="text-align:center">
    <div style="font-size:25px; font-weight:bold"><?=$settingSystem->name?></div>
    <div><?=$settingSystem->address?></div>
</div>
<hr>
<div class="payment-transaction-view">
    <div style="text-align:center">
        <p>
            <span style="font-size:18px; font-weight:bold">Kwitansi Pembayaran</span> 
            <br>
            <span style="font-size:11px">No : <?=$model->id?></span>
        </p>
    </div>

    <table>
        <tr>
            <td>Telah diterima pembayaran dari</td>
            <td>:</td>
        </tr>
        <tr>
            <td>Nomor Induk</td>
            <td> :</td>
            <td><?=$model->student_nis?></td>
        </tr>
        <tr>
            <td>Nama Siswa</td>
            <td> :</td>
            <td><?=$student->full_name?></td>
        </tr>
    </table>

    <br>

    <table border="1" width="100%" style="text-align:center;border-collapse: collapse;">
        <tr>
            <td>No</th>
            <td>Jenis Pembayaran</th>
            <td>Bulan</th>
            <td>Tahun</th>
            <td>Sebesar</th>
        </tr>
        <tr>
            <td>1</td>
            <td><?=$model->payment_for_name?></td>
            <td><?=$model->month?></td>
            <td><?=$model->year?></td>
            <td>Rp. <?=$model->student_paid?></td>
        </tr>       
         <tr>
            <td colspan="4">Total</td>
            <td>Rp. <?=$model->student_paid?></td>
        </tr>
    </table>

    <br>

    <div style="text-align:right">
        <?=$settingSystem->regency?>,  <?=date('d / m / Y', strtotime($model->create_at))?>
        <br>
        Petugas Penerima
        <br>
        <br>
        <br>
        (<?=Yii::$app->user->identity->full_name?>)
    </div>


</div>
