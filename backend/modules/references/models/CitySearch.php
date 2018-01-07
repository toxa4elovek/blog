<?php

namespace backend\modules\references\models;

use common\models\db\Region;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\db\City;
use yii\helpers\ArrayHelper;

/**
 * CitySearch represents the model behind the search form of `common\models\db\City`.
 */
class CitySearch extends City
{
    public $region;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'region_id', 'country_id', 'is_main'], 'integer'],
            [['name', 'latitude', 'longitude', 'region'], 'safe'],
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
        $query = City::find()->with('country', 'region');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 50
            ]
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
            'region_id' => $this->region_id,
            'country_id' => $this->country_id,
            'is_main' => $this->is_main,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longitude', $this->longitude]);

        return $dataProvider;
    }

    public static function regionFilter($country_id = false)
    {
        $result = Region::find();

        if((bool)$country_id !== false){
            $result->where(['country_id' => $country_id]);
        }

        return ArrayHelper::map($result->all(), 'id', 'name');
    }
}
