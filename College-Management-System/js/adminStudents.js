$(document).ready(function () {

    show();

   

    function show() {
        $.ajax({
            url: "actionView.php",
            type: "POST",
            data: {action: "view"},
            success: function (response) {
                $("#showStudents").html(response);
                $("#messagesTable").DataTable({
                    order: [0, 'desc'] ///order by current entry
                });
            }
        });
    }



   //when edit button from the table is clicked
   $("body").on("click", ".editBtn", function (e) {
       
        e.preventDefault();
        let editBtnID = $(this).attr('id');
        $.ajax({
            url: "detailsAction.php",
            type: "POST",
            data: {editBtnID:editBtnID},
            success: function (response) {
                data = JSON.parse(response);

                $('#subject').val(data[0].subject);
                $('#body').val(data[0].body);
                $('#response').val(data[0].response);
                $('#message_id').val(data[0].messageID);
                
            }
        });
    });

    $("#update").click(function (e) {
        if ($("#edit-data")[0].checkValidity()) {
            e.preventDefault();
            $.ajax({
                url: "insertAndUpdateAction.php",
                type: "POST",
                data: $("#edit-data").serialize() + "&action=create",
                success: function (response) { 
                    Swal.fire({
                        icon: 'success',
                        title: 'Response Sent',
                        text: 'Success',
                        showConfirmButton: false,
                        timer: 1900
                    })
                
                    
                    $("#edit-data")[0].reset();
                    show();
                    $("#editMessageModal").modal('hide');
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
            title: 'Do you want to delete this Student?',
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