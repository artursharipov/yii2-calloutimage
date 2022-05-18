<?php

namespace common\modules\calloutImage\models;

use yii\base\Model;
use Yii;

class Functions extends Model
{

    public static function generateViewBox($url)
    {
        $size = getimagesize(Yii::getAlias('@www').$url);

        return "0 0 $size[0] $size[1]"; 
    }

}