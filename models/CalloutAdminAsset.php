<?php

namespace common\modules\calloutImage\models;

use yii\web\AssetBundle;

class CalloutAdminAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/calloutImage/assets';

    public $css = [
        'callout-admin.css',
    ];
    
    public $js = [
        'callout-admin.js',
    ];

    public $depends = [
        '\yii\web\JqueryAsset',
    ];
}
?>