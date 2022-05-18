<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(['id' => 'callout-image-form']); ?>

    <?= $form->field($model, 'cx')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cy')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img_id')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'item_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textArea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>