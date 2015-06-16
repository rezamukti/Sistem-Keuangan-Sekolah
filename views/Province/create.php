<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Province */

$this->title = Yii::t('app', 'Create Province');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Provinces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="province-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
