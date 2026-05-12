<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Application $model */

$this->title = "Заявка №" . $model->id . " от " . Yii::$app->formatter->asDatetime($model->created_at);
$this->params['breadcrumbs'][] = ['label' => 'Заявка', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="application-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-outline-primary']) ?>
        <!-- <= Html::a('Update', ['update', 'id' => $model->id, 'user_id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <= Html::a('Delete', ['delete', 'id' => $model->id, 'user_id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'user_id',
                'value' => $model->user->full_name,
            ],
            [
                'attribute' => 'service_id',
                'value' => $model->service->title,
            ],
            'address',
            'contact',
            'date',
            'time',
            [
                'attribute' => 'pay_type_id',
                'value' => $model->payType->title,
            ],
            [
                'attribute' => 'status_id',
                'value' => $model->status->title,
            ],
        ],
    ]) ?>

</div>
