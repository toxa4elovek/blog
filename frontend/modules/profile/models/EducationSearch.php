<?php

namespace frontend\modules\profile\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\db\Education;

/**
 * EducationSearch represents the model behind the search form of `common\models\db\Education`.
 */
class EducationSearch extends Education
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'place_id', 'type', 'user_id'], 'integer'],
            [['begin_at', 'ending_at'], 'safe'],
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
        $query = Education::find()->where(['user_id' => Yii::$app->user->id]);

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
            'place_id' => $this->place_id,
            'type' => $this->type,
            'user_id' => $this->user_id,
            'begin_at' => $this->begin_at,
            'ending_at' => $this->ending_at,
        ]);

        return $dataProvider;
    }
}
