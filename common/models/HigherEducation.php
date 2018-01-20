<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "higher_education".
 *
 * @property int $id
 * @property int $place_id
 * @property int $user_id
 * @property string $begin_at
 * @property string $ending_at
 *
 * @property University $place
 * @property User $user
 */
class HigherEducation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'higher_education';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['place_id', 'user_id'], 'integer'],
            [['begin_at', 'ending_at'], 'safe'],
            [['place_id'], 'exist', 'skipOnError' => true, 'targetClass' => University::className(), 'targetAttribute' => ['place_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'place_id' => Yii::t('app', 'Place ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'begin_at' => Yii::t('app', 'Begin At'),
            'ending_at' => Yii::t('app', 'Ending At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlace()
    {
        return $this->hasOne(University::className(), ['id' => 'place_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
