<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = Yii::t('app', 'ตัวชี้วัดจังหวัดตาก');
//$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'ตัวชี้วัดจังหวัดตาก', 'url' => ['/site/kpi']];
$this->params['breadcrumbs'][] = $this->title;
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
                        <?= Html::beginForm(Url::toRoute('kpi/view?id='.$kpiresult['kpi_id'])) ?> 
                        <div class="form-inline">
                            <div class="form-group has-success has-feedback">
                                <label class="control-label" for="inputSuccess4"><strong>ประจำปีงบประมาณ : <?=$kpiresult['kpi_year'];?> </strong></label>
                                <label class="control-label" for="inputSuccess4"> เปลี่ยนปีงบประมาณ :</label>
                                <select class="form-control" name="year" id="inputSuccess4">
                                    <option><< ปีงบประมาณ >></option>
                                    <?php foreach ($model_kpiyear as $kpiyear): ?>
                                        <?php echo '<option> ' . $kpiyear['kpi_year'] . '</option>'; ?>
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
            <div class="col-md-3">
                <!-- Apply any bg-* class to to the info-box to color it -->
                <div class="info-box bg-orange">
                    <span class="info-box-icon"><i class="fa fa-trophy"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">ไตรมาส 1</span>
                        <span class="info-box-number"><?= $kpiresult['quarter_1']; ?>%</span>
                        <!-- The progress section is optional -->
                        <div class="progress">
                            <div class="progress-bar" style="width: <?= $kpiresult['quarter_1']; ?>%"></div>
                        </div>
                        <span class="progress-description">
                            <?= $kpiresult['quarter_1']; ?>% Increase in  Days
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3">
                <!-- Apply any bg-* class to to the info-box to color it -->
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="fa fa-trophy"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">ไตรมาส 2</span>
                        <span class="info-box-number"><?= $kpiresult['quarter_2']; ?>%</span>
                        <!-- The progress section is optional -->
                        <div class="progress">
                            <div class="progress-bar" style="width: <?= $kpiresult['quarter_2']; ?>%"></div>
                        </div>
                        <span class="progress-description">
                            70% Increase in 30 Days
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3">
                <!-- Apply any bg-* class to to the info-box to color it -->
                <div class="info-box bg-blue">
                    <span class="info-box-icon"><i class="fa fa-trophy"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">ไตรมาส 3</span>
                        <span class="info-box-number"><?= $kpiresult['quarter_3']; ?>%</span>
                        <!-- The progress section is optional -->
                        <div class="progress">
                            <div class="progress-bar" style="width: <?= $kpiresult['quarter_3']; ?>%"></div>
                        </div>
                        <span class="progress-description">
                            70% Increase in 30 Days
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3">
                <!-- Apply any bg-* class to to the info-box to color it -->
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-trophy"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">ไตรมาส 4</span>
                        <span class="info-box-number"><?= $kpiresult['quarter_4']; ?>%</span>
                        <!-- The progress section is optional -->
                        <div class="progress">
                            <div class="progress-bar" style="width: <?= $kpiresult['quarter_4']; ?>%"></div>
                        </div>
                        <span class="progress-description">
                            70% Increase in 30 Days
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
        </div>

    </div><!-- /.box-body -->
    <div class="box-footer">
        ปรับปรุงข้อมูลล่าสุดเมื่อ (<?= $data_modify; ?>)
    </div><!-- box-footer -->
</div><!-- /.box -->


