<?php

namespace backend\modules\post\models;

use common\classes\Debug;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PostSearch represents the model behind the search form about `backend\modules\post\models\Post`.
 */
class PostSearch extends Post
{
    public $categoryIds;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'type'], 'integer'],
            [['title', 'categoryIds', 'slug', 'status', 'img', 'text', 'short_text', 'created_at', 'updated_at'], 'safe'],
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
        $query = Post::find();
        $query->joinWith('categories');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            //$query->joinWith('categories');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'type' => $this->type,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'short_text', $this->short_text]);

        if (!empty($this->categoryIds)) {
            /*$query->joinWith(['categories' => function ($q) {
                $q->where(['category.id' => $this->categoryIds]);
            }]);*/
            $query->where(['category.id' => $this->categoryIds]);
        }


        return $dataProvider;
    }
}
