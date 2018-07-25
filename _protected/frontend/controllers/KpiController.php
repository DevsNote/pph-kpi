<?php

namespace frontend\controllers;

use common\models\Kpi;
use common\models\Kpiresult;
use common\models\Kpi3;
use common\models\Kpivalues;
use yii\db\Query;
use Yii;

class KpiController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionView($id) {

        $kpi_id = $id;
        $kpi = Kpi::findOne($id);

        if (Yii::$app->request->post()) {
            $year = Yii::$app->request->post('year');
        } else {
            if (date('m') >= 10) {
                $year = date('Y') + 544;
            } else {
                $year = date('Y') + 543;
            }
        }
        //$query = new Query();

        $kpival = Kpivalues::find()->where(['kpi_id' => $id, 'kpi_year' => $year])->all();

        if ($kpi['datasource'] == 'manual') {
            $kpiresult = Kpiresult::find()->where(['kpi_id' => $id, 'kpi_year' => $year])->orderBy('id', SORT_DESC)->all();
            $kpiyear = Kpiresult::find()->where(['kpi_id' => $id])->all();

            foreach ($kpiresult as $modify) {
                if (empty($modify['updated_at'])) {
                    $update = substr(($modify['created_at'] + 543), 0, 4) . substr($modify['created_at'], 4, 6);
                } else {
                    $update = substr(($modify['updated_at'] + 543), 0, 4) . substr($modify['updated_at'], 4, 6);
                }
            }

            return $this->render('index', [
                        'model_kpiresult' => $kpiresult,
                        'model_kpiyear' => $kpiyear,
                        'model_kpi' => $kpi,
                        'data_modify' => $update,
            ]);
        } else if ($kpi['datasource'] == 'sql' && $kpi['kpi_date_rang'] == 1) {
            $kpiresult = Kpi3::find()->where(['<=', 'year', $year])->orderBy('id', SORT_DESC)->limit(7)->all();
            $kpiyear = Kpi3::find()->where(['<=', 'year', $year])->orderBy('id', SORT_DESC)->limit(1)->all();
            //$kpival = Kpivalues::find()->where(['kpi_id' => $id, 'kpi_year' => $year])->all();
            foreach ($kpiresult as $modify) {

                $update = substr(($modify['create_at'] + 543), 0, 4) . substr($modify['create_at'], 4, 6);
            }
            /*
            foreach ($kpival as $kpival_rs):
                //echo $kpival_rs['kpi_mount'];
                //echo $kpival_rs['kpi_val'];
                $kpi_mount[] = $kpival_rs['kpi_mount'];
                $kpival[] = $kpival_rs['kpi_val'];
            endforeach;
            */
            return $this->render('kpi3', [
                        'kpi_id' => $kpi_id,
                        'model_kpiresult' => $kpiresult,
                        'model_kpiyear' => $kpiyear,
                        'model_kpi' => $kpi,
                        'model_kpival' => $kpival,
                        //'kpi_mount' =>$kpi_mount,
                        //'kpival' => $kpival,
                        'data_modify' => $update,
            ]);
        }elseif ($kpi['datasource'] == 'sql' && $kpi['kpi_date_rang'] == 4) { //ประมวลผลแบบ SQL รายเดือน
            //$kpiresult = Kpi3::find()->where(['kpi_id' => $id])->andWhere(['<=', 'year', $year])->orderBy('id', SORT_DESC)->limit(12)->all();
            //$kpiyear = Kpi3::find()->where(['kpi_id' => $id])->andWhere(['<=', 'year', $year])->orderBy('id', SORT_DESC)->limit(1)->all();
            foreach ($kpiresult as $modify) {

                $update = substr(($modify['create_at'] + 543), 0, 4) . substr($modify['create_at'], 4, 6);
            }

            return $this->render('kpi3', [
                        'kpi_id' => $kpi_id,
                        'model_kpiresult' => $kpiresult,
                        'model_kpiyear' => $kpiyear,
                        'model_kpi' => $kpi,
                        'model_kpival' => $kpival,
                        'data_modify' => $update,
            ]);
        }
    }

}
