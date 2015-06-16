<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Students');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Student'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nisn',
            'nik',
            'full_name',
            'birth_place',
            // 'birth_date',
            // 'gender_id',
            // 'religion_id',
            // 'mother_name',
            // 'father_name',
            // 'parent_occupation',
            // 'province_id',
            // 'regency_id',
            // 'address',
            // 'city_id',
            // 'rt',
            // 'rw',
            // 'postal_code',
            // 'no_hp',
            // 'class_id',
            // 'student_status_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
