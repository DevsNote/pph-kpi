<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\er\models\KpiEms5lv */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kpi Ems5lvs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-ems5lv-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'hn',
            'vn',
            'date_service',
            'sp',
            'mi',
            'st',
            'L0',
            'L1',
            'L2',
            'L3',
            'L4',
            'L5',
            'transport_id',
            'transport',
            'ems',
            'service_type_id',
            'service_type',
            'error_flag',
        ],
    ]) ?>

</div>
