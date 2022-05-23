<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(['id' => 'callout-image-form']); ?>

    <?= $form->field($model, 'cx')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'cy')->hiddenInput(['maxlength' => true])->label(false) ?>
    
    <?= $form->field($model, 'hash')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'img_id')->hiddenInput(['maxlength' => true])->label(false) ?>
    
    <?= $form->field($model, 'item_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textArea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->id ? 'Сохранить' : 'Добавить', ['class' => 'btn btn-success']) ?>
        <?= $model->id ? Html::button('Удалить', ['id' => 'btnDeleteCallout', 'class' => 'btn btn-danger']) : '' ?>
    </div>

<?php ActiveForm::end(); ?>