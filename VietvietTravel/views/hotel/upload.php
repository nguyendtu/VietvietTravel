<?php
    use dosamigos\fileupload\FileUploadUI;
?>
<?= FileUploadUI::widget([
    'model' => $small,
    'attribute' => 'fileUpload',
    'url' => ['file-upload/upload'],
    'gallery' => false,
    'options' => ['id' => 'smallimg'],
    'fieldOptions' => [
        'accept' => 'image/*',
    ],
    'clientOptions' => [
        'maxFileSize' => 2000000
    ],
    'clientEvents' => [
        'fileuploaddone' => 'function(e, data) {
                                    var smallimg = document.getElementById("hotel-smallimg");
                                    smallimg.value = "";
                                    var files = data.result.files;
                                    for(var i = 0; i < files.length; i++){
                                        smallimg.value = files[i].name;
                                    }
                                }',
        'fileuploadfail' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
    ],
]);
?>