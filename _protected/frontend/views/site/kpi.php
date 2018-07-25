<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'ตัวชี้วัดจังหวัดตาก');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Default Box Example</h3>
        <div class="box-tools pull-right">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            <span class="label label-primary">Label</span>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="list-group">
 
            <?php foreach ($model_kpi as $kpi): ?>
            <?= Html::a('<i class="fa fa-sort"></i> <strong>ตัวชี้วัดที่'.$kpi['kpi_no'].'</strong> '.$kpi['kpi_name'], ['/kpi/view', 'id' => $kpi['id']], ['class' => 'list-group-item']) ?>
            <?php endforeach; ?>
        </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
        The footer of the box
    </div><!-- box-footer -->
</div><!-- /.box -->

