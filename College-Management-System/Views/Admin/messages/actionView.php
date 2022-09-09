<?php

    require_once "classAutoload.php";
    
    if (isset($_POST['action']) && $_POST['action'] === "view") {
        $output = '';
        $view = new MessageView;
        $data = $view->getAll();

        if ($data) {
            $output .= '
            <div class="row">
            <div class="col-md-12 ml-2">
                <section class="mt-3">
                    <table class="w-100 table-elements table-three-tr" cellpadding="3" 
                      id="subjectsTable">
                        <thead>
                        <tr class="table-tr-head table-three text-white">
                            <th>Subject</th>
                            <th>Body</th>
                            <th>Sender/Student</th>
                            <th>Status</th>
                            <th>Date Sent</th>
                            <th>Actions</th>
                        </tr>
                        
                         <tbody>';

            foreach ($data as $rows) {
                $status = "";
                if($rows['status']){
                    $status = "replied";
                }else{
                    $status="Not Replied";
                }

                $output .= '
                            
                            <tr style="cursor:pointer">
                                <td style="font-size: 14px;">'.$rows['subject'].'</td>
                                <td style="font-size: 14px;">'.$rows['body'].'</td>
                                <td style="font-size: 14px;">'.$rows['firstname'].'</td>
                                <td style="font-size: 14px;">'.$status.'</td>
                                <td style="font-size: 14px;">'.$rows['dateCreated'].'</td>
                                <td>
                                    <a href="#" title="View and Reply" class="text-primary editBtn" 
                                    data-toggle="modal" data-target="#editMessageModal" id="'.$rows['messageID'].'">
                                        <i class="fa fa-edit fa-lg"></i>
                                    </a>&nbsp
            
                                    <a href="#" title="Delete" class="text-danger delBtn" id="'.$rows['messageID'].'">
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
                            No any Messages in the database
                        </h3>';
        }
    }
?>