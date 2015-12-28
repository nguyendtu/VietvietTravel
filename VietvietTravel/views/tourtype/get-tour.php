<?php
    use yii\helpers\Json;

    $value = Json::encode($model);

    echo $value;

    return $value;
?>