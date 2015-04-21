<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Attendance;

/**
 * AttendanceSearch represents the model behind the search form about `frontend\models\Attendance`.
 */
class AttendanceSearch extends Attendance
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['attendance_date', 'student_id', 'attendance_status'], 'safe'],
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
        if (Yii::$app->user->identity->user_type==='Adviser') {
            $query = Attendance::find();
        } else {
            $query = Attendance::find()->where("student_id=(SELECT student_id FROM parents WHERE user_id=".Yii::$app->user->identity->id.")");
        }
        

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('student');

        $query->andFilterWhere([
            'id' => $this->id,
            'attendance_date' => $this->attendance_date,
        ]);

        $query->andFilterWhere(['like', 'attendance_status', $this->attendance_status])
              ->andFilterWhere(['like', 'student.student_full_name', $this->student_id]);

        return $dataProvider;
    }
}
