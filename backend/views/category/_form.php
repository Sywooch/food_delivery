<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\ckeditor\CKEditor;
?>

<div class="col-md-9">
    <?php $form = ActiveForm::begin(['id' => 'category-form']); ?>
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Категория</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <fieldset>
                    <legend class="text-semibold">
                        <i class="icon-newspaper position-left"></i>
                        Общие данные
                        <a class="control-arrow" data-toggle="collapse" data-target="#demo1">
                            <i class="icon-circle-down2"></i>
                        </a>
                    </legend>

                    <div class="collapse in" id="demo1">

                        <?= $form->field($model, 'name')->textInput(['class' => 'form-control', 'placeholder' => 'Название категории']) ?>

                        <?= $form->field($model, 'description')->widget(CKEditor::className(), [
                            'preset' => 'full'
                        ]) ?>

                        <?php if($model->isNewRecord): ?>
                            <div class="form-group">
                                <label class="display-block">Статус:</label>

                                <label class="radio-inline">
                                    <input type="radio" name="Category[status]" value="1" class="styled" checked="checked">
                                    Опубликована
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="Category[status]" value="0" class="styled">
                                    Скрыта
                                </label>
                            </div>

                            <div class="form-group">
                                <label class="display-block">Фото категории:</label>
                                <?= $form->field($model, 'image')->fileInput(['class' => 'file-styled'])->label(false) ?>
                            </div>
                        <?php else: ?>
                            <div class="form-group">
                                <label class="display-block">Статус:</label>

                                <label class="radio-inline">
                                    <input type="radio" name="Category[status]" value="1" class="styled" <?= $model->status == 1 ? 'checked="checked"' : '' ?>>
                                    Опубликована
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="Category[status]" value="0" class="styled" <?= $model->status == 0 ? 'checked="checked"' : '' ?>>
                                    Скрыта
                                </label>
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
                        <?php endif; ?>

                        <?= $form->field($model, 'picture_alt')->textInput(['class' => 'form-control', 'placeholder' => 'Alt']) ?>

                        <?= $form->field($model, 'picture_title')->textInput(['class' => 'form-control', 'placeholder' => 'Title']) ?>

                    </div>
                </fieldset>

                <fieldset>
                    <legend class="text-semibold">
                        <i class="icon-file-empty position-left"></i>
                        Мета данные
                        <a class="control-arrow" data-toggle="collapse" data-target="#demo2">
                            <i class="icon-circle-down2"></i>
                        </a>
                    </legend>

                    <div class="collapse in" id="demo2">

                        <?= $form->field($model, 'meta_title')->textInput(['class' => 'form-control', 'placeholder' => 'Заголовок']) ?>

                        <?= $form->field($model, 'meta_description')->textarea(['class' => 'form-control', 'rows' => 5, 'cols' => 5, 'placeholder' => 'Описание']) ?>

                    </div>
                </fieldset>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary"><?= $model->isNewRecord ? 'Добавить' : 'Сохранить' ?> <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>