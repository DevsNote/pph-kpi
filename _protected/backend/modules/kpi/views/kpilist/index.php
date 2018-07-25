<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'ตัวชี้วัดจังหวัดตาก');
$this->params['breadcrumbs'][] = $this->title;

//$decrypt = \Yii::$app->security->decryptByKey($_GET['id'], \Yii::$app->request->cookieValidationKey);
//$encrypt=\Yii::$app->security->encryptByKey($id, \Yii::$app->request->cookieValidationKey);
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-trophy" aria-hidden="true"></i> KPI Template 61</h3>
        <div class="box-tools pull-right">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            <span class="label label-primary">Label</span>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="list-group">
 
            <?php foreach ($model_kpi as $kpi): ?>
            <?php $encrypt=\Yii::$app->security->encryptByKey($kpi['id'], \Yii::$app->request->cookieValidationKey); ?>
            <?= Html::a('<i class="fa fa-sort"></i> <strong>ตัวชี้วัดที่'.$kpi['kpi_no'].'</strong> '.$kpi['kpi_name'], ['/kpi/kpiresult/index', 'id' => $encrypt], ['class' => 'list-group-item']) ?>
            <?php endforeach; ?>
        </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
        The footer of the box
    </div><!-- box-footer -->
</div><!-- /.box -->
