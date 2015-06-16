<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Regency */

$this->title = Yii::t('app', 'Create Regency');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Regencies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regency-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
