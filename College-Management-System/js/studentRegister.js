$(document).ready(function () {

  

    //insert Course ajax requests
    $("#btn-save").click(function (e) {
            if ($("#student-data")[0].checkValidity()) {
                e.preventDefault();
                if($("#password").val() === $("#password2").val()){
                    $.ajax({
                        url: "registerAction.php",
                        type: "POST",
                        data: $("#student-data").serialize() + "&action=create",
                        success: function (response) {
                            if(response === "1"){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Saving you data',
                                    text: 'Success',
                                    showConfirmButton: false,
                                    timer: 1900
                                  })
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                    footer: response
                                  })
                            }
                            
                            $("#student-data")[0].reset();
                            
                            setTimeout(function (){
                                location = "/college-management-system/login/login.php";
                            }, 2000);
                        }
                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<code>Passwords do not match</code>'
                      })
                }
                
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<code>Make Sure you complete filling the form</code>'
                  })
            }
    });


});