<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Parents;

/**
 * ParentsSearch represents the model behind the search form about `backend\models\Parents`.
 */
class ParentsSearch extends Parents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['parents_full_name', 'student_id', 'user_id', 'parents_contact_number', 'parents_address'], 'safe'],
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
        $query = Parents::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinwith('user');
        $query->joinwith('student');

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'parents_full_name', $this->parents_full_name])
            ->andFilterWhere(['like', 'parents_contact_number', $this->parents_contact_number])
            ->andFilterWhere(['like', 'parents_address', $this->parents_address])
            ->andFilterWhere(['like', 'user.username', $this->user_id])
            ->andFilterWhere(['like', 'student.student_full_name', $this->student_id]);

        return $dataProvider;
    }
}
