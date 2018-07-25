<?php

namespace backend\modules\er\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\er\models\KpiEms5lv;

/**
 * KpiEms5lvSearch represents the model behind the search form of `backend\modules\er\models\KpiEms5lv`.
 */
class KpiEms5lvSearch extends KpiEms5lv
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'transport_id', 'service_type_id', 'error_flag'], 'integer'],
            [['hn', 'vn', 'date_service', 'sp', 'mi', 'st', 'L0', 'L1', 'L2', 'L3', 'L4', 'L5', 'transport', 'ems', 'service_type'], 'safe'],
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
        $query = KpiEms5lv::find();

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
            'transport_id' => $this->transport_id,
            'service_type_id' => $this->service_type_id,
            'error_flag' => $this->error_flag,
        ]);

        $query->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'vn', $this->vn])
            ->andFilterWhere(['like', 'date_service', $this->date_service])
            ->andFilterWhere(['like', 'sp', $this->sp])
            ->andFilterWhere(['like', 'mi', $this->mi])
            ->andFilterWhere(['like', 'st', $this->st])
            ->andFilterWhere(['like', 'L0', $this->L0])
            ->andFilterWhere(['like', 'L1', $this->L1])
            ->andFilterWhere(['like', 'L2', $this->L2])
            ->andFilterWhere(['like', 'L3', $this->L3])
            ->andFilterWhere(['like', 'L4', $this->L4])
            ->andFilterWhere(['like', 'L5', $this->L5])
            ->andFilterWhere(['like', 'transport', $this->transport])
            ->andFilterWhere(['like', 'ems', $this->ems])
            ->andFilterWhere(['like', 'service_type', $this->service_type]);

        return $dataProvider;
    }
}
