<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\er\models\KpiEms5lv */

$this->title = 'Create Kpi Ems5lv';
$this->params['breadcrumbs'][] = ['label' => 'Kpi Ems5lvs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-ems5lv-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
