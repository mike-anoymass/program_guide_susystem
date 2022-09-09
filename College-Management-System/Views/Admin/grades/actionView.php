<?php

    require_once "classAutoload.php";
    
    if (isset($_POST['action']) && $_POST['action'] === "view") {
        $output = '';
        $view = new GradeView();
        $data = $view->getAll();

        if ($data) {
            $output .= '
            <div class="row">
            <div class="col-md-12 ml-2">
                <section class="mt-3">
                    <table class="w-100 table-elements table-three-tr" cellpadding="3" 
                      id="gradesTable">
                        <thead>
                        <tr class="table-tr-head table-three text-white">
                            <th>Grade Weight</th>
                            <th>Description</th>
                            <th>Date Created</th>
                        </tr>
                        
                         <tbody>';

            foreach ($data as $rows) {
                $output .= '
                            
                            <tr style="cursor:pointer">
                                <td style="font-size: 14px;">'.$rows['weight_number'].'</td>
                                <td style="font-size: 14px;">'.$rows['description'].'</td>
                                <td style="font-size: 14px;">'.$rows['created_on'].'</td>
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
                            No any Grades in the database
                        </h3>';
        }
    }
?>