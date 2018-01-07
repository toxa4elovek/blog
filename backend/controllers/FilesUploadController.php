<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 14.11.2017
 * Time: 21:53
 */

namespace backend\controllers;


use backend\models\File;
use common\classes\Debug;
use yii\web\UploadedFile;

class FilesUploadController extends BackendController
{
    public $enableCsrfValidation = false;

    public function actionUpload($CKEditorFuncNum)
    {
        $file = UploadedFile::getInstanceByName('upload');

        if ($file)
        {
            if ($result = File::upload($file, File::PATH_OTHERS))
                return '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction("'.$CKEditorFuncNum.'", "'. $result .'", "");</script>';
            else
                return "Возникла ошибка при загрузке файла\n";
        }
        else
            return "Файл не загружен\n";
    }

    public function actionTestUpload()
    {
        $file = UploadedFile::getInstanceByName('file');

        if ($file)
        {
            if ($result = File::upload($file, File::PATH_OTHERS)){
                return json_encode(['location' => $result]);
            }
            else{
                \Yii::$app->getResponse()->getHeaders()->set('Status Code', "500 Invalid file upload");
                return \Yii::$app->getResponse();
            }
        }
        else {
            \Yii::$app->getResponse()->getHeaders()->set('Status Code', "500 Invalid file");
            return \Yii::$app->getResponse();
        }
    }

}