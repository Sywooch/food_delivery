<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use dosamigos\ckeditor\CKEditor;
?>


<?php $form = ActiveForm::begin([
    'id' => 'category-form',
    'options' => [
//        'class' => 'form-horizontal'
    ]
]); ?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><?= $model->isNewRecord ? 'Продукт' : 'Продукт: '.$model->title ?></h5>
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
                        <legend class="text-semibold"><i class="icon-newspaper position-left"></i> Основная информация</legend>

                        <?= $form->field($model, 'title')->textInput(['class' => 'form-control', 'placeholder' => 'Название продукта']) ?>

                        <?php if($model->isNewRecord): ?>
                            <div class="form-group">
                                <label class="display-block">Статус:</label>

                                <div class="checkbox checkbox-right checkbox-switchery">
                                    <label>
                                        <input type="checkbox" class="switchery" name="Products[status]" value="0">
                                        Скрыть продукт
                                    </label>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="display-block">Фото продукта:</label>
                                <?= $form->field($model, 'image')->fileInput(['class' => 'file-styled'])->label(false) ?>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <?= $form->field($model, 'picture_alt')->textInput(['class' => 'form-control', 'placeholder' => 'Alt']) ?>
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($model, 'picture_title')->textInput(['class' => 'form-control', 'placeholder' => 'Title']) ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="form-group">
                                <label class="display-block">Статус:</label>

                                <div class="checkbox checkbox-right checkbox-switchery">
                                    <?php if($model->status == 1): ?>
                                        <label>
                                            <input type="checkbox" class="switchery" name="Products[status]" value="0">
                                            Скрыть продукт
                                        </label>
                                    <?php else: ?>
                                        <label>
                                            <input type="checkbox" class="switchery" name="Products[status]" value="1">
                                            Отображать продукт
                                        </label>
                                    <?php endif;?>
                                </div>

                            </div>

                            <div class="media no-margin-top">
                                <div class="media-left">
                                    <a href="#"><img src="<?= !empty($model->picture) ? $model->picture : '/backend/web/images/placeholder.jpg' ?>" style="width: 58px; height: 58px; border-radius: 2px;" alt=""></a>
                                </div>

                                <div class="media-body">
                                    <div class="uploader">
                                        <?= $form->field($model, 'image')->fileInput(['class' => 'file-styled'])->label(false) ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <?= $form->field($model, 'picture_alt')->textInput(['class' => 'form-control', 'placeholder' => 'Alt']) ?>
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($model, 'picture_title')->textInput(['class' => 'form-control', 'placeholder' => 'Title']) ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?= $form->field($model, 'category_id')->dropDownList(
                            ArrayHelper::map(\common\models\Category::find()->all(), 'id', 'name'),
                            ['prompt' => 'Выберите категорию', 'class' => 'select'])
                        ?>

                        <?= $form->field($model, 'description')->widget(CKEditor::className(), [
                            'preset' => 'full'
                        ]) ?>

                    </fieldset>
                </div>

                <div class="col-md-6">
                    <fieldset>
                        <legend class="text-semibold"><i class="icon-price-tag2 position-left"></i> Дополнительные данные</legend>

                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'price')->textInput(['class' => 'form-control', 'placeholder' => 'Цена продукта']) ?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($model, 'discount_price')->textInput(['class' => 'form-control', 'placeholder' => 'Акционная цена продукта']) ?>
                            </div>
                        </div>

                        <?= $form->field($model, 'composition')->widget(CKEditor::className(), [
                            'preset' => 'full'
                        ]) ?>
                        
                    </fieldset>
                </div>
            </div>

            <fieldset>
                <legend class="text-semibold">
                    <i class="icon-file-empty position-left"></i>
                    Мета данные
                    <a class="control-arrow" data-toggle="collapse" data-target="#demo2">
                        <i class="icon-circle-down2"></i>
                    </a>
                </legend>

                <div class="collapse in" id="demo2">
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
                </div>
            </fieldset>

            <div class="text-right">
                <button type="submit" class="btn btn-primary"><?= $model->isNewRecord ? 'Добавить' : 'Сохранить' ?> <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>