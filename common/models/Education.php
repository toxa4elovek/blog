<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "education".
 *
 * @property int $id
 * @property int $place_id
 * @property int $type
 * @property int $user_id
 * @property string $begin_at
 * @property string $ending_at
 *
 * @property EducationPlace $place
 * @property User $user
 */
class Education extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'education';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['place_id', 'type', 'user_id'], 'integer'],
            [['begin_at', 'ending_at'], 'safe'],
            [['place_id', 'type'], 'exist', 'skipOnError' => true, 'targetClass' => EducationPlace::className(), 'targetAttribute' => ['place_id' => 'id', 'type' => 'type']],
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
            'type' => Yii::t('app', 'Type'),
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
        return $this->hasOne(EducationPlace::className(), ['id' => 'place_id', 'type' => 'type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
