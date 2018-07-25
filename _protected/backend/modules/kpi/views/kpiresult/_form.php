<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Kpi;

/* @var $this yii\web\View */
/* @var $model common\models\Kpiresult */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kpiresult-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="box box-solid box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?=$kpi_name?></h3>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <?php $encrypt=\Yii::$app->security->encryptByKey($kpi_id, \Yii::$app->request->cookieValidationKey); ?>
                <?= Html::submitButton('<i class="fa fa-fw fa-save"></i> Save', ['class' => 'btn btn-success']) ?>

                <?= Html::a('<i class="fa fa-fw fa-undo"></i> ย้อนกลับ', ['index','id'=>$encrypt], ['class' => 'btn btn-danger']) ?>  
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <?=
                    $form->field($model, 'kpi_id')->dropDownList(
                            ArrayHelper::map(Kpi::find()->where(['status' => 1, 'datasource' => 'manual', 'id' => $decrypt_id])->all(), 'id', 'kpi_name'), [ 'class' => 'form-control', 'disabled' => FALSE])
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($model, 'kpi_year')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'quarter_1')->textInput() ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'quarter_2')->textInput() ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'quarter_3')->textInput() ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'quarter_4')->textInput() ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'updated_at')->textInput(['disabled' => true]) ?>
                </div>
            </div>

        </div><!-- /.box-body -->
        <div class="box-footer">
            หมายเหตุ :
        </div><!-- box-footer -->
    </div><!-- /.box -->
    <?php ActiveForm::end(); ?>

</div>
