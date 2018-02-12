<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
?>

<div class="text-center content-group">
    <h1 class="error-title"><?= $title = preg_replace("/[^0-9]/", '', $this->title); ?></h1>
    <h5>Упс, произошла ошибка. <?= nl2br(Html::encode($message)) ?></h5>
</div>

<div class="row">
    <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
        <div class="row">
            <div class="col-sm-12">
                <a href="<?= Url::to(['/dashboard/index']) ?>" class="btn btn-primary btn-block content-group"><i class="icon-circle-left2 position-left"></i> Вернуться на главную</a>
            </div>
        </div>
    </div>
</div>
