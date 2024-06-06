$("#login_user").click(function() {
    let email = $("#useremail").val();
    let pass = $("#userpass").val();

    $.ajax({
        url: '../ajax/log.php',
        type: 'POST',
        cache: false,
        data: {
            'useremail': email,
            'userpass': pass
        },
        dataType: 'html',
        success: (data) => {
            if (data === 'Done') {
                $("#login_user").text("Вы вошли");
                $("#error-block").hide();
                document.location.reload(true);
            }
            else {
                $("#error-block").show();
                $("#error-block").text(data);
            }
        }
    })
});