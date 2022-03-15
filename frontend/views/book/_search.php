<?php
use yii\helpers\Url;
?>
<form action="<?= Url::to(['book/index'])?>" class="book-search-form">
    <div class="row mb-2 border-bottom justify-content-center">
<div class="col-11">
    <input
            class="form-control rounded-0 border-0 p-4 book-search"
            name="search"
            placeholder="Search"
            value="<?= Yii::$app->request->get('search')?>">
    </div>
        <input
                class="d-none sorter-input"
                name="sorter"
                type="text"
                value="<?= Yii::$app->request->get('sorter')?>">
    <div class="col-1 ml-auto d-flex align-items-center" onclick="$('.book-search-form').submit()">
        <i type="submit" class="fa fa-search text-muted"></i>
        <input type="submit" hidden />
    </div>
</div>
</form>