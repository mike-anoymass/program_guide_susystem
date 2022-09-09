<?php

    require_once "classAutoload.php";
    
    if (isset($_POST['action']) && $_POST['action'] === "view") {
        $output = '';
        $view = new ProgramView();
        $data = $view->getAll();

        if ($data) {
            $output .= '
            <div class="row">
            <div class="col-md-12 ml-2">
                <section class="mt-3">
                    <table class="w-100 table-elements table-three-tr" cellpadding="3" 
                      id="programsTable">
                        <thead>
                        <tr class="table-tr-head table-three text-white">
                            <th>ID</th>
                            <th>Program Code</th>
                            <th>Program Name</th>
                            <th>Faculty</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                        </tr>
                        
                         <tbody>';

            foreach ($data as $rows) {
                $output .= '
                            
                            <tr style="cursor:pointer">
                                <td style="font-size: 16px;">'.$rows['programID'].'</td>
                                <td style="font-size: 16px;">'.$rows['code'].'</td>
                                <td style="font-size: 16px;">'.$rows['programName'].'</td>
                                <td style="font-size: 16px;">'.$rows['facultyName'].'</td>
                                <td style="font-size: 16px;">'.$rows['date'].'</td>
                                <td>
                                    <a href="#" title="Manage Subjects" 
                                    class="btn btn-primary subjectsBtn" id="'.$rows['programID'].'">
                                        <i class="fa fa-table fa-lg"></i> View and Manage Subjects
                                    </a>
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
                            No any Programs in the database
                        </h3>';
        }
    }
?>