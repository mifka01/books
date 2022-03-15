<?php
/* @var $model \common\models\Book */
use \yii\helpers\Url;
?>
    <a href="<?= Url::to(['book/update','id' =>$model->id])?>" class="item-link text-decoration-none">
    <li class="list-group-item border-top-0 border-left-0 border-right-0">
        <div class="row">
        <?=$model->title?>
        &raquo;
        <?=$model->publishion_date?>
        <div class="ml-auto">
            <?= $model->available
                ? '<div class="text-success"><i class="fa fa-check"></i> Available</div>'
                : '<div class="text-success"><i class="fa fa-xmark"></i> Unvailable</div>'?>
        </div>
            <div class="ml-auto">
                Already borrowed <?= $model->getBorrowings()->count();?> times
            </div>
        </div>
    </li>
        </a>

