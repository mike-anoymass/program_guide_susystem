$(document).ready(function () {

    show();


    function show() {
        $.ajax({
            url: "actionView.php",
            type: "POST",
            data: {action: "view"},
            success: function (response) {
                $("#show").html(response);
                $("#subjectTable").DataTable({
                    order: [0, 'desc'] ///order by current entry
                });
            }
        });
    }

    function validate(){
        //validate program and course
        let subObj = document.getElementById("subject");
        let gradeObj = document.getElementById("grade");
 
        let subject = subObj.options[subObj.selectedIndex].text;
        let grade = gradeObj.options[gradeObj.selectedIndex].text;
 
        if (subject === "----Subjects-----" || subject=== "Subjects Do not Exist" || subject === "") {
            return false;
        }

        if (grade === "----Grades-----" || grade === "Grade Do not Exist" || grade === "") {
            return false;
        }
 
        return true;
    }



    //insert Course ajax requests
    $("#insert_btn").click(function (e) {
        e.preventDefault();
        if(validate()){
            if ($("#ps-data")[0].checkValidity()) {
                e.preventDefault();
                $.ajax({
                    url: "insertAndUpdateAction.php",
                    type: "POST",
                    data: $("#ps-data").serialize() + "&action=create",
                    success: function (response) {
                        $("#ps-data")[0].reset();
                        show()
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
                                text: 'Something went wrong',
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
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please Select Subject or Grade'
              })
        }
            
    });


    $("body").on("click", ".delBtn", function (e) {
        e.preventDefault();
        let delBtnID = $(this).attr('id');

        Swal.fire({
            icon: 'warning',
            title: 'Do you want to delete this subject entry?',
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