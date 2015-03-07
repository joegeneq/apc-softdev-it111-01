<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Account;

/**
 * AccountSearch represents the model behind the search form about `app\models\Account`.
 */
class AccountSearch extends Account
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'instructor_id', 'admin_id'], 'integer'],
            [['acounttype', 'accountusername', 'accountpassword', 'accountdateregistered', 'accountstatus'], 'safe'],
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
        $query = Account::find();

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
            'accountdateregistered' => $this->accountdateregistered,
            'instructor_id' => $this->instructor_id,
            'admin_id' => $this->admin_id,
        ]);

        $query->andFilterWhere(['like', 'acounttype', $this->acounttype])
            ->andFilterWhere(['like', 'accountusername', $this->accountusername])
            ->andFilterWhere(['like', 'accountpassword', $this->accountpassword])
            ->andFilterWhere(['like', 'accountstatus', $this->accountstatus]);

        return $dataProvider;
    }
}
