<?php

$this->title = 'Добавление новой категории';
?>

<?=
    $this->render('_form', [
        'seo' => $seo,
        'model' => $model
    ]);
?>
