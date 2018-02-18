<?php
$this->title = 'Редактирование продукта';
?>

<?=
$this->render('_form', [
    'seo' => $seo,
    'model' => $model
]);
?>
