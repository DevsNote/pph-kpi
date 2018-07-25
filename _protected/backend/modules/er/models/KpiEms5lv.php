<?php

namespace backend\modules\er\models;

use Yii;
use yii\db\Query;
/**
 * This is the model class for table "kpi_ems_5lv".
 *
 * @property int $id
 * @property string $hn
 * @property string $vn
 * @property string $date_service
 * @property string $sp
 * @property string $mi
 * @property string $st
 * @property string $L0
 * @property string $L1
 * @property string $L2
 * @property string $L3
 * @property string $L4
 * @property string $L5
 * @property int $transport_id
 * @property string $transport
 * @property string $ems
 * @property int $service_type_id
 * @property string $service_type
 * @property int $error_flag
 */
class KpiEms5lv extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kpi_ems_5lv';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hn', 'vn'], 'required'],
            [['transport_id', 'service_type_id', 'error_flag'], 'integer'],
            [['hn', 'vn'], 'string', 'max' => 10],
            [['date_service'], 'string', 'max' => 30],
            [['sp', 'mi', 'st', 'L0', 'L1', 'L2', 'L3', 'L4', 'L5', 'transport', 'ems', 'service_type'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hn' => 'Hn',
            'vn' => 'Vn',
            'date_service' => 'Date Service',
            'sp' => 'Sp',
            'mi' => 'Mi',
            'st' => 'St',
            'L0' => 'L0',
            'L1' => 'L1',
            'L2' => 'L2',
            'L3' => 'L3',
            'L4' => 'L4',
            'L5' => 'L5',
            'transport_id' => 'Transport ID',
            'transport' => 'Transport',
            'ems' => 'Ems',
            'service_type_id' => 'Service Type ID',
            'service_type' => 'Service Type',
            'error_flag' => 'Error Flag',
        ];
    }
    
    public function getCountEmsAll($start_date, $end_date){
        //$start = (intval(substr($start_date, 0,4))+543)."-".substr($start_date, 4,2)."-".substr($start_date, 6,2);
        //$end = (intval(substr($end_date, 0,4))+543)."-".substr($end_date, 4,2)."-".substr($end_date, 6,2);
        $ems_all = KpiEms5lv::find()->count();
        $query = new Query;
        $query->select(['COUNT(DISTINCT vn) AS emsall','COUNT(IF(LENGTH(sp)>1,1, NULL)) AS sp','COUNT(IF(LENGTH(mi)>1,1, NULL)) AS mi','COUNT(IF(LENGTH(st)>1,1, NULL)) AS st'])
                ->from('kpi_ems_5lv')
                ->where(['between', 'date_service', "$start_date", "$end_date"]);
        $rawdata = $query->createCommand()->queryAll();
        return $rawdata;
    }
    
    public function getEmsAll($start_date, $end_date){
        
        return $rawdata;
    }
}
