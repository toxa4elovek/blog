<?php
/**
 *
 */

namespace frontend\modules\profile\models;


class Education extends \common\models\db\Education
{
    /*public function rules()
    {
        return array_merge(parent::rules(), [
            [['city_id', 'country_id'], 'integer'],
            [['city_id', 'type'], 'exist', 'skipOnError' => true, 'targetClass' => EducationPlace::className(), 'targetAttribute' => ['place_id' => 'id', 'type' => 'type']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ]);
    }*/
}