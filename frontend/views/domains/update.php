<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Domains $model */

$this->title = 'Обновить домен: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Домены', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="domains-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
