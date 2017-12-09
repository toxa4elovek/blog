<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 05.12.2017
 * Time: 20:25
 */

namespace common\behaviors;


use backend\models\File;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class UploadBehavior extends Behavior
{
    public $attributeFile;
    public $attributeName;

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_UPDATE => 'saveFile',
            ActiveRecord::EVENT_BEFORE_INSERT => 'saveFile'
        ];
    }

    public function saveFile($events)
    {
        $file = UploadedFile::getInstance($this->owner, $this->attributeFile);

        if (!empty($file)) {
            $this->owner->{$this->attributeName} = File::upload($file, File::PATH_POSTS);
        }
    }
}