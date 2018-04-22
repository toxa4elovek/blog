<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 14.11.2017
 * Time: 21:55
 */

namespace backend\models;


use common\classes\Debug;
use yii\base\Model;
use yii\helpers\BaseFileHelper;
use yii\web\UploadedFile;

class File extends Model
{
    const PATH_POSTS = 'posts';
    const PATH_OTHERS = 'others';
    const PATH_AVATARS = 'avatars';

    public static $types = ['jpg', 'jpeg', 'png'];

    /**
     * @param $file UploadedFile
     * @param $directory string
     * @return bool
     */
    public static function upload($file, $directory)
    {
        if(in_array(str_replace('image/', '', $file->type), self::$types)){
            $path = \Yii::getAlias('@img') . '/' . $directory;
            $web_path = \Yii::getAlias('@web_img') . '/' . $directory;
            $unique_path1 = substr(md5(time()), 0, 2);
            $unique_path2 = substr(md5(time() + 1), 0, 2);
            $upload_path = $path . '/' .  $unique_path1 . '/' . $unique_path2 . '/';
            $file_name = md5(time()) . '.' . $file->extension;
            BaseFileHelper::createDirectory($upload_path);

            if($file->saveAs($upload_path . $file_name)) {
                return $web_path . '/' . $unique_path1 . '/' . $unique_path2 . '/' . $file_name;
            }
        }
        return false;
    }

    public function getUrl()
    {
        return $this->dir . '/' . $this->file_name;
    }

    /*public function beforeDelete()
    {
        $file_name = \Yii::getAlias('@webroot') . $this->dir . $this->file_name;
        if (file_exists($file_name) && !is_dir($file_name))
            unlink($file_name);

        return parent::beforeDelete();
    }*/

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dir' => 'Dir',
            'file_name' => 'File Name',
            'original_file_name' => 'Original File Name',
            'type' => 'Type',
        ];
    }
}