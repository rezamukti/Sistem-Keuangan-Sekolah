<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SettingSystem */

$this->title = Yii::t('app', 'Create Setting System');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pengaturan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-system-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
