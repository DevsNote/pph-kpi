<?php
use yii\helpers\Html;

$this->title = 'KPI ID: ' ;
$this->params['breadcrumbs'][] = 'KPI ID: ';
?>
<div class="box box-solid box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Default Box Example</h3>
        <div class="box-tools pull-right">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            <?= Html::a('<i class="fa fa-fw fa-undo"></i>ย้อนกลับ', ['/kpi/kpilist'], ['class' => 'btn btn-danger']) ?>  
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
        The body of the box
    </div><!-- /.box-body -->
    <div class="box-footer">
        The footer of the box
    </div><!-- box-footer -->
</div><!-- /.box -->

