$(document).ready(function () {

    showAllSubjects();

    var clearField = document.getElementById('clearBtn') , rIndex;


    clearField.onclick = function(e){
        $("#subject-data")[0].preventDefault()
        $("#subject-data")[0].reset();
    }

    function showAllSubjects() {
        $.ajax({
            url: "actionView.php",
            type: "POST",
            data: {action: "view"},
            success: function (response) {
                $("#showSubjects").html(response);
                $("#subjectsTable").DataTable({
                    order: [0, 'desc'] ///order by current entry
                });

                var table = document.getElementById('subjectsTable') , rIndex;

                for(var i = 0 ; i < table.rows.length ; i++){
                    table.rows[i].onclick = function(){
                        rIndex = this.rowIndex
                        document.getElementById('subject_id').value = this.cells[0].innerHTML
                        document.getElementById('subject_name').value = this.cells[1].innerHTML
                        document.getElementById('description').value = this.cells[2].innerHTML
                    }
                };

            }
        });
    }



    //insert Course ajax requests
    $("#insert_btn").click(function (e) {
            if ($("#subject-data")[0].checkValidity()) {
                e.preventDefault();
                $.ajax({
                    url: "insertAndUpdateAction.php",
                    type: "POST",
                    data: $("#subject-data").serialize() + "&action=create",
                    success: function (response) {
                        if(response === "1"){
                            Swal.fire({
                                icon: 'success',
                                title: 'Saving Subject',
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
                        
                        $("#subject-data")[0].reset();
                        showAllSubjects();
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
        let number = $("#subject_id").val().length

        if(number == 0){
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'From the table, click on the record you want to delete',
                footer: ""
              })
        }else{
            if ($("#subject-data")[0].checkValidity()) {
                e.preventDefault();
    
                Swal.fire({
                    icon: 'warning',
                    title: 'Do you want to delete this subject?',
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
                            data: $("#subject-data").serialize() + "&action=delete",
                            success: function (response) {
                                showAllSubjects();
                                Swal.fire({
                                    icon: 'success',
                                    title:'Delete Successful',
                                    showConfirmButton: false,
                                    timer: 1900
                                    })
                                $("#subject-data")[0].reset();
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


    //update Faculty ajax requests
    $("#update_btn").click(function (e) {
        let number = $("#subject_id").val().length

        if(number == 0){
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'From the table, click on the record you want to update',
                footer: ""
              })
        }else{
            if ($("#subject-data")[0].checkValidity()) {
                e.preventDefault();
                $.ajax({
                    url: "insertAndUpdateAction.php",
                    type: "POST",
                    data: $("#subject-data").serialize() + "&action=update",
                    success: function (response) {
                        $("#subject-data")[0].reset();
                        showAllSubjects();
                        Swal.fire({
                            icon: 'success',
                            title:'Update Successful',
                            showConfirmButton: false,
                            timer: 1900
                            })
                    }
                });
            }
        }

    });

});