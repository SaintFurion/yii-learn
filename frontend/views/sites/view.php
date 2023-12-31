<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Sites $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Сайты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sites-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'created_at:datetime',
            'updated_at:datetime',
            [
                'label' => 'Домен',
                'value' => function ($model) {
                    return \frontend\models\Domains::findOne($model->domain_id)->title;
                },
            ],
            [
                'label' => 'Сервер',
                'value' => function ($model) {
                    return \frontend\models\Servers::findOne($model->server_id)->title;
                },
            ],
        ],
    ]) ?>

</div>
