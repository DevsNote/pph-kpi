<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\er\models\KpiEms5lvSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kpi-ems5lv-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'hn') ?>

    <?= $form->field($model, 'vn') ?>

    <?= $form->field($model, 'date_service') ?>

    <?= $form->field($model, 'sp') ?>

    <?php // echo $form->field($model, 'mi') ?>

    <?php // echo $form->field($model, 'st') ?>

    <?php // echo $form->field($model, 'L0') ?>

    <?php // echo $form->field($model, 'L1') ?>

    <?php // echo $form->field($model, 'L2') ?>

    <?php // echo $form->field($model, 'L3') ?>

    <?php // echo $form->field($model, 'L4') ?>

    <?php // echo $form->field($model, 'L5') ?>

    <?php // echo $form->field($model, 'transport_id') ?>

    <?php // echo $form->field($model, 'transport') ?>

    <?php // echo $form->field($model, 'ems') ?>

    <?php // echo $form->field($model, 'service_type_id') ?>

    <?php // echo $form->field($model, 'service_type') ?>

    <?php // echo $form->field($model, 'error_flag') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
