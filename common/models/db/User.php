<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 08.01.2018
 * Time: 16:09
 */

namespace common\models\db;

/**
 * Class User
 * @package common\models\db
 *
 * @property Education[] $currentEducations
 * @property UserSkill[] $userSkills
 * @property Skill[] $skills
 */
class User extends \common\models\User
{
    public function getNewEducation()
    {
        return new Education([
            'user_id' => $this->id
        ]);
    }

    /**
     * @return Education[]
     */
    public function getCurrentEducations()
    {
        $educations = $this->getEducations()->all();

        if (empty($educations)) {
            $educations[] = $this->getNewEducation();
        }

        return $educations;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserSkills()
    {
        return $this->hasMany(UserSkill::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkills()
    {
        return $this->hasMany(Skill::className(), ['id' => 'skill_id'])->viaTable('user_skill', ['user_id' => 'id']);
    }

}