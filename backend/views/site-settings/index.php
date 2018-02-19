<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Настройки сайта';
?>

<?php $form = ActiveForm::begin(['id' => 'site-settings-form',]); ?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Настройки сайта</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <fieldset>
                        <legend class="text-semibold"><i class="icon-store position-left"></i> Основная информация</legend>

                        <?= $form->field($model, 'name')->textInput(['class' => 'form-control', 'placeholder' => 'Название']) ?>

                        <div class="media no-margin-top">
                            <div class="media-left">
                                <a href="#"><img src="<?= !empty($model->logo) ? $model->logo : '/backend/web/images/placeholder.jpg' ?>" style="width: 58px; height: 58px; border-radius: 2px;" alt=""></a>
                            </div>

                            <div class="media-body">
                                <div class="uploader">
                                    <?= $form->field($model, 'site_logo')->fileInput(['class' => 'file-styled'])->label(false) ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'logo_alt')->textInput(['class' => 'form-control', 'placeholder' => 'Alt']) ?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($model, 'logo_title')->textInput(['class' => 'form-control', 'placeholder' => 'Title']) ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'time_from')->textInput(['class' => 'form-control', 'id' => 'anytime-time']) ?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($model, 'time_to')->textInput(['class' => 'form-control', 'id' => 'anytime-time-second']) ?>
                            </div>
                        </div>

                        <?= $form->field($model, 'contact_email')->textInput(['class' => 'form-control']) ?>

                        <?= $form->field($model, 'main_address')->widget(\kalyabin\maplocation\SelectMapLocationWidget::className(), [
                            'attributeLatitude' => 'latitude',
                            'attributeLongitude' => 'longitude',
                            'googleMapApiKey' => 'AIzaSyDvdY_YjgJ2FCdyfMZ89DGodrrtOXpvETA',
                        ]); ?>

                    </fieldset>

                </div>

                <div class="col-md-6">
                    <fieldset>
                        <legend class="text-semibold"><i class="icon-bubbles10 position-left"></i> Социальные сети</legend>

                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'facebook_url')->textInput(['class' => 'form-control', 'placeholder' => 'Ссылка']) ?>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="display-block">Facebook:</label>

                                    <div class="checkbox checkbox-right checkbox-switchery">
                                        <?php if($model->facebook_status == 1): ?>
                                            <label>
                                                <input type="checkbox" class="switchery" name="SiteSettings[facebook_status]" value="0">
                                                Скрыть
                                            </label>
                                        <?php else: ?>
                                            <label>
                                                <input type="checkbox" class="switchery" name="SiteSettings[facebook_status]" value="1">
                                                Отображать
                                            </label>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'instagram_url')->textInput(['class' => 'form-control', 'placeholder' => 'Ссылка']) ?>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="display-block">Instagram:</label>

                                    <div class="checkbox checkbox-right checkbox-switchery">
                                        <?php if($model->instagram_status == 1): ?>
                                            <label>
                                                <input type="checkbox" class="switchery" name="SiteSettings[instagram_status]" value="0">
                                                Скрыть
                                            </label>
                                        <?php else: ?>
                                            <label>
                                                <input type="checkbox" class="switchery" name="SiteSettings[instagram_status]" value="1">
                                                Отображать
                                            </label>
                                        <?php endif;?>
                                    </div>

<!--                                    <label class="radio-inline">-->
<!--                                        <input type="radio" name="SiteSettings[instagram_status]" value="1" class="styled" --><?//= $model->instagram_status == 1 ? 'checked="checked"' : '' ?><!-->
<!--                                        Отображать-->
<!--                                    </label>-->
<!--
<!--                                    <label class="radio-inline">-->
<!--                                        <input type="radio" name="SiteSettings[instagram_status]" value="0" class="styled" --><?//= $model->instagram_status == 0 ? 'checked="checked"' : '' ?><!-->
<!--                                        Скрыть-->
<!--                                    </label>-->
                                </div>
                            </div>
                        </div>

                    </fieldset>
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Сохранить <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>

<?php $form = ActiveForm::begin(['id' => 'site-seo-settings-form',]); ?>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">SEO</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>
    </div>

    <div class="panel-body">
        <fieldset>
            <legend class="text-semibold"><i class="icon-store position-left"></i> Основная информация</legend>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($seo, 'title_page')->textInput(['class' => 'form-control']) ?>

                    <?= $form->field($seo, 'meta_title')->textInput(['class' => 'form-control']) ?>

                    <?= $form->field($seo, 'meta_description')->textarea(['class' => 'form-control']) ?>

                    <?= $form->field($seo, 'og_title')->textInput(['class' => 'form-control']) ?>

                    <?= $form->field($seo, 'og_description')->textarea(['class' => 'form-control']) ?>

                    <label class="control-label">og:image</label>
                    <div class="media no-margin-top">
                        <div class="media-left">
                            <a href="#"><img src="<?= !empty($seo->og_image) ? $seo->og_image : '/backend/web/images/placeholder.jpg' ?>" style="width: 58px; height: 58px; border-radius: 2px;" alt=""></a>
                        </div>

                        <div class="media-body">
                            <div class="uploader">
                                <?= $form->field($seo, 'facebook_image')->fileInput(['class' => 'file-styled'])->label(false) ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <?= $form->field($seo, 'twitter_card')->textInput(['class' => 'form-control']) ?>

                    <?= $form->field($seo, 'twitter_title')->textInput(['class' => 'form-control']) ?>

                    <?= $form->field($seo, 'twitter_description')->textarea(['class' => 'form-control']) ?>

                    <label class="control-label">twitter:image</label>
                    <div class="media no-margin-top">
                        <div class="media-left">
                            <a href="#"><img src="<?= !empty($seo->twitter_image) ? $seo->twitter_image : '/backend/web/images/placeholder.jpg' ?>" style="width: 58px; height: 58px; border-radius: 2px;" alt=""></a>
                        </div>

                        <div class="media-body">
                            <div class="uploader">
                                <?= $form->field($seo, 'twitter_image_upload')->fileInput(['class' => 'file-styled'])->label(false) ?>
                            </div>
                        </div>
                    </div>

                    <?= $form->field($seo, 'twitter_image_alt')->textInput(['class' => 'form-control']) ?>

                    <?= $form->field($seo, 'page_priority')->dropDownList([
                                '0.4' => '0.4',
                                '0.6' => '0.6',
                                '0.8' => '0.8',
                                '1' => '1'
                            ],
                        ['prompt' => 'Выберите приоритет страницы', 'class' => 'select'])
                    ?>

                    <?= $form->field($seo, 'update_frequency')->dropDownList([
                        'day' => 'Ежедневно',
                        'week' => 'Еженедельно',
                        'month' => 'Ежемесячно'
                    ],
                        ['prompt' => 'Выберите частоту обновления', 'class' => 'select'])
                    ?>
                </div>
            </div>

        </fieldset>

        <div class="text-right">
            <button type="submit" class="btn btn-primary">Сохранить <i class="icon-arrow-right14 position-right"></i></button>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
