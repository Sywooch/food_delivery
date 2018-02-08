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

                                <label class="radio-inline">
                                    <input type="radio" name="Products[status]" value="1" class="styled" checked="checked">
                                    Опубликован
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="Products[status]" value="0" class="styled">
                                    Скрыт
                                </label>
                            </div>

                            <div class="form-group">
                                <label class="display-block">Фото продукта:</label>
                                <?= $form->field($model, 'image')->fileInput(['class' => 'file-styled'])->label(false) ?>
                            </div>
                        <?php else: ?>
                            <div class="form-group">
                                <label class="display-block">Статус:</label>

                                <label class="radio-inline">
                                    <input type="radio" name="Products[status]" value="1" class="styled" <?= $model->status == 1 ? 'checked="checked"' : '' ?>>
                                    Опубликован
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="Products[status]" value="0" class="styled" <?= $model->status == 0 ? 'checked="checked"' : '' ?>>
                                    Скрыт
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

                        <?= $form->field($model, 'price')->textInput(['class' => 'form-control', 'placeholder' => 'Цена продукта']) ?>

                        <?= $form->field($model, 'discount_price')->textInput(['class' => 'form-control', 'placeholder' => 'Акционная цена продукта']) ?>

                        <?= $form->field($model, 'meta_title')->textInput(['class' => 'form-control', 'placeholder' => 'Заголовок']) ?>

                        <?= $form->field($model, 'meta_description')->textarea(['class' => 'form-control', 'rows' => 2, 'cols' => 5, 'placeholder' => 'Описание']) ?>

                        <?= $form->field($model, 'composition')->widget(CKEditor::className(), [
                            'preset' => 'full'
                        ]) ?>
                        
                    </fieldset>
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-primary"><?= $model->isNewRecord ? 'Добавить' : 'Сохранить' ?> <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>