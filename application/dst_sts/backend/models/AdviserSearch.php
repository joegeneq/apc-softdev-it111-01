<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Adviser;

/**
 * AdviserSearch represents the model behind the search form about `backend\models\Adviser`.
 */
class AdviserSearch extends Adviser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['adviser_first_name', 'adviser_last_name', 'adviser_gender'], 'safe'],
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
        $query = Adviser::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'adviser_first_name', $this->adviser_first_name])
            ->andFilterWhere(['like', 'adviser_last_name', $this->adviser_last_name])
            ->andFilterWhere(['like', 'adviser_gender', $this->adviser_gender]);

        return $dataProvider;
    }
}
