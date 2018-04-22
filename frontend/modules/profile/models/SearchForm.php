<?php
/**
 *
 */

namespace frontend\modules\profile\models;


use common\models\db\Post;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class SearchForm extends Post
{

    public $categoryIds;
    public $dateTo;
    public $dateFrom;

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
        $query = Post::find()->where(['user_id' => \Yii::$app->user->id]);
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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'post.type' => $this->type,
        ]);

        $query->andFilterWhere(['like', 'title', $this->text])
            ->orFilterWhere(['like', 'text', $this->text])
            ->orFilterWhere(['like', 'short_text', $this->text]);

        if (!empty($this->categoryIds)) {
            /*$query->joinWith(['categories' => function ($q) {
                $q->where(['category.id' => $this->categoryIds]);
            }]);*/
            $query->where(['category.id' => $this->categoryIds]);
        }

        return $dataProvider;
    }

    public function searchFavourites($params)
    {
        $query = Post::find()->joinWith('postFavourites')->where([
            'post_favourites.user_id' => \Yii::$app->user->id
        ]);

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'post.type' => $this->type,
        ]);

        $query->andFilterWhere(['like', 'title', $this->text])
            ->orFilterWhere(['like', 'text', $this->text])
            ->orFilterWhere(['like', 'short_text', $this->text]);

        if (!empty($this->categoryIds)) {
            /*$query->joinWith(['categories' => function ($q) {
                $q->where(['category.id' => $this->categoryIds]);
            }]);*/
            $query->where(['category.id' => $this->categoryIds]);
        }

        return $dataProvider;
    }

    public function searchComments($params, $parent_id = null)
    {
        $query = Post::find()->joinWith('postComments')->where([
            'post_comments.user_id' => \Yii::$app->user->id
        ]);

        if ($parent_id !== null) {
            $query->where(['post_comments.parent_id' => $parent_id]);
        }

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'post.type' => $this->type,
        ]);

        $query->andFilterWhere(['like', 'title', $this->text])
            ->orFilterWhere(['like', 'text', $this->text])
            ->orFilterWhere(['like', 'short_text', $this->text]);

        if (!empty($this->categoryIds)) {
            /*$query->joinWith(['categories' => function ($q) {
                $q->where(['category.id' => $this->categoryIds]);
            }]);*/
            $query->where(['category.id' => $this->categoryIds]);
        }

        return $dataProvider;
    }
}