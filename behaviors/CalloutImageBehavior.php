<?php

namespace common\modules\calloutimage\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class CalloutImageBehavior extends Behavior
{

    

    // public $modelList;
    // public $modelLink;
    // public $idSelf;
    // public $idLink;
    // public $property;
    // public $communication;
  
    // public function events()
    // {
    //     return [
    //         ActiveRecord::EVENT_AFTER_FIND => 'afterFind',
    //         ActiveRecord::EVENT_AFTER_DELETE => 'afterDeleteModel',
    //         ActiveRecord::EVENT_AFTER_UPDATE => 'afterSave',
    //         ActiveRecord::EVENT_AFTER_INSERT => 'afterSave',
    //     ];
    // }

    // //events methods
    // public function afterFind()
    // {

    //     $this->owner->{$this->property} = ArrayHelper::map($this->owner->{$this->communication}, 'id', 'id');

    // }

    // public function afterDeleteModel()
    // {

    //     $this->modelLink::deleteAll([$this->idSelf => $this->owner->id]);
        
    // }

    // public function afterSave()
    // {
    //     if(is_array($this->owner->{$this->property})){

    //         $old_items = ArrayHelper::map($this->owner->{$this->communication}, 'id', 'name');

    //         //old_items - array for delete
    //         foreach($this->owner->{$this->property} as $new_item){

    //             if(isset($old_items[$new_item])){
    //                 unset($old_items[$new_item]);
    //             }else{
    //                 $this->createNewItem($new_item);
    //             }

    //         }

    //         //delete old_items
    //         foreach($old_items as $key=>$old_item){

    //             $this->modelLink::deleteAll([
    //                 'and', 
    //                 [$this->idSelf => $this->owner->id], 
    //                 [$this->idLink => $key]]
    //             );

    //         }

    //     }else{

    //         $this->modelLink::deleteAll([$this->idSelf => $this->owner->id]);

    //     }
        
    // }

    // private function createNewItem($new_item){

    //     if($model = $this->modelList::find()->andWhere(['id'=>$new_item])->one()){
           
    //         $link = new $this->modelLink();

    //         $link->{$this->idSelf} = $this->owner->id;

    //         $link->{$this->idLink} = $model->id;

    //         if($link->save()){
    //             return $link->id;
    //         }
            
    //     }

    //     return false;
    // }

}

?>