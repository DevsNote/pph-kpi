<?php
/* @var $this \yii\web\View */
/* @var $content string */
/*
use yii\helpers\Html;

$bundle = yiister\gentelella\assets\Asset::register($this);
*/
use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
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
    </head>
    <body>
        <div class="col-md-12">
        <?php $this->beginBody() ?>


                <?= $content ?>


        <?php $this->endBody() ?>
        </div>
    </body>
</html>
<?php $this->endPage() ?>
