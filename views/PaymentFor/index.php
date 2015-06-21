<?php

 /**
  * @package    KeuanganSekolah
  * @author     Reza Mukti <ycared@gmail.com>
  * @copyright  Copyright (c) 2015, KaryaKami.
  * @link       http://karyakami.com
  */


use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Semester;
use yii\helpers\ArrayHelper;

$semester=Semester::find()->all();
$listData=ArrayHelper::map($semester,'id','name');

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaymentForSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Jenis Pembayaran');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-for-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Entri Jenis Pembayaran'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            'year',
            'price',
            [
                'attribute'=>'semester_id',
                'label'=>'Semester',
                'filter'=>$listData, 
                'value' => function($data){
                    return $data->getSemesterName();
                }
            ],

            // 'soft_delete',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
