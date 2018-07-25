<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kpi_result".
 *
 * @property int $id
 * @property int $kpi_id
 * @property string $kpi_year
 * @property int $evaluation_period_id ระยะเวลาประเมินผล
 * @property double $quarter_1
 * @property double $quarter_2
 * @property double $quarter_3
 * @property double $quarter_4
 * @property double $created_at
 * @property double $created_by
 * @property double $updated_at
 * @property double $updated_by
 */
class Kpiresult extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kpi_result';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kpi_id', 'kpi_year', 'evaluation_period_id'], 'required'],
            [['kpi_id', 'evaluation_period_id','created_by','updated_by'], 'integer'],
            [['quarter_1', 'quarter_2', 'quarter_3', 'quarter_4'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['kpi_year'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kpi_id' => 'Kpi',
            'kpi_year' => 'ปีงบประมาณ',
            'evaluation_period_id' => 'ระยะเวลาประเมินผล',
            'quarter_1' => 'ไตรมาส 1',
            'quarter_2' => 'ไตรมาส 2',
            'quarter_3' => 'ไตรมาส 3',
            'quarter_4' => 'ไตรมาส 4',
            'created_at' => 'Created',
            'created_by' => 'Created by',
            'updated_at' => 'วันที่ปรับปรุง',
            'updated_by' => 'Updated by',
        ];
    }
}
