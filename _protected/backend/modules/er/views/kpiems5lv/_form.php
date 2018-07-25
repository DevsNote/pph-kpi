<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\er\models\KpiEms5lv */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kpi-ems5lv-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_service')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'st')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'L0')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'L1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'L2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'L3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'L4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'L5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'transport_id')->textInput() ?>

    <?= $form->field($model, 'transport')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ems')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_type_id')->textInput() ?>

    <?= $form->field($model, 'service_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'error_flag')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
