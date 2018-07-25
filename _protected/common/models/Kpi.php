<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kpi".
 *
 * @property int $id
 * @property string $kpi_no
 * @property string $kpi_name
 * @property string $kpi_name_a
 * @property string $kpi_name_b
 * @property string $kpi_definition
 * @property string $kpi_sql
 * @property string $kpi_date_rang
 * @property string $datasource
 * @property int $status
 */
class Kpi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kpi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kpi_definition', 'kpi_sql', 'kpi_date_rang'], 'string'],
            [['status'], 'integer'],
            [['kpi_no'], 'string', 'max' => 5],
            [['kpi_name', 'kpi_name_a', 'kpi_name_b', 'datasource'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kpi_no' => 'Kpi No',
            'kpi_name' => 'Kpi Name',
            'kpi_name_a' => 'Kpi Name A',
            'kpi_name_b' => 'Kpi Name B',
            'kpi_definition' => 'Kpi Definition',
            'kpi_sql' => 'Kpi Sql',
            'kpi_date_rang' => 'Kpi Date Rang',
            'datasource' => 'Datasource',
            'status' => 'Status',
        ];
    }
}
