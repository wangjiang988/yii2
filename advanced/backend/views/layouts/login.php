<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\web\View;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
$this->registerCssFile('static/css/login.css',['depends'=>'backend\assets\AppAsset']);
$this->registerJs('jQuery(document).ready(function(){App.init();Login.init();});',View::POS_END);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href="/favicon.ico"/>
</head>
<body class="login">
<?php $this->beginBody() ?>
    <div class="logo">
        <img src="static/image/logo-big.png" alt="">
    </div>
    <div class="content">
        <?=$content ?>
    </div>

    <div class="copyright">
            2013@ Metronic  Admin Dashboard Template
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
