<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;


$this->title = Yii::t('app', 'ตัวชี้วัดจังหวัดตาก');
//$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'ตัวชี้วัดจังหวัดตาก', 'url' => ['/site/kpi']];
$this->params['breadcrumbs'][] = $this->title;

$yy = date('Y')+543;
?>

<?php foreach ($model_kpiresult as $kpiresult): ?>

<?php endforeach; ?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-trophy" aria-hidden="true"></i> <?= ' ' . $model_kpi['kpi_name']; ?></h3>
        <div class="box-tools pull-right">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            <span class="label label-primary">มีข้อมูลย้อนหลัง <?= count($model_kpiyear); ?> ปี</span>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">

        <div class="box box-default">
            <div class="box-body">
                <div class="container">
                    <div class="row">
                        <?= Html::beginForm(Url::toRoute('kpi/view?id=' . $kpi_id)) ?> 
                        <div class="form-inline">
                            <div class="form-group has-success has-feedback">
                                <label class="control-label" for="inputSuccess4"><strong>ประจำปีงบประมาณ : <?= $kpiresult['year']; ?> </strong></label>
                                <label class="control-label" for="inputSuccess4"> เปลี่ยนปีงบประมาณ :</label>
                                <select class="form-control" name="year" id="inputSuccess4">
                                    <option value="<?=$yy?>"><< ปีงบประมาณ >></option>
                                    <?php foreach ($model_kpiresult as $kpiyear): ?>
                                        <?php echo '<option> ' . $kpiyear['year'] . '</option>'; ?>
                                    <?php endforeach; ?>
                                </select>
                                <span id="inputSuccess4Status" class="sr-only">(success)</span>
                                <?= Html::submitButton('ประมวลผล', ['class' => 'btn btn-success form-control']) ?>
                            </div>
                        </div>
                        <?= Html::endForm() ?>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        <div class="row">
            <?php foreach ($model_kpiresult as $result): ?>
                <?php $bg = ($result['year'] - 543) == date('Y') ? "bg-green" : "bg-orange" ?>
                <div class="col-md-2">
                    <!-- Apply any bg-* class to to the info-box to color it -->
                    <div class="info-box <?= $bg ?>">
                        <span class="info-box-icon"><i class="fa fa-trophy"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">ปี <?= $result['year']; ?></span>
                            <span class="info-box-number"><?= $result['kpi_val']; ?>%</span>
                            <!-- The progress section is optional -->
                            <div class="progress">
                                <div class="progress-bar" style="width: 0%"></div>
                            </div>
                            <span class="progress-description">
                                A=<?=$result['data_a'];?>, B=<?=$result['data_b'];?>
                            </span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>
            <?php endforeach; ?>

        </div>

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                    <div class="box-tools pull-right">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        <span class="label label-primary">Label</span>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php 
                   // print_r($kpival);
                    
                        foreach ($model_kpival as $kpival_rs): 
                        echo $kpival_rs['kpi_mount'];
                        echo $kpival_rs['kpi_val'];
                        $kpi_mount[] = $kpival_rs['kpi_mount'];
                        $kpival[] = $kpival_rs['kpi_val'];
                        endforeach; ?>
                    
                    <?php
                    
                    echo Highcharts::widget([
                        'options' => [
                            'chart' => ['type' => 'spline'],
                            'title' => ['text' => $model_kpi['kpi_name_a']],
                            'xAxis' => [
                                'categories' => $kpi_mount
                            ],
                            'yAxis' => [
                                'title' => ['text' => 'จำนวน']
                            ],
                            'series' => [
                                //['name' => 'Jane', 'data' => []],
                                ['name' => 'Data A', 'data' => $kpival]
                            ]
                        ]
                    ]);
                    ?>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <p class="text-danger">
                    หมายเหตุ :<br>
                    - คำนิยาม :<?=$model_kpi['kpi_definition']?><br>
                    - A = <?=$model_kpi['kpi_name_a']?> <br>
                    - B = <?=$model_kpi['kpi_name_b']?>
                    </p>
                </div><!-- box-footer -->
            </div><!-- /.box -->

    </div><!-- /.box-body -->
    <div class="box-footer">
        ปรับปรุงข้อมูลล่าสุดเมื่อ (<?= $data_modify; ?>)
    </div><!-- box-footer -->
</div><!-- /.box -->


