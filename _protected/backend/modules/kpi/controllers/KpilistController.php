<?php

namespace backend\modules\kpi\controllers;

use common\models\Kpi;

class KpilistController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $kpi = Kpi::find()->where(['status'=>'1'])->all();
        
        return $this->render('index',[
            'model_kpi' => $kpi,
        ]);
    }

}
