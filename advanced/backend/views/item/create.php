<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AuthItemModel */

$this->title = Yii::t('app', 'Create Auth Item Model');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auth Item Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-model-create">

     <?= Html::encode($this->title) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
