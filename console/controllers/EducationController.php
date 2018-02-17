<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 28.01.2018
 * Time: 15:40
 */

namespace console\controllers;


use common\models\db\EducationPlace;
use common\models\db\School;
use common\models\db\University;
use yii\console\Controller;

class EducationController extends Controller
{
    public function actionIndex()
    {
        $schools = School::find()->all();
        $university = University::find()->all();
        $educations = array_merge($schools, $university);
        $count = 0;
        foreach ($educations as $education) {
            $educationPlace = new EducationPlace($education->attributes);
            $educationPlace->type = ($education instanceof School) ? $educationPlace::TYPE_SCHOOL : $educationPlace::TYPE_UNIVERSITY;
            if($educationPlace->save()) {
                $count++;
            };
        }

        $this->stdout("Saved $count from" . count($educations));
    }

}