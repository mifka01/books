<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';

use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
?>
<?php
$model;
Pjax::begin([
    // Pjax options
]);
    $form = ActiveForm::begin([
        'options' => ['data' => ['pjax' => true]],
        // more ActiveForm options
    ]);

ActiveForm::end();
    Pjax::end();
?>
<div class="site-index">
</div>
