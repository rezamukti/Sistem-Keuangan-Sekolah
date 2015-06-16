<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaymentTransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Payment Transactions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-transaction-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Payment Transaction'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php
\app\controllers\ExcelGrid::widget([ 
// \bsource\gridview\ExcelGrid::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'extension'=>'xlsx',
		'filename'=>'Transaksi Pembayaran',
		'properties' =>[
			//'creator'	=>'',
			//'title' 	=> '',
			//'subject' 	=> '',
			//'category'	=> '',
			//'keywords' 	=> '',
			//'manager' 	=> '',
			//'description'=>'BSOURCECODE',
			//'company'	=>'BSOURCE',
		],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'student_id',
            'payment_for_id',
            'payment_for_name',
            'year',
        ],
    ]);

?>
</div>