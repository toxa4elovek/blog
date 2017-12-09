<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 16.11.2017
 * Time: 21:49
 */

namespace frontend\widgets;


use yii\bootstrap\Widget;

class QuestionsWidget extends Widget
{
    public function run()
    {
        return $this->render('questions', ['questions' => ['вопрос1', 'Вопрос3']]);
    }
}