<?php

use yii\helpers\Html;
use common\widgets\Alert;
use backend\assets\AppAsset;
use common\models\Profile;

$profile = Profile::findOne(['user_id' => Yii::$app->user->getId()]);

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="navbar navbar-default header-highlight">
    <?= $this->render('_top_menu', [
        'profile' => $profile
    ]) ?>
</div>


<div class="page-container">
    <div class="page-content">

        <div class="sidebar sidebar-main">
            <?= $this->render('_menu', [
                'profile' => $profile
            ]) ?>
        </div>

        <div class="content-wrapper">
            <div class="content">
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

    </div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
