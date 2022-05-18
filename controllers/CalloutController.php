<?php

namespace common\modules\calloutimage\controllers;

use yii\web\Controller;
use common\modules\calloutImage\models\CalloutImage;
use Yii;

/**
 * Default controller for the `calloutimage` module
 */
class CalloutController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionAddMarker()
    {
        $model = new CalloutImage;

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $model->validate()){
            if($model->save()){
                return "Успешно";
            }
        }

        return $this->renderAjax('add-marker', [
            'model' => $model
        ]);
    }
}
