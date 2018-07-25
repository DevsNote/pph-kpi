<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\er\models\KpiEms5lvSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kpi Ems5lvs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-ems5lv-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kpi Ems5lv', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'hn',
            'vn',
            'date_service',
            'sp',
            //'mi',
            //'st',
            //'L0',
            //'L1',
            //'L2',
            //'L3',
            //'L4',
            //'L5',
            //'transport_id',
            //'transport',
            //'ems',
            //'service_type_id',
            //'service_type',
            //'error_flag',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
