<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\kpi\models\KpiresultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'KPI ID: ' . $kpi['id'];
$this->params['breadcrumbs'][] = 'KPI ID: ' . $kpi['id'];
//echo $kpi_id;
?>
<div class="kpiresult-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <div class="box box-solid box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?=$kpi_name?></h3>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                    <?php $encrypt = \Yii::$app->security->encryptByKey($kpi_id, \Yii::$app->request->cookieValidationKey); ?>
                    <?= Html::a('<i class="fa fa-fw fa-plus"></i>เพิ่มข้อมูล', ['create', 'id' => $encrypt], ['class' => 'btn btn-warning']) ?>    
                    <?= Html::a('<i class="fa fa-fw fa-undo"></i>ย้อนกลับ', ['/kpi/kpilist'], ['class' => 'btn btn-danger']) ?>  
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'summary' => "รายการที่แสดง {begin} - {end} ทั้งหมด {totalCount} รายการ",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'kpi_year',
                'format' => 'text',
                'label' => 'ปีงบประมาณ',
            ],
            //'evaluation_period_id',
            [
                'attribute' => 'quarter_1',
                'format' => 'text',
                'label' => 'ไตรมาส 1',
            ],
            [
                'attribute' => 'quarter_2',
                'format' => 'text',
                'label' => 'ไตรมาส 2',
            ],
            [
                'attribute' => 'quarter_3',
                'format' => 'text',
                'label' => 'ไตรมาส 3',
            ],
            [
                'attribute' => 'quarter_4',
                'format' => 'text',
                'label' => 'ไตรมาส 4',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'buttons' => [
                    'update' => function($url, $model, $key) {
                        return Html::a('<i class="fa fa-edit fa-2x"></i>', ['kpiresult/update', 'id' => $model['id']]);
                    }
                        ]
                    ],
                ],
            ]);
            ?>
        </div><!-- /.box-body -->
        <div class="box-footer">
            หมายเหตุ :
        </div><!-- box-footer -->
    </div><!-- /.box -->

    


</div>
