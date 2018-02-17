<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "education_place".
 *
 * @property int $id
 * @property string $name
 * @property int $city_id
 * @property int $type
 *
 * @property Education[] $educations
 * @property City $city
 */
class EducationPlace extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'education_place';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type'], 'required'],
            [['id', 'city_id', 'type'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['id', 'type'], 'unique', 'targetAttribute' => ['id', 'type']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'city_id' => Yii::t('app', 'City ID'),
            'type' => Yii::t('app', 'Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducations()
    {
        return $this->hasMany(Education::className(), ['place_id' => 'id', 'type' => 'type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
}
