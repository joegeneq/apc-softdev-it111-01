<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Student;

/**
 * StudentSearch represents the model behind the search form about `backend\models\Student`.
 */
class StudentSearch extends Student
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'student_level'], 'integer'],
            [['student_id_number', 'student_first_name', 'student_last_name', 'student_gender', 'student_birthdate', 'student_address', 'student_admission_date', 'student_status'], 'safe'],
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
        $query = Student::find();

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
            'student_birthdate' => $this->student_birthdate,
            'student_admission_date' => $this->student_admission_date,
            'student_level' => $this->student_level,
        ]);

        $query->andFilterWhere(['like', 'student_id_number', $this->student_id_number])
            ->andFilterWhere(['like', 'student_first_name', $this->student_first_name])
            ->andFilterWhere(['like', 'student_last_name', $this->student_last_name])
            ->andFilterWhere(['like', 'student_gender', $this->student_gender])
            ->andFilterWhere(['like', 'student_address', $this->student_address])
            ->andFilterWhere(['like', 'student_status', $this->student_status]);

        return $dataProvider;
    }
}
