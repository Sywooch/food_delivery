<?php
use yii\helpers\Url;
use yii\helpers\Html;
use common\models\SiteSettings;

$settings = SiteSettings::findOne(1);
?>

<div class="navbar-header">
<!--    <a class="navbar-brand" href="--><?//= Url::to(['/dashboard/index']) ?><!--"><img src="/backend/web/images/logo_light.png" alt=""></a>-->
    <a class="navbar-brand" href="<?= Url::to(['/dashboard/index']) ?>"><?= $settings->name ?></a>

    <ul class="nav navbar-nav visible-xs-block">
        <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
        <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
    </ul>
</div>

<div class="navbar-collapse collapse" id="navbar-mobile">
    <ul class="nav navbar-nav">
        <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
    </ul>

    <div class="navbar-right">
        <p class="navbar-text">Здравствуйте, <?= isset($profile) ? $profile->name : 'Пользователь' ?>!</p>

        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-bell2"></i>
                    <span class="visible-xs-inline-block position-right">Activity</span>
                    <span class="status-mark border-pink-300"></span>
                </a>

                <div class="dropdown-menu dropdown-content">
                    <div class="dropdown-content-heading">
                        Activity
                        <ul class="icons-list">
                            <li><a href="#"><i class="icon-menu7"></i></a></li>
                        </ul>
                    </div>

                    <ul class="media-list dropdown-content-body width-350">
                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn bg-success-400 btn-rounded btn-icon btn-xs"><i class="icon-mention"></i></a>
                            </div>

                            <div class="media-body">
                                <a href="#">Taylor Swift</a> mentioned you in a post "Angular JS. Tips and tricks"
                                <div class="media-annotation">4 minutes ago</div>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn bg-pink-400 btn-rounded btn-icon btn-xs"><i class="icon-paperplane"></i></a>
                            </div>

                            <div class="media-body">
                                Special offers have been sent to subscribed users by <a href="#">Donna Gordon</a>
                                <div class="media-annotation">36 minutes ago</div>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn bg-blue btn-rounded btn-icon btn-xs"><i class="icon-plus3"></i></a>
                            </div>

                            <div class="media-body">
                                <a href="#">Chris Arney</a> created a new <span class="text-semibold">Design</span> branch in <span class="text-semibold">Limitless</span> repository
                                <div class="media-annotation">2 hours ago</div>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn bg-purple-300 btn-rounded btn-icon btn-xs"><i class="icon-truck"></i></a>
                            </div>

                            <div class="media-body">
                                Shipping cost to the Netherlands has been reduced, database updated
                                <div class="media-annotation">Feb 8, 11:30</div>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn bg-warning-400 btn-rounded btn-icon btn-xs"><i class="icon-bubble8"></i></a>
                            </div>

                            <div class="media-body">
                                New review received on <a href="#">Server side integration</a> services
                                <div class="media-annotation">Feb 2, 10:20</div>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn bg-teal-400 btn-rounded btn-icon btn-xs"><i class="icon-spinner11"></i></a>
                            </div>

                            <div class="media-body">
                                <strong>January, 2016</strong> - 1320 new users, 3284 orders, $49,390 revenue
                                <div class="media-annotation">Feb 1, 05:46</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-profile"></i>
                </a>

                <div class="dropdown-menu dropdown-content">
                    <div class="dropdown-content-heading">
                        Мой аккаунт (<?= Yii::$app->user->identity->role->item_name ?>)
                    </div>

                    <ul class="media-list dropdown-content-body width-350">
                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn bg-success-400 btn-rounded btn-icon btn-xs"><i class="icon-reading"></i></a>
                            </div>

                            <div class="media-body">
                                <a href="<?= Url::to(['/site/profile']) ?>"><span>Мой профиль</span></a>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn bg-success-400 btn-rounded btn-icon btn-xs"><i class="icon-key"></i></a>
                            </div>

                            <div class="media-body">
                                <a href="<?= Url::to(['/site/change-password']) ?>"><span>Смена пароля</span></a>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn bg-success-400 btn-rounded btn-icon btn-xs"><i class="icon-exit3"></i></a>
                            </div>

                            <div class="media-body">
                                <?= Html::a('<span>Выход</span>',
                                    ['/site/logout'],
                                    [
                                        'data' => [
                                            'method' => 'post'
                                        ]
                                ]) ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</div>