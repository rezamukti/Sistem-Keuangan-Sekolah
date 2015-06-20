<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SettingSystem */

$this->title = Yii::t('app', $model->name);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pengaturan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
// $this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="setting-system-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
