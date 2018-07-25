<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Kpiresult */

$this->title = 'Create Kpiresult';
$this->params['breadcrumbs'][] = ['label' => 'Kpiresults', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpiresult-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
                    'decrypt_id' => $decrypt_id,
                    'kpi_name' => $kpi_name,
                    'kpi_id' => $kpi_id,
    ]); ?>

</div>
