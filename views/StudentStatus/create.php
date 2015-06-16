<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StudentStatus */

$this->title = Yii::t('app', 'Create Student Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Student Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
