<?php

/** @var yii\web\View $this */
use yii\helpers\Url;
$this->title = 'Books Administration';
?>
<div class="site-index">

    <div class=" text-center bg-transparent mb-5">
        <h1 class="display-4">Administration!</h1>
    </div>

    <div class="body-content">
        <div class="row mb-5">
            <div class="col-lg-3">
                <h2>Book</h2>
                <p><a class="text-dark" href="<?= Url::to(['book/index'])?>">Continue &raquo;</a></p>
            </div>
            <div class="col-lg-3">
                <h2>Author</h2>
                <p><a class="text-dark" href="<?= Url::to(['author/index'])?>">Continue &raquo;</a></p>
            </div>
            <div class="col-lg-3">
                <h2>Illustrator</h2>
                <p><a class="text-dark" href="<?= Url::to(['illustrator/index'])?>">Continue &raquo;</a></p>
            </div>
            <div class="col-lg-3">
                <h2>Publisher</h2>
                <p><a class="text-dark" href="<?= Url::to(['publisher/index'])?>">Continue &raquo;</a></p>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-lg-3">
                <h2>User</h2>
                <p><a class="text-dark" href="<?= Url::to(['user/index'])?>">Continue &raquo;</a></p>
            </div>

        </div>

    </div>
</div>
