<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\color\ColorInput;

/* @var $this yii\web\View */
/* @var $model suPnPsu\room\models\Room */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="room-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'support_no')->textInput() ?>

    <?= $form->field($model, 'building')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'class')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'close_up')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>


    <div class="row">

        <dvi class="col-sm-4">
            <?=
            $form->field($model, 'style[textColor]')->widget(ColorInput::classname(), [
                'options' => [
                    'placeholder' => 'Select color ...',
                    'value' => $model->stylies->textColor
                ],
            ])->label('สีตัวอักษร');
            ?>
        </dvi>
        <dvi class="col-sm-4">
            <?=
            $form->field($model, 'style[backgroundColor]')->widget(ColorInput::classname(), [
                'options' => [
                    'placeholder' => 'Select color ...',
                    'value' => $model->stylies->backgroundColor
                ],
            ])->label('สีพื้นหลัง');
            ?>
        </dvi>
        <dvi class="col-sm-4">

            <?=
            $form->field($model, 'style[borderColor]')->widget(ColorInput::classname(), [
                'options' => [
                    'placeholder' => 'Select color ...',
                    'value' => $model->stylies->borderColor
                ],
            ])->label('สีขอบ');
            ?>
        </dvi>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
