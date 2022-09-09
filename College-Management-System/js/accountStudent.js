$(document).ready(function () {
    loadUserData()

   //when edit button from the table is clicked
   function loadUserData(){
        $.ajax({
            url: "detailsAction.php",
            type: "POST",
            data: "&action=load",
            success: function (response) {
                data = JSON.parse(response);

                $('#name').val(data[0].username);
                $('#phone').val(data[0].phone);
                $('#password').val(data[0].password);
                $('#date').val(data[0].created_on);
                
            }
        });
    }

    //insert Course ajax requests
    $("#update").click(function (e) {
        if ($("#user-data")[0].checkValidity()) {
            e.preventDefault();
            $.ajax({
                url: "insertAndUpdateAction.php",
                type: "POST",
                data: $("#user-data").serialize() + "&action=create",
                success: function (response) {
                    //alert(response)
                    loadUserData()
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'Updated',
                        text: 'Success',
                        showConfirmButton: false,
                        timer: 1900
                    })
                    
                    
                }
            });
        }
            
    });

});