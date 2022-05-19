<?php
 
namespace common\modules\calloutImage\widgets;
 
use Yii;
use yii\base\Widget;
use common\modules\calloutImage\models\CalloutImage;
use common\modules\calloutImage\models\Functions;
 
class CalloutAdminWidget extends Widget
{

    public $id;
    public $hash;
    public $src;
    public $viewbox;
    public $width = 300;

    public function init()
    {
        parent::init();

        $this->viewbox = Functions::generateViewBox($this->src);
    }

    public function run()
    {
        return $this->render('callout-admin', [
            'src' => $this->src,
            'viewbox' => $this->viewbox,
            'width' => $this->width,
            'id' => $this->id,
            'hash' => $this->hash,
        ]);
    }

    // public $collage_id;

    // public function run()
    // {
    //     $model = new Circle();

    //     $model->collage_id = $this->collage_id;


    //     if($model->load(Yii::$app->request->post())) { 
    //         if(!empty($model->delete)){
    //             if($circle = Circle::find()->where(['id' => $model->delete])->one()){
    //                 if($circle->delete()){
    //                     Yii::$app->getResponse()->redirect('view?id=' . $this->collage_id)->send();
    //                 }
    //             }
    //         }
    //         if($model->validate()){
    //             if($model->save()){
    //                 Yii::$app->getResponse()->redirect('view?id=' . $this->collage_id)->send();
    //             }
    //         }
    //     }
    //     return $this->render('create-circle', [
    //         'model' => $model,
    //     ]);
    // }
 
}