<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Смена пароля';
?>

<?php $form = ActiveForm::begin([
    'id' => 'change-password-form',
    'enableAjaxValidation' => true,
]); ?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Смена пароля</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">

            <?= $form->field($model, 'newPassword')->passwordInput(['class' => 'form-control']) ?>

            <?= $form->field($model, 'newPasswordConfirm')->passwordInput(['class' => 'form-control']) ?>

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Сохранить <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>