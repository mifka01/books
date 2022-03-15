<?php
/* @var $model \common\models\Borrowing */
?>

<div class="row">


<h2><?=$model->getBook()->one()->title?></h2></div>
<div class="row text-muted">
    ISBN &raquo; <?= $model->getBook()->one()->isbn?>
</div>

<div class="row mt-3">
    Has been successfully borrowed.
    <br>
    The book will be waiting for you at our branch.
</div>
<div class="row mt-3">
    Return date &raquo &nbsp;<strong><?= $model->return_date?></strong>
</div>
