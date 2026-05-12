<?php

use app\models\PayType;
use app\models\Service;
use app\models\Status;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Application $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="application-form">

    <?php $form = ActiveForm::begin(); ?>

    <h3>Заявка</h3>

    <?= $form->field($model, 'service_id')->dropDownList(
        Service::getService(), ['promot' => 'Выбирите услугу']
    ) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact')->textInput(['maxlength' => true])->widget(\yii\widgets\MaskedInput::class, [
        'mask' => '+7(999)999-99-99',
    ]) ?>

    <?= $form->field($model, 'date')->textInput(['type' => 'date', 'min' => date("Y-m-d")]) ?>

    <?= $form->field($model, 'time')->textInput(['type' => 'time']) ?>

    <?= $form->field($model, 'pay_type_id')->dropDownList(
        PayType::getPayType(),
        ['promot' => 'Выбирите способ оплаты']
    ) ?>


    <!-- <= $form->field($model, 'status_id')->checkbox() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>