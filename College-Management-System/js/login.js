$(document).ready(function () {

    //User Login ajax requests
    $('#login').click(function (e) {

        if ($("#data")[0].checkValidity()) {
            e.preventDefault();
            $.ajax({
                url: "loginAction.php",
                type: "POST",
                data: $("#data").serialize() + "&action=login",
                success: function (response) {
                    if(response == ""){

                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Login Successful',
                            showConfirmButton: false,
                            timer: 1900
                          })

                        $('#data')[0].reset();
                        setTimeout(function (){

                            location.reload();
                        }, 2000);
                    }else{
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Invalid User Credentials',
                            showConfirmButton: true
                          })

                    }
                }
            });
        }

    });

    $("body").on("click", ".forgot_password", function (e) {
        alert("Contact the administrator to renew your password")
    })
});