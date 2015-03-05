<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Student;

/**
 * StudentSearch represents the model behind the search form about `app\models\Student`.
 */
class StudentSearch extends Student
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'stuentlevel', 'parent_id'], 'integer'],
            [['studentidnumber', 'studentfirstname', 'studentlastname', 'studentgender', 'studentbirthdate', 'studentaddress', 'studentadmissiondate', 'studentstatus'], 'safe'],
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
            'studentbirthdate' => $this->studentbirthdate,
            'studentadmissiondate' => $this->studentadmissiondate,
            'stuentlevel' => $this->stuentlevel,
            'parent_id' => $this->parent_id,
        ]);

        $query->andFilterWhere(['like', 'studentidnumber', $this->studentidnumber])
            ->andFilterWhere(['like', 'studentfirstname', $this->studentfirstname])
            ->andFilterWhere(['like', 'studentlastname', $this->studentlastname])
            ->andFilterWhere(['like', 'studentgender', $this->studentgender])
            ->andFilterWhere(['like', 'studentaddress', $this->studentaddress])
            ->andFilterWhere(['like', 'studentstatus', $this->studentstatus]);

        return $dataProvider;
    }
}
