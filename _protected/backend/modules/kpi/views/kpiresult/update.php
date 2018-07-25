<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Kpiresult */

$this->title = 'ปรับปรุงข้อมูล: ';
$this->params['breadcrumbs'][] = ['label' => 'Kpiresults', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kpiresult-update">


    <?= $this->render('_form', [
        'model' => $model,
        'decrypt_id' => $decrypt_id,
        'kpi_name' => $kpi_name,
        'kpi_id' => $kpi_id,
    ]) ?>

</div>
