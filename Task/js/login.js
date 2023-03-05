$(document).ready(function() {

    $('#form').submit(function() {

        $.ajax({
            type: "POST",
            url: 'php/login.php',
            data: {
                email: $("#email").val(),
                pwd: $("#pwd").val()
            },
            success: function(data)
            {
                if (data === 'Correct') {
                    window.location.replace("profile.html");
                }
                else {
                    alert(data);
                }
            }
        });

    });

});