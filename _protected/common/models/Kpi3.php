<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tmp_kpi3".
 *
 * @property int $id
 * @property string $year
 * @property double $data_a
 * @property double $data_b
 * @property double $kpi_val
 * @property string $create_at
 */
class Kpi3 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tmp_kpi3';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year', 'data_a', 'data_b', 'kpi_val', 'create_at'], 'required'],
            [['data_a', 'data_b', 'kpi_val'], 'number'],
            [['create_at'], 'safe'],
            [['year'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'year' => 'Year',
            'data_a' => 'Data A',
            'data_b' => 'Data B',
            'kpi_val' => 'Kpi Val',
            'create_at' => 'Create At',
        ];
    }
}
