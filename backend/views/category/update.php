<?php

$this->title = 'Редактирование категории';
?>

<?=
$this->render('_form', [
    'seo' => $seo,
    'model' => $model
]);
?>
