/**
 * Created with JetBrains PhpStorm.
 * User: ICap
 * Date: 30.10.13
 * Time: 20:49
 * To change this template use File | Settings | File Templates.
 */

jQuery(document).ready(function(){
    $("a#pre_foto_up").fancybox({
        'titleShow': false/*,
        'width': 250,
        'height':250,
        'autoDimensions':false,
        'type':'iframe',
        'autoSize' : false*/

    });

    $("a#download_jpg").fancybox({
       'titleShow':false,
        'width':750,
        'height':650,
        'type':'iframe',
        'scrolling': false,
        'scrollHeight':false,
        'autoScale':false
    });
    $("a#download_tiff").fancybox({
        'titleShow':false,
        'width':750,
        'height':650,
        'type':'iframe',
        'scrolling': false,
        'scrollHeight':false,
        'autoScale':false
    });

    $('#all').click(function() {
        var checked_status = this.checked;
        $('input[id=checker]').each(function() {
            this.checked = checked_status;
        });
    });

    $(function() {
        $( "#datepicker" ).datepicker();
        $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
    });
    $(function() {
        $( "#datepicker2" ).datepicker();
        $( "#datepicker2" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
    });




});
function GoUpload_now(){
    window.location.href= "/uploader/";
}
function GoInWork_now(){
    window.location.href= "/inwork/";
}
function GoBilling_now(){
    window.location.href= "/billing/";
}
function GoPhotoBase_now(){
    window.location.href= "/photobase/";
}
function LogOut_now(){
    window.location.href= "/auth/close/";
}

$(function() {
    $("#mG3").microgallery({
        menu		:true,
        size		:'large',
        mode		:'single',
        cycle       :true,
        autoplay    :false,
        autoplayTime:2000
    });

});
function Work(){

    $('#reg_r').click(function() {
        $.blockUI({
            message: $('#growlUI'),
            fadeIn: 700,
            fadeOut: 700,
            timeout: 2000,
            showOverlay: false,
            centerY: false,
            css: {
                width: '350px',
                top: '10px',
                left: '',
                right: '10px',
                border: 'none',
                padding: '5px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .6,
                color: '#fff'
            }
        });
    });
}

