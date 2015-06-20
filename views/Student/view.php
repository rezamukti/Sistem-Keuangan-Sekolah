<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Student */

$this->title = $model->full_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Siswa'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Perbarui Data'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Hapus Data'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Anda yakin ingin menghapus data ini?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nis',
            'full_name',
            // 'id',
            // 'nisn',
            // 'birth_place',
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
        ],
    ]) ?>

</div>
