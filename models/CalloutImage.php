<?php

namespace common\modules\calloutImage\models;

use Yii;

/**
 * This is the model class for table "callout_image".
 *
 * @property int $id
 * @property int $cx
 * @property int $cy
 * @property string|null $hash
 * @property int $img_id
 * @property int|null $item_id
 * @property string|null $text
 */
class CalloutImage extends \yii\db\ActiveRecord
{
    public $info;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'callout_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cx', 'cy', 'img_id'], 'required'],
            [['cx', 'cy', 'img_id', 'item_id'], 'integer'],
            [['hash', 'text'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cx' => 'Cx',
            'cy' => 'Cy',
            'hash' => 'Hash',
            'img_id' => 'Img ID',
            'item_id' => 'Item ID',
            'text' => 'Text',
        ];
    }
}
