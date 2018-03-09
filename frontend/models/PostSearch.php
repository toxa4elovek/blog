<?php
/**
 *
 */

namespace frontend\models;


use common\classes\Debug;
use yii\data\ActiveDataProvider;

class PostSearch extends Post
{
    public $searchText;

    public function rules()
    {
        return [
            [['type', 'created_at', 'searchText'], 'safe']
        ];
    }

    public function search($params)
    {
        $query = Post::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        if (!empty($params['slug'])) {
            $query->joinWith(['categories'])->where(['category.slug' => $params['slug']]);
        }

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'post.type' => $this->type,
            'post.created_at' => $this->created_at,
        ]);

        if (!empty($this->searchText)) {
            $query->orFilterWhere(['like', 'post.title', $this->searchText])
                ->orFilterWhere(['like', 'post.text', $this->searchText]);
        }

        Debug::prn($query);

        return $dataProvider;

    }
}