<?php 
use yii\bootstrap5\Html;
?><div class="card">
  <div class="card-header">
    ФИО: <?= $model->user->full_name ?>
  </div>
  <div class="card-body">
    <h5 class="card-title">Статус: <?= $model->status->title ?></h5>
    <p class="card-text">Тип услуги: <?= $model->service->title ?></p>
    <p class="card-text">Тип оплаты: <?= $model->payType->title ?></p>
    <div class="d-flex gap-3">
        <p class="card-text">Время: <?= $model->time ?>
        <p class="card-text">Дата: <?= $model->date ?>
    </div>
    <p class="card-text">Контакт: <?= $model->contact ?></p>
    <p class="card-text">Адрес: <?= $model->address ?></p>

    <?= Html::a('Посмотреть', ['view', "id" => $model->id], ['class' => 'btn btn-outline-info']) ?>
  </div>
</div>