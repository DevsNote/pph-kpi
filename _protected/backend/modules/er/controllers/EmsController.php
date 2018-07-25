<?php

namespace backend\modules\er\controllers;

use Yii;
use yii\web\Controller;
use yii\db\Query;
use backend\modules\er\models\KpiEms5lv;
use yii\data\ActiveDataProvider;

class EmsController extends Controller {

    public function actionIndex() {
        $ems = new KpiEms5lv();
        $current_year = date('Y');
        $current_mount = date('m');
        if (Yii::$app->request->post('start_date') <> '' && Yii::$app->request->post('end_date') <> '') {
            $start_date = (intval(substr(Yii::$app->request->post('start_date'), 0, 4)) + 543) . "-" . substr(Yii::$app->request->post('start_date'), 4, 2) . "-" . substr(Yii::$app->request->post('start_date'), 6, 2);
            $end_date = (intval(substr(Yii::$app->request->post('end_date'), 0, 4)) + 543) . "-" . substr(Yii::$app->request->post('end_date'), 4, 2) . "-" . substr(Yii::$app->request->post('end_date'), 6, 2);

            $ems = new KpiEms5lv();
            $ems_all = $ems->getCountEmsAll($start_date, $end_date);
            foreach ($ems_all AS $emsall) {
                
            }
            $ems_all_list = KpiEms5lv::find()->where(['between', 'date_service', $start_date, $end_date])->all();
            $ems_sp = KpiEms5lv::find()->where(['between', 'date_service', $start_date, $end_date])->andWhere(['!=', 'sp', ''])->count();
            $ems_mi = KpiEms5lv::find()->where(['between', 'date_service', $start_date, $end_date])->andWhere(['!=', 'mi', ''])->count();
            $ems_st = KpiEms5lv::find()->where(['between', 'date_service', $start_date, $end_date])->andWhere(['!=', 'st', ''])->count();
            $query = new Query();
            $ems_5lv = $query->select([
                                'ems', 'COUNT(DISTINCT vn) AS total',
                                'COUNT(IF(LENGTH(sp)>1,1, NULL)) AS sp',
                                'COUNT(IF(LENGTH(mi)>1,1, NULL)) AS mi',
                                'COUNT(IF(LENGTH(st)>1,1, NULL)) AS st',
                                'COUNT(IF(LENGTH(L5)>1,1, NULL)) AS lv5',
                                'COUNT(IF(LENGTH(L4)>1,1, NULL)) AS lv4',
                                'COUNT(IF(LENGTH(L3)>1,1, NULL)) AS lv3',
                                'COUNT(IF(LENGTH(L2)>1,1, NULL)) AS lv2',
                                'COUNT(IF(LENGTH(L1)>1,1, NULL)) AS lv1'])
                            ->from('kpi_ems_5lv')->where(['between', 'date_service', $start_date, $end_date])->andWhere(['!=', 'ems', ''])->groupBy(['ems'])->all();

            $start_date = Yii::$app->request->post('start_date');
            $end_date = Yii::$app->request->post('end_date');
        } else {
            //คำนวณปีงบประมาณ
            if ($current_mount < 10) {
                $fiscal_start = ($current_year + 542) . "-10-01";
                $fiscal_end = ($current_year + 543) . "-09-30";
                $start_date = ($current_year-1) . "-10-01";
                $end_date = $current_year . "-09-30";
            } elseif ($current_mount >= 10) {
                $fiscal_start = ($current_year + 544) . "-10-01";
                $fiscal_end = ($current_year + 543) . "-09-30";
                $start_date = ($current_year) . "-10-01";
                $end_date = $current_year+1 . "-09-30";
            }
            //----------//
            //$start_date = (date('Ym')) . (date('01'));
            //$end_date = (date('Ymd'));

            $ems_all = $ems->getCountEmsAll($fiscal_start, $fiscal_end);
            foreach ($ems_all AS $emsall) {
                
            }
            $ems_all_list = KpiEms5lv::find()->all();

            $ems_sp = KpiEms5lv::find()->where(['between', 'date_service', "2560-10-01", "2561-09-30"])->andWhere(['!=', 'sp', ''])->count();
            $ems_mi = KpiEms5lv::find()->where(['between', 'date_service', "2560-10-01", "2561-09-30"])->andWhere(['!=', 'mi', ''])->count();
            $ems_st = KpiEms5lv::find()->where(['between', 'date_service', "2560-10-01", "2561-09-30"])->andWhere(['!=', 'st', ''])->count();
            $query = new Query();
            $ems_5lv = $query->select([
                                'ems', 'COUNT(DISTINCT vn) AS total',
                                'COUNT(IF(LENGTH(sp)>1,1, NULL)) AS sp',
                                'COUNT(IF(LENGTH(mi)>1,1, NULL)) AS mi',
                                'COUNT(IF(LENGTH(st)>1,1, NULL)) AS st',
                                'COUNT(IF(LENGTH(L5)>1,1, NULL)) AS lv5',
                                'COUNT(IF(LENGTH(L4)>1,1, NULL)) AS lv4',
                                'COUNT(IF(LENGTH(L3)>1,1, NULL)) AS lv3',
                                'COUNT(IF(LENGTH(L2)>1,1, NULL)) AS lv2',
                                'COUNT(IF(LENGTH(L1)>1,1, NULL)) AS lv1'])
                            ->from('kpi_ems_5lv')->where(['between', 'date_service', "2560-10-01", "2561-09-30"])->andWhere(['!=', 'ems', ''])->groupBy(['ems'])->all();
            //แปลงข้อมูลเพื่อแสดงเป็น Gridview
            $ems_provider = new \yii\data\ArrayDataProvider([
                'allModels' => $ems_all_list,
            ]);
        }
        return $this->render('index', [
                    'ems_all' => $ems_all,
                    'ems_sp' => $ems_sp,
                    'ems_mi' => $ems_mi,
                    'ems_st' => $ems_st,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'ems_5lv' => $ems_5lv,
                    'emsall' => $emsall,
                    'ems_all_list' => $ems_all_list,
                        //'ems_provider' => $ems_provider,
        ]);
    }

