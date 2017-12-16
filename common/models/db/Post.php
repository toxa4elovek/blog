<?php

namespace common\models\db;

use common\classes\Debug;
use Yii;


class Post extends \common\models\Post
{
    const STATUS_ACTIVE = 1;
    const STATUS_MODERATION = 0;
    const STATUS_DELETED = 2;

}
