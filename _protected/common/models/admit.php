<?php

namespace common\models;

use Yii;
//use yii\db\Query;

class Admit {

    public function countAdmit($year,$current_year) {
        //$query = new Query;         
        $query_sql = "SELECT
                        COUNT(DISTINCT q1.visit_hn) AS hn
                        ,COUNT(DISTINCT q1.visit_vn) AS visit
                        ,SUM(CASE WHEN (q1.f_visit_ipd_discharge_type_id = '1' OR q1.f_visit_ipd_discharge_status_id IN('1','2'))
                                THEN (CASE WHEN CAST(to_char(to_timestamp(q1.dc, 'YYYY-MM-DD HH24:MI:SS')-to_timestamp(q1.admit, 'YYYY-MM-DD HH24:MI:SS'),'HH24') AS INT) > 4
                                            THEN CAST(to_char(to_timestamp(q1.dc, 'YYYY-MM-DD HH24:MI:SS')-to_timestamp(q1.admit, 'YYYY-MM-DD HH24:MI:SS'),'DD') AS INT)+1
					ELSE CAST(to_char(to_timestamp(q1.dc, 'YYYY-MM-DD HH24:MI:SS')-to_timestamp(q1.admit, 'YYYY-MM-DD HH24:MI:SS'),'DD') AS INT)
					END )
			ELSE CAST(to_char(to_timestamp(q1.dc, 'YYYY-MM-DD HH24:MI:SS')-to_timestamp(q1.admit, 'YYYY-MM-DD HH24:MI:SS'),'DD') AS INT)+1
			END) AS admitday
                        FROM
                        (
                        SELECT
                        t_visit.visit_hn
                        ,t_visit.visit_vn
                        ,substr(t_visit.visit_begin_admit_date_time,1,10)||' '||substr(t_visit.visit_begin_admit_date_time,12,8) AS admit
                        ,substr(t_visit.visit_ipd_discharge_date_time,1,10)||' '||substr(t_visit.visit_ipd_discharge_date_time,12,8) AS dc
                        ,t_visit.f_visit_ipd_discharge_status_id
                        ,t_visit.f_visit_ipd_discharge_type_id
                        FROM
                        t_visit
                        LEFT JOIN t_patient ON t_visit.t_patient_id = t_patient.t_patient_id 
                        WHERE
                        f_visit_type_id = '1'
                        AND f_visit_status_id = '3'
                        AND substr(visit_financial_discharge_time,1,10) BETWEEN substr('".$year."'-10-01',1,10) AND substr('".$current_year."'-09-30',1,10)
                        ) q1";

        $rawdata = Yii::$app->db_pg->createCommand($query_sql)->queryAll();
        return $rawdata;
    }

}
