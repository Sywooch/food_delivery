<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="sidebar-content">

    <div class="sidebar-user-material">
        <div class="category-content">
            <div class="sidebar-user-material-content">
                <a class="legitRipple" href="#"><img src="<?= isset($profile) ? $profile->avatar : '/web/images/placeholder.jpg' ?>" class="img-circle img-responsive" alt="profile_image"></a>
                <h6><?= isset($profile) ? $profile->surname.' '.$profile->name : 'Пользователь' ?></h6>
            </div>
        </div>
    </div>

    <div class="sidebar-category sidebar-category-visible">
        <div class="category-content no-padding">
            <ul class="navigation navigation-main navigation-accordion">
                <li class="navigation-header"><span>Меню</span> <i class="icon-menu" title="Main pages"></i></li>
                <li <?= Yii::$app->controller->id == 'dashboard' ? 'class="active"' : '' ?> ><a href="<?= Url::to(['/site/index']) ?>"><i class="icon-home4"></i> <span>Главная</span></a></li>
                <li <?= Yii::$app->controller->id == 'staff' ? 'class="active"' : '' ?> ><a href="<?= Url::to(['/staff/index']) ?>"><i class="icon-users2"></i> <span>Персонал</span></a></li>
                <li <?= Yii::$app->controller->id == 'category' ? 'class="active"' : '' ?> ><a href="<?= Url::to(['/category/index']) ?>"><i class="icon-price-tag2"></i> <span>Категории</span></a></li>
                <li <?= Yii::$app->controller->id == 'products' ? 'class="active"' : '' ?> ><a href="<?= Url::to(['/products/index']) ?>"><i class="icon-box"></i> <span>Блюда</span></a></li>
                <li <?= Yii::$app->controller->id == 'recommend-products' ? 'class="active"' : '' ?> ><a href="<?= Url::to(['/recommend-products/index']) ?>"><i class="icon-thumbs-up2"></i> <span>Рекомендуемые блюда</span></a></li>
                <li>
                    <a href="#"><i class="icon-cog5"></i> <span>Настройки сайта</span></a>
                    <ul>
                        <li><a href="<?= Url::to(['/site-settings/index']) ?>">Главная страница</a></li>
                        <li><a href="<?= Url::to(['/site-settings/address']) ?>">Адреса и телефоны</a></li>
                        <li><a href="<?= Url::to(['/city-area/index']) ?>">Районы доставки</a></li>
                        <li><a href="<?= Url::to(['/site-settings/score']) ?>">Система баллов</a></li>
                        <li><a href="<?= Url::to(['/site-settings/payment-system']) ?>">Платежная система</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

</div>