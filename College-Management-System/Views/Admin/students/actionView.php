<?php

    require_once "classAutoload.php";
    
    if (isset($_POST['action']) && $_POST['action'] === "view") {
        $output = '';
        $view = new StudentsView;
        $data = $view->getStudents();

        if ($data) {
            $output .= '
            <div class="row">
            <div class="col-md-12 ml-2">
                <section class="mt-3">
                    <table class="w-100 table-elements table-three-tr" cellpadding="3" 
                      id="subjectsTable">
                        <thead>
                        <tr class="table-tr-head table-three text-white">
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Surname</th>
                            <th>Gender</th>
                            <th>Residential Address</th>
                            <th>Phone</th>
                            <th>Previous School</th>
                            <th>MSCE Year</th>
                            <th>Registered On</th>
                            <th>Actions</th>
                        </tr>
                        
                         <tbody>';

            foreach ($data as $rows) {


                $output .= '
                            
                            <tr style="cursor:pointer">
                                <td style="font-size: 14px;">'.$rows['firstname'].'</td>
                                <td style="font-size: 14px;">'.$rows['middlename'].'</td>
                                <td style="font-size: 14px;">'.$rows['lastname'].'</td>
                                <td style="font-size: 14px;">'.$rows['gender'].'</td>
                                <td style="font-size: 14px;">'.$rows['address'].'</td>
                                <td style="font-size: 14px;">'.$rows['phone'].'</td>
                                <td style="font-size: 14px;">'.$rows['msce_school'].'</td>
                                <td style="font-size: 14px;">'.$rows['msce_year'].'</td>
                                <td style="font-size: 14px;">'.$rows['created_on'].'</td>
                                <td>
                                    <a href="#" title="Reset Password" class="text-primary editBtn" 
                                     id="">
                                        <i class="fa fa-refresh fa-lg"></i>
                                    </a>&nbsp
            
                                    <a href="#" title="Delete" class="text-danger delBtn" id="'.$rows['id'].'">
                                        <i class="fa fa-trash fa-lg"></i>
                                    </a>&nbsp
                            </td>
                            </tr>
                            ';
            }

            $output .= '</tbody></table>				
                        </section>
                    </div>
                </div>';
            echo $output;

        } else {
            echo '<h3 class="text-center text-secondary mt-5">:
                            No any Students in the database
                        </h3>';
        }
    }
?>