<?php
/* @var $model \common\models\Book */
use \yii\helpers\Url;
?>
    <a href="<?= Url::to(['book/view','id' =>$model->id])?>" class="item-link text-decoration-none">
    <li class="list-group-item border-top-0 border-left-0 border-right-0">
        <div class="row">
        <?=$model->title?>
        &raquo;
        <?=$model->getAuthor()->fullName()?>
        <div class="ml-auto">
            <?= $model->available
                ? '<div class="text-success"><i class="fa fa-check"></i> Available</div>'
                : '<div class="text-danger"><i class="fa fa-exclamation"></i> Unvailable</div>'?>
        </div>
        </div>
    </li>
        </a>

