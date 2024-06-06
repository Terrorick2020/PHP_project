$('#reg_user').click(function() {
    let name = $('#username').val();
    let email = $('#useremail').val();
    let pass = $('#userpass').val();

    $.ajax({
        url: '../ajax/reg.php',
        type: 'POST',
        cache: false,
        data: {
            'username': name,
            'useremail': email,
            'userpass': pass
        },
        dataType: 'html',
        success: (data) => {
            if(data === 'Done'){
                $('#reg_user').text("Всё готово");
                $('#error-block').hide();
            }
            else {
                $('#error-block').show();
                $("#error-block").text(data);
            }
        }
    });
})