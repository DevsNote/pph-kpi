<?php
/* @var $this yii\web\View */

use kartik\date\DatePicker;
use yii\bootstrap\Html;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
$this->title = 'KPI EMS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-ambulance"></i> ตัวชี้วัดงาน EMS</h3>
        <div class="box-tools pull-right">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            <!-- <span class="label label-primary">Label</span> -->
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
        <?php Pjax::begin(); ?>
        <!-- start monitor -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <!-- Apply any bg-* class to to the info-box to color it -->
                <div class="info-box bg-gray">
                    <span class="info-box-icon"><i class="fa fa-ambulance"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">EMS ทั้งหมด</span>
                        <span class="info-box-number"><?= $emsall['emsall']; ?> รายการ</span>
                        <!-- The progress section is optional -->
                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description pull-right">
                            <?= Html::a('<i class="fa fa-times"></i> รายละเอียด', ['datalist', 'start' => $start_date,'end'=>$end_date, 'gp'=>'ems'], ['class' => 'btn btn-default btn-xs']) ?>
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <!-- Apply any bg-* class to to the info-box to color it -->
                <div class="info-box bg-fuchsia">
                    <span class="info-box-icon"><i class="fa fa-optin-monster"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">SEPSIS</span>
                        <span class="info-box-number"><?= $ems_sp ?> รายการ</span>
                        <!-- The progress section is optional -->
                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description pull-right">
                            <?= Html::a('<i class="fa fa-times"></i> รายละเอียด', ['datalist', 'start' => $start_date,'end'=>$end_date, 'gp'=>'sp'], ['class' => 'btn btn-default btn-xs']) ?>
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <!-- Apply any bg-* class to to the info-box to color it -->
                <div class="info-box bg-orange">
                    <span class="info-box-icon"><i class="fa fa-heartbeat"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">STEMI</span>
                        <span class="info-box-number"><?= $ems_mi ?> รายการ</span>
                        <!-- The progress section is optional -->
                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description pull-right">
                            <?= Html::a('<i class="fa fa-times"></i> รายละเอียด', ['datalist', 'start' => $start_date,'end'=>$end_date, 'gp'=>'mi'], ['class' => 'btn btn-default btn-xs']) ?>
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <!-- Apply any bg-* class to to the info-box to color it -->
                <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="fa fa-wheelchair"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">STROKE</span>
                        <span class="info-box-number"><?= $ems_st ?> รายการ</span>
                        <!-- The progress section is optional -->
                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description pull-right">
                            <?= Html::a('<i class="fa fa-times"></i> รายละเอียด', ['datalist', 'start' => $start_date,'end'=>$end_date, 'gp'=>'st'], ['class' => 'btn btn-default btn-xs']) ?>
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
        </div>
        <!-- end -->
        <!-- Form sort by date-->
        <div class="row">
            <div class="container">
                <div class="well row" style="text-align: center">
                    <div class=" col-md-10">
                        <?= Html::beginForm("index") ?> 
                        <?= '<label>เลือกช่วงเวลาสำหรับดูข้อมูล</label>'; ?>
                        <?php
                        echo DatePicker::widget([
                            'name' => 'start_date',
                            //'value' => $data,
                            'name2' => 'end_date',
                            //'value2' => '27-Feb-1996',
                            'type' => DatePicker::TYPE_RANGE,
                            'options' => ['placeholder' => $start_date],
                            'options2' => ['placeholder' => $end_date],
                            'language' => 'th',
                            'pluginOptions' => [
                                'autoclose' => true,
                                'todayHighlight' => true,
                                'format' => 'yyyymmdd'
                            ]
                        ]);
                        ?>
                    </div>
                    <div class=" col-md-2" style=" padding-top: 25px">
                        <?= Html::submitButton('Process', ['class' => 'btn btn-success btn-block']) ?>
                        <?= Html::endForm() ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- end form -->
        <div class="row">
            <div class="container-fluid">
                <table class="table table-bordered table-striped table-hover table-responsive">
                    <thead>
                        <tr  class="danger">
                            <td>EMS</td>
                            <td>Total</td>
                            <td>Sepsis</td>
                            <td>STEMI</td>
                            <td>STROKE</td>
                            <td>แดง</td>
                            <td>ส้ม</td>
                            <td>เหลือง</td>
                            <td>เขียว</td>
                            <td>ขาว</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ems_5lv AS $ems5lv): ?>
                            <tr>
                                <td><?= Html::encode($ems5lv['ems']); ?></td>
                                <td><?= Html::encode($ems5lv['total']); ?></td>
                                <td><?= Html::encode($ems5lv['sp']); ?></td>
                                <td><?= Html::encode($ems5lv['mi']); ?></td>
                                <td><?= Html::encode($ems5lv['st']); ?></td>
                                <td><?= Html::encode($ems5lv['lv5']); ?></td>
                                <td><?= Html::encode($ems5lv['lv4']); ?></td>
                                <td><?= Html::encode($ems5lv['lv3']); ?></td>
                                <td><?= Html::encode($ems5lv['lv2']); ?></td>
                                <td><?= Html::encode($ems5lv['lv1']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php Pjax::end(); ?>
    </div><!-- /.box-body -->
    <div class="box-footer">

    </div><!-- box-footer -->
</div><!-- /.box -->

