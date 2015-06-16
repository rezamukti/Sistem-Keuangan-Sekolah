<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\models\Regency;
use yii\helpers\ArrayHelper;

$regency=Regency::find()->all();
$listData=ArrayHelper::map($regency,'id','name');



$this->title = Yii::t('app', 'Cities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create City'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',

            [
                'attribute'=>'regency_id',
                'label'=>'Kabupaten',
                'filter'=>$listData, 
                'value' => function($data){
                    return $data->getRegencyName();
                }
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
