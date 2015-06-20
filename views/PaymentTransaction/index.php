<?php

use yii\helpers\Html;
// use yii\grid\GridView;

use kartik\export\ExportMenu;
use kartik\grid\GridView;
// use kartik\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaymentTransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = Yii::t('app', 'Daftar Pembayaran');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-transaction-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Entri Pembayaran'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php 

        echo ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'student_nis',
                    'payment_for_name',
                    'month',
                    'year',
                    'student_paid',
            ],
            'target' => ExportMenu::TARGET_SELF,
            'dropdownOptions' => [
                'label' => 'Download',
            ],
            'exportConfig' => [
                ExportMenu::FORMAT_HTML => false,
                ExportMenu::FORMAT_CSV => false,
                ExportMenu::FORMAT_TEXT => false,
            ],
            'showColumnSelector' => false,
            'showConfirmAlert' =>false
        ]);

        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'student_nis',
                    'payment_for_name',
                    
                    [
                        'attribute'=>'month',
                        'filter'=>['Januari' => 'Januari', 'Febuari'=>'Febuari', 'Maret'=>'Maret', 'April'=>'April', 'Mei' =>'Mei', 'Juni'=>'Juni', 'Juli'=>'Juli', 'Agustus' =>'Agustus', 'September' =>'September', 'Oktober'=>'Oktober', 'November'=>'November', 'Desember'=>'Desember'], 
                    ],


                    'year',
                    'student_paid',
                    [
                        'attribute' => 'create_at',
                        'label' => 'Tanggal Bayar (Tahun-Bln-Tgl)'
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {update}',
                    ]
            ],
            'toolbar' => [
                '{export}',
            ]
        ]);

    ?>

</div>
