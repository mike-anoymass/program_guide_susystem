$(document).ready(function () {

    show();

   

    function show() {
        $.ajax({
            url: "actionView.php",
            type: "POST",
            data: {action: "view"},
            success: function (response) {
                $("#showMessages").html(response);
                $("#messagesTable").DataTable({
                    order: [0, 'desc'] ///order by current entry
                });
            }
        });
    }

    $("#save-btn").click(function (e) {
        if ($("#edit-data")[0].checkValidity()) {
            e.preventDefault();
            $.ajax({
                url: "insertAndUpdateAction.php",
                type: "POST",
                data: $("#edit-data").serialize() + "&action=create",
                success: function (response) { 
                    Swal.fire({
                        icon: 'success',
                        title: 'Message Sent',
                        text: 'Success',
                        showConfirmButton: false,
                        timer: 1900
                    })
                
                    
                    $("#edit-data")[0].reset();
                    show();
                    $("#messageAdd").modal('hide');
                }
            });
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<code>Make Sure you complete filling the form</code>'
              })
        }
    });

    $("body").on("click", ".delBtn", function (e) {
        e.preventDefault();
        let delBtnID = $(this).attr('id');

        Swal.fire({
            icon: 'warning',
            title: 'Do you want to delete this Question?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: "deleteAction.php",
                    type: "POST",
                    data: {delBtnID:delBtnID},
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title:'Delete Successful',
                            showConfirmButton: false,
                            timer: 1900
                         })
    
                        show()
                        
                    }
                });
            } else if (result.isDenied) {
              Swal.fire({
                icon: 'warning',
                title:'Delete Cancelled',
                showConfirmButton: false,
                timer: 1900
                })
            }
          })

    });

});