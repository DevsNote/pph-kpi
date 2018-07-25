<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\er\models\KpiEms5lv */

$this->title = 'Update Kpi Ems5lv: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Kpi Ems5lvs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kpi-ems5lv-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
