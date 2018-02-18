<?php
$this->title = 'Добавление нового продукта';
?>

<?=
$this->render('_form', [
    'seo' => $seo,
    'model' => $model
]);
?>
