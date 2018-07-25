<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\kpi\models\KpiresultSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kpiresult-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kpi_id') ?>

    <?= $form->field($model, 'kpi_year') ?>

    <?= $form->field($model, 'evaluation_period_id') ?>

    <?= $form->field($model, 'quarter_1') ?>

    <?php // echo $form->field($model, 'quarter_2') ?>

    <?php // echo $form->field($model, 'quarter_3') ?>

    <?php // echo $form->field($model, 'quarter_4') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
