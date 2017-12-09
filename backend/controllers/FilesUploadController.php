<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 14.11.2017
 * Time: 21:53
 */

namespace backend\controllers;


use backend\models\File;
use yii\web\UploadedFile;

class FilesUploadController extends BackendController
{

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

}