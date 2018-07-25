<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tmp_visit".
 *
 * @property int $id
 * @property int $visit_hn
 * @property int $visit_vn
 * @property int $admit_day
 */
class Visit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tmp_visit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['visit_hn', 'visit_vn', 'admit_day'], 'required'],
            [['visit_hn', 'visit_vn', 'admit_day'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'visit_hn' => 'Visit Hn',
            'visit_vn' => 'Visit Vn',
            'admit_day' => 'Admit Day',
        ];
    }
}
