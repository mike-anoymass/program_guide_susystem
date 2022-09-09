$(document).ready(function () {

    showAllGrades();

    function showAllGrades() {
        $.ajax({
            url: "actionView.php",
            type: "POST",
            data: {action: "view"},
            success: function (response) {
                $("#showGrades").html(response);
                $("#gradesTable").DataTable({
                    order: [0, 'desc'] ///order by current entry
                });

                var table = document.getElementById('gradesTable') , rIndex;

                for(var i = 0 ; i < table.rows.length ; i++){
                    table.rows[i].onclick = function(){
                        rIndex = this.rowIndex
                        document.getElementById('grade_id').value = this.cells[0].innerHTML
                        document.getElementById('description').value = this.cells[1].innerHTML
                    }
                };
            }
        });
    }



    //insert Course ajax requests
    $("#insert_btn").click(function (e) {
            if ($("#grade-data")[0].checkValidity()) {
                e.preventDefault();
                $.ajax({
                    url: "insertAndUpdateAction.php",
                    type: "POST",
                    data: $("#grade-data").serialize() + "&action=create",
                    success: function (response) {
                        if(response === "1"){
                            Swal.fire({
                                icon: 'success',
                                title: 'Saving Faculty',
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
                        
                        $("#grade-data")[0].reset();
                        showAllGrades();
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


    //when delete button is clicked
    $("#delete_btn").click(function (e) {
        let number = $("#grade_id").val().length

        if(number == 0){
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'From the table, click on the record you want to delete',
                footer: ""
              })
        }else{
            if ($("#grade-data")[0].checkValidity()) {
                e.preventDefault();
    
                Swal.fire({
                    icon: 'warning',
                    title: 'Do you want to delete this grade?',
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
                            data: $("#grade-data").serialize() + "&action=delete",
                            success: function (response) {
                                showAllGrades();
                                Swal.fire({
                                    icon: 'success',
                                    title:'Delete Successful',
                                    showConfirmButton: false,
                                    timer: 1900
                                    })
                                $("#grade-data")[0].reset();
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
            }
        }

        

    });



});