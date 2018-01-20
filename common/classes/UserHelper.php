<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 11.11.2017
 * Time: 19:49
 */

namespace common\classes;

use yii\web\User;

class UserHelper
{
    public static function getFullName($user)
    {
        return '';//$user->profile->name;
    }
}