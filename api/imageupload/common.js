<script>
    jQuery(document).on('click', 'button#action-upl-file', function(e){
        e.preventDefault();
    var formData = new FormData();
    formData.append('name', jQuery('form#upload-file').find('.input-upl-name').val());
    formData.append('file_url', jQuery('form#upload-file').find('input#file-url')[0].files[0]);
        $.ajax({
        url: baseurl + 'action.php',
    type: 'post',
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    dataType:'json',
            beforeSend: function() {
        $('button#action-upl-file').button('loading');
},
            complete: function () {
        jQuery('button#action-upl-file').button('reset');
    jQuery('form#upload-file')[0].reset();
},
            success: function(json) {
        $('.text-danger').remove();
                if (json['error']) {             
                    for (i in json['error']) {
                        var element = $('.input-upl-' + i.replace('_', '-'));
                        if ($(element).parent().hasClass('input-group')) {
        $(element).parent().after('<div class="text-danger" style="font-size: 14px;">' + json['error'][i] + '</div>');
                        } else {
        $(element).after('<div class="text-danger" style="font-size: 14px;">' + json['error'][i] + '</div>');
}
}
                } else {
        jQuery('#render-image').html('<img src="' + json.file_name + '" class="img-thumbnail">');
}
}
});
});
</script>