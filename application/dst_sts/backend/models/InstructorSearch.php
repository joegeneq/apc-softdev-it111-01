<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Instructor;

/**
 * InstructorSearch represents the model behind the search form about `backend\models\Instructor`.
 */
class InstructorSearch extends Instructor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['instructor_first_name', 'instructor_last_name', 'instructor_gender', 'instructor_admission_date'], 'safe'],
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
        $query = Instructor::find();

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
            'instructor_admission_date' => $this->instructor_admission_date,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'instructor_first_name', $this->instructor_first_name])
            ->andFilterWhere(['like', 'instructor_last_name', $this->instructor_last_name])
            ->andFilterWhere(['like', 'instructor_gender', $this->instructor_gender]);

        return $dataProvider;
    }
}
