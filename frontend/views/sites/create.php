<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Sites $model */

$this->title = 'Добавить сайт';
$this->params['breadcrumbs'][] = ['label' => 'Сайты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sites-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
