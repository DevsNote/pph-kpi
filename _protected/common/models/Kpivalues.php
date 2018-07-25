<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kpi_values".
 *
 * @property int $id
 * @property int $kpi_id
 * @property string $kpi_year
 * @property string $kpi_mount
 * @property double $kpi_val
 * @property string $kpi_val_type
 */
class Kpivalues extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kpi_values';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kpi_id'], 'integer'],
            [['kpi_val'], 'number'],
            [['kpi_year'], 'string', 'max' => 4],
            [['kpi_mount'], 'string', 'max' => 7],
            [['kpi_val_type'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kpi_id' => 'Kpi ID',
            'kpi_year' => 'Kpi Year',
            'kpi_mount' => 'Kpi Mount',
            'kpi_val' => 'Kpi Val',
            'kpi_val_type' => 'Kpi Val Type',
        ];
    }
}
