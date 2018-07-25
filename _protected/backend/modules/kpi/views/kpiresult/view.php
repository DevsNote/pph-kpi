<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Kpiresult */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kpiresults', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpiresult-view">

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
            'kpi_id',
            'kpi_year',
            'evaluation_period_id',
            'quarter_1',
            'quarter_2',
            'quarter_3',
            'quarter_4',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
