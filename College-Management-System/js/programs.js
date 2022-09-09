$(document).ready(function () {

    showAllPrograms();

    var clearField = document.getElementById('clearBtn') , rIndex;


    clearField.onclick = function(e){
        $("#program-data")[0].preventDefault()
        $("#program-data")[0].reset();
    }

    function showAllPrograms() {
        $.ajax({
            url: "actionView.php",
            type: "POST",
            data: {action: "view"},
            success: function (response) {
                $("#showPrograms").html(response);
                $("#programsTable").DataTable({
                    order: [0, 'desc'] ///order by current entry
                });

                var table = document.getElementById('programsTable') , rIndex;

                for(var i = 0 ; i < table.rows.length ; i++){
                    table.rows[i].onclick = function(){
                        rIndex = this.rowIndex
                        document.getElementById('program_id').value = this.cells[0].innerHTML
                        document.getElementById('program_code').value = this.cells[1].innerHTML
                        document.getElementById('program_name').value = this.cells[2].innerHTML
                        //document.getElementById('faculty').
                        //options[ document.getElementById('faculty').selectedIndex].text = this.cells[2].innerHTML
                    }
                };
            }
        });
    }

    function validate(){
        //validate program and course
        let facultyObj = document.getElementById("faculty");
 
        let faculty = facultyObj.options[facultyObj.selectedIndex].text;
 
        if (faculty === "----Faculties-----" || faculty === "Faculties Do not Exist" || faculty === "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please Select Faculty'
              })
            return false;
        }
 
        return true;
    }



    //insert Course ajax requests
    $("#insert_btn").click(function (e) {
        if(validate()){
            if ($("#program-data")[0].checkValidity()) {
                e.preventDefault();
                $.ajax({
                    url: "insertAndUpdateAction.php",
                    type: "POST",
                    data: $("#program-data").serialize() + "&action=create",
                    success: function (response) {
                        $("#program-data")[0].reset();
                        showAllPrograms()
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
        }
            
    });


    //when delete button is clicked
    $("#delete_btn").click(function (e) {
        let number = $("#program_id").val().length
        
        if(number == 0){
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'From the table, click on the record you want to delete',
                footer: ""
              })
        }else{
            if ($("#program-data")[0].checkValidity()) {
                e.preventDefault();
    
                Swal.fire({
                    icon: 'warning',
                    title: 'Do you want to delete this program?',
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
                            data: $("#program-data").serialize() + "&action=delete",
                            success: function (response) {
                                showAllPrograms()
                                Swal.fire({
                                    icon: 'success',
                                    title:'Delete Successful',
                                    showConfirmButton: false,
                                    timer: 1900
                                    })
                                $("#program-data")[0].reset();
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

        if(validate()){
            let number = $("#program_id").val().length

            if(number == 0){
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'From the table, click on the record you want to update',
                    footer: ""
                })
            }else{
                if ($("#program-data")[0].checkValidity()) {
                    e.preventDefault();
                    $.ajax({
                        url: "insertAndUpdateAction.php",
                        type: "POST",
                        data: $("#program-data").serialize() + "&action=update",
                        success: function (response) {
                            
                            $("#program-data")[0].reset();
                            showAllPrograms();
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
        }
    });

    
    $("body").on("click", ".subjectsBtn", function (e) {
        e.preventDefault();
        let subjectsBtnID = $(this).attr('id');

        $.ajax({
            url: "initializeSessionVars.php",
            type: "POST",
            data: {subjectsBtnID :subjectsBtnID },
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Loading Subjects',
                    footer: response,
                    showConfirmButton: false,
                    timer: 1500
                })

                setTimeout(function (){
                    location = "/college-management-system/views/admin/programs&subjects/";
                }, 2000);

              
            }
        });

    })


});