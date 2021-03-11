
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function commentTemplate(comment){
    let template =  $('#commentTemplate').clone(true);
    console.log(template);
    template.removeClass('d-none');
    template.removeAttr('id');
    template.find('.avatar').attr('src',comment.avatar);
    template.find('.comment-author vcard b').text(comment.name);
    template.find('.comment-meta-data').text(comment.date);
    template.find('.comment-content p').html(comment.comment);
    $('.comment-list').prepend(template);
}

$('#commentform').on('submit', function(e) {
    e.preventDefault();
    var formdata = new FormData(this);
    var url = $(this).attr('action');
    $.ajax({
        url: url,
        type: "POST",
        cache: false,
        contentType: false,
        processData: false,
        data: formdata,
        success: function(data) {
            if (data.success) {
                successMsg("Success", data.msg); 
                commentTemplate(data.data); 
                $('.comments_count').each(function() {
                    $(this).text(parseInt($(this).text()) + 1);
                });      
                $(this).trigger('reset');  
            }
            else{
                errorMsg("Error", data.msg);        
            }

        }
    });
});

$('.limit_50').each(function() {
    var text = $(this).text();
    console.log(text);
    $(this).html(text.substr(0, 50));
    $(this).css('display', 'block');
});


$('.limit_100').each(function() {
    var text = $(this).text();
    console.log(text);
    $(this).html(text.substr(0, 100));
    $(this).css('display', 'block');
});


