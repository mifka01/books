<?php

/** @var $dataProvider \yii\data\ActiveDataProvider */
?>
    <ul class="list-group">
        <?php echo \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
        'summary'=>false
        ])?>
    </ul>
