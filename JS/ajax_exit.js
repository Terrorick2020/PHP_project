$("#exit_user").click(function() {
    $.ajax({
        url: '../ajax/exit.php',
        type: 'POST',
        cache: false,
        data: {},
        dataType: 'html',
        success: (data) => {
            document.location.reload(true);
        }
    })
})