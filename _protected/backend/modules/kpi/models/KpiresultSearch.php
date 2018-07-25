<?php

namespace backend\modules\kpi\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Kpiresult;

/**
 * KpiresultSearch represents the model behind the search form of `common\models\Kpiresult`.
 */
class KpiresultSearch extends Kpiresult
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kpi_id', 'evaluation_period_id', 'created_by', 'updated_by'], 'integer'],
            [['kpi_year', 'created_at', 'updated_at'], 'safe'],
            [['quarter_1', 'quarter_2', 'quarter_3', 'quarter_4'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Kpiresult::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'kpi_id' => $this->kpi_id,
            'evaluation_period_id' => $this->evaluation_period_id,
            'quarter_1' => $this->quarter_1,
            'quarter_2' => $this->quarter_2,
            'quarter_3' => $this->quarter_3,
            'quarter_4' => $this->quarter_4,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'kpi_year', $this->kpi_year]);

        return $dataProvider;
    }
}
