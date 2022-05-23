<?php

namespace common\modules\calloutimage\controllers;

use yii\web\Controller;
use common\modules\calloutImage\models\CalloutImage;
use yii\web\NotFoundHttpException;
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
    public function actionAddCircle()
    {
        $model = new CalloutImage;

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $model->validate()){

            if($model->save()) return 'Добавлено';
        
        }

        return $this->renderAjax('circle-form', [
            'model' => $model
        ]);
    }

    public function actionUpdateCircle($cx, $cy, $hash, $img_id)
    {
        $model = $this->findModel($cx, $cy, $hash, $img_id);            

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $model->validate()){

            if($model->save()) return 'Обновлено';

        }

        return $this->renderAjax('circle-form', [
            'model' => $model,
        ]);
    }

    public function actionDeleteCircle($cx, $cy, $hash, $img_id)
    {
        if($this->findModel($cx, $cy, $hash, $img_id)->delete()){
            return 'Удалено';
        }           

    }

    public function actionCircles($hash, $img_id){
        
        $circles = CalloutImage::find()->where(['hash' => $hash, 'img_id' => $img_id])->asArray()->all();

        foreach($circles as $key=>$circle){
            $circles[$key]['info'] = $circle['item_id'] ?  $this->loadInfo($circle['item_id']) : $circle['text'];
        }

        return json_encode($circles);
            
    }

    protected function findModel($cx, $cy, $hash, $img_id)
    {
        if (($model = CalloutImage::find()->where(['cx' => $cx, 'cy' => $cy, 'hash' => $hash,'img_id' => $img_id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function loadInfo($item_id)
    {
        return 'item_id';
    }
}
