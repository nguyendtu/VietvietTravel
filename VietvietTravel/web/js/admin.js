/**
 * Created by @TuNguyen: duytu.nguyen@outlook.com on 4/1/2016.
 */

$(document).ready(function(){
    $(".wrap").on("click", "button#btn-remove-file .glyphicon-trash", function(event){
        var target = event.target.closest('.file-thumbnail-footer'),
            thumb  = target.closest('.file-preview-frame'),
            master = thumb.closest('.file-preview-thumbnails'),
            input  = event.target;

        target = target.getElementsByClassName('file-footer-caption')[0];

        // delete on server
        $.post('/file-upload/delete/' + target.getAttribute('title'));

        // delete on thumbnail
        master.removeChild(thumb);

        if(input.getAttribute('data-input').indexOf('large') >= 0){

            var arr = $("#" + input.getAttribute("data-input")).val().split(" ");
            for(var i = 0; i< arr.length; i++){
                if(arr[i] === target.getAttribute('title')){
                    arr.splice(i, 1);
                }
            }

            $('#' + input.getAttribute('data-input')).val(arr.join(" "));
            if(!$('[name="limg"]').find('.file-preview-thumbnails').children().length){
                $('[name="limg"]').find('.file-drop-zone-title.hide').toggleClass('hide');
            }
        }else{
            $('#' + input.getAttribute('data-input')).val("");

            if(!master.length){
                $('[name="simg"]').find('.file-drop-zone-title.hide').toggleClass('hide');
            }
        }


        //$('#infocompany-logo').val("");
        //$('#slide-image').val("");
    });
});