    public function actionDatalist($start, $end ,$gp) {
        $ems = new KpiEms5lv();
        $st_date = $this->actionConvertdate($start);
        $en_date = $this->actionConvertdate($end);
        //echo $start."/".$end;
        //echo "</br>";
        //echo $st_date."/".$en_date;
        //echo $gp;
        $query = (new Query())->select([
            'date_service' => 'date_service',
            'hn' => 'hn',
            'vn' => 'vn',
            'ems' => 'ems',
            'sp' => 'sp',
            'mi' => 'mi',
            'st' => 'st',
        ])->from('kpi_ems_5lv');

    // Adds additional WHERE conditions to the existing query but ignores empty operands
    $query->where(['<>', $gp, ''])->andFilterWhere(['between', 'date_service', $st_date, $en_date]);
    // an ActiveDataProvider will accept a Query object instead of raw SQL
    $dataProvider = new ActiveDataProvider([
        'query' => $query,
        'pagination' => [
            'pageSize' => 20,
        ],
    ]);

        return $this->render('datalist', [
                    'start_date' => $start,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionHello() {
        $data = array();
        $data["myValue"] = "Content loaded";

        $this->render('hello', $data);
    }

    public function actionUpdateAjax() {
        $data = array();
        $data["myValue"] = "Content updated in AJAX";

        $this->renderPartial('_ajaxContent', $data, false, true);
    }

    public function actionConvertdate($cur_date) {
        $current_year = date('Y');
        $current_mount = date('m');
        if ($current_mount < 10) {
            $fiscal_start = ($current_year + 542) . "-10-01";
            $fiscal_end = ($current_year + 543) . "-09-30";
        } elseif ($current_mount >= 10) {
            $fiscal_start = ($current_year + 544) . "-10-01";
            $fiscal_end = ($current_year + 543) . "-09-30";
        }

        $conv_date = (intval(substr($cur_date, 0, 4)) + 543) . "-" . substr($cur_date, 5, 2) . "-" . substr($cur_date, 8, 2);
        //$end_date = (intval(substr(Yii::$app->request->post('end_date'), 0, 4)) + 543) . "-" . substr(Yii::$app->request->post('end_date'), 4, 2) . "-" . substr(Yii::$app->request->post('end_date'), 6, 2);
        return $conv_date;
    }

}
