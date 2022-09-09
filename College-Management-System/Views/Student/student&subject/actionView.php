<?php

    require_once "classAutoload.php";
    
    if (isset($_POST['action']) && $_POST['action'] === "view") {
        Session::start();
        $studentID = Session::get("userVars", "id");
        $output = '';
        $view = new SSView();

        $data = $view->get($studentID);

        if ($data) {
            $output .= '
            <div class="row">
            <div class="col-md-12 ml-2">
                <section class="mt-3">
                    <table class="w-100 table-elements table-three-tr" cellpadding="3" 
                      id="subjectTable">
                        <thead>
                        <tr class="table-tr-head table-three text-white">
                            <th>Subject</th>
                            <th>Grade/Weight</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                         <tbody>';

            foreach ($data as $rows) {
                $output .= '
                            
                            <tr style="cursor:pointer">
                                <td style="font-size: 14px;">'.$rows['subjectName'].'</td>
                                <td style="font-size: 14px;">'.$rows['weight'].'</td>
                                <td style="font-size: 14px;">'.$rows['date'].'</td>
                                <td>
                                    <a href="#" title="Delete" class="text-danger delBtn" id="'.$rows['psID'].'">
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
                            Add your subjects and grades
                        </h3>';
        }
    }
?>