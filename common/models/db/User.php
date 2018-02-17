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

}