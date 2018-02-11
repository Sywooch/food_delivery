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

            <div class="sidebar-user-material-menu">
                <a href="#user-nav" data-toggle="collapse" aria-expanded="true"><span>Мой аккаунт</span> <i class="caret"></i></a>
            </div>
        </div>

        <div class="navigation-wrapper collapse" id="user-nav">
            <ul class="navigation">
                <li><a href="<?= Url::to(['/site/profile']) ?>"><i class="icon-user-plus"></i> <span>Мой профиль</span></a></li>
<!--                <li><a href="#"><i class="icon-comment-discussion"></i> <span><span class="badge bg-teal-400 pull-right">58</span> Messages</span></a></li>-->
                <li><a href="<?= Url::to(['/site/change-password']) ?>"><i class="icon-key"></i> <span>Смена пароля</span></a></li>
                <li>
                    <?= Html::a('<i class="icon-switch2"></i> <span>Выход</span>',
                    ['/site/logout'],
                    [
                        'data' => [
                            'method' => 'post'
                        ]
                    ]) ?>
                </li>
            </ul>
        </div>
    </div>

    <div class="sidebar-category sidebar-category-visible">
        <div class="category-content no-padding">
            <ul class="navigation navigation-main navigation-accordion">
                <li class="navigation-header"><span>Меню</span> <i class="icon-menu" title="Main pages"></i></li>
                <li <?= Yii::$app->controller->id == 'dashboard' ? 'class="active"' : '' ?> ><a href="<?= Url::to(['/site/index']) ?>"><i class="icon-home4"></i> <span>Главная</span></a></li>
                <li <?= Yii::$app->controller->id == 'staff' ? 'class="active"' : '' ?> ><a href="<?= Url::to(['/staff/index']) ?>"><i class="icon-users2"></i> <span>Персонал</span></a></li>
                <li <?= Yii::$app->controller->id == 'category' ? 'class="active"' : '' ?> ><a href="<?= Url::to(['/category/index']) ?>"><i class="icon-price-tag2"></i> <span>Категории</span></a></li>
                <li <?= Yii::$app->controller->id == 'products' ? 'class="active"' : '' ?> ><a href="<?= Url::to(['/products/index']) ?>"><i class="icon-box"></i> <span>Продукты</span></a></li>
                <li <?= Yii::$app->controller->id == 'site-settings' ? 'class="active"' : '' ?> ><a href="<?= Url::to(['/site-settings/index']) ?>"><i class="icon-cog5"></i> <span>Настройки сайта</span></a></li>
<!--                <li>-->
<!--                    <a href="#"><i class="icon-stack2"></i> <span>Page layouts</span></a>-->
<!--                    <ul>-->
<!--                        <li><a href="layout_navbar_fixed.html">Fixed navbar</a></li>-->
<!--                        <li><a href="layout_navbar_sidebar_fixed.html">Fixed navbar &amp; sidebar</a></li>-->
<!--                        <li><a href="layout_sidebar_fixed_native.html">Fixed sidebar native scroll</a></li>-->
<!--                        <li><a href="layout_navbar_hideable.html">Hideable navbar</a></li>-->
<!--                        <li><a href="layout_navbar_hideable_sidebar.html">Hideable &amp; fixed sidebar</a></li>-->
<!--                        <li><a href="layout_footer_fixed.html">Fixed footer</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
            </ul>
        </div>
    </div>

</div>