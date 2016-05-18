<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UserType;

/**
 * UserTypeSearch represents the model behind the search form about `backend\models\UserType`.
 */
class UserTypeSearch extends UserType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_type_value'], 'integer'],
            [['user_type_name'], 'safe'],
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
        $query = UserType::find();

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
            'user_type_value' => $this->user_type_value,
        ]);

        $query->andFilterWhere(['like', 'user_type_name', $this->user_type_name]);

        return $dataProvider;
    }
}
