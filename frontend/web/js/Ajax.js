$('form.subscribe').submit(function (e) {
    // prevent the page from submitting like normal
    e.preventDefault();

    var email = $('#InputEmail').val();

    $.ajax({
        type: 'POST',
        url: '/ajax/subscribe',
        data: {email: email},
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            if (data==true){
                alert('ok')
            } else {
                alert('failed');
            }
        },
    });
});