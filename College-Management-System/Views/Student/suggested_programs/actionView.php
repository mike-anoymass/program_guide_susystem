<?php

use LDAP\Result;

    require_once "classAutoload.php";
    
    
    if (isset($_POST['action']) && $_POST['action'] === "view") {

        Session::start();
        $studentID = Session::get("userVars", "id");
        $output = '';
        $view = new SSView();
        $pView = new ProgramView();
        $suggestedPrograms = array();

        $data = $view->getC($studentID);

        if ($data) {

            if(count($data) > 2){
                $programs = $pView->getAll();

                if(count($programs) > 0){
                    foreach($programs as $program){
                        array_push($suggestedPrograms, compareSubjects($program["programID"], $data));
                        
                    }

                    //filtering and removing empty indexes
                    $pg = array_values(array_filter($suggestedPrograms));
                    
                    if(count($pg) > 0){
                        $pgView = new ProgramView();
                        $data = $pgView->getPrg($pg);
                        $output .= '
                            <div class="row">
                            <div class="col-md-12 ml-2">
                                <section class="mt-3">
                                    <table class="w-100 table-elements table-three-tr" cellpadding="3" 
                                    id="programsTable">
                                        <thead>
                                        <tr class="table-tr-head table-three text-white">
                                         
                                            <th>Program Code</th>
                                            <th>Program Name</th>
                                            <th>Faculty</th>
                                            <th>Date Created</th>
                                          
                                        </tr>
                                        
                                        <tbody>';

                            foreach ($data as $rows) {
                                $output .= '
                                            
                                            <tr style="cursor:pointer">
                                            
                                                <td style="font-size: 16px;">'.$rows['code'].'</td>
                                                <td style="font-size: 16px;">'.$rows['programName'].'</td>
                                                <td style="font-size: 16px;">'.$rows['facultyName'].'</td>
                                                <td style="font-size: 16px;">'.$rows['date'].'</td>
                                                
                                            </tr>
                                            ';
                            }

                            $output .= '</tbody></table>				
                                        </section>
                                    </div>
                                </div>';
                            echo $output;
                    }else{
                        echo '<h3 class="text-center text-secondary mt-5">
                            : There are no suggested programs according to your grades
                        </h3>';
                    }

                }else{
                    echo "programs not found";
                }

            }else {
                echo '<h3 class="text-center text-secondary mt-5">
                                : Make sure that you add atleast three subjects
                            </h3>';
            }
           

        } else {
            echo '<h3 class="text-center text-secondary mt-5">
                            : Please add your subjects from the subjects menu
                        </h3>';
        }
    }

    function compareSubjects($programID, $subjects){
        $pSubjectsObj = new PSView();
        $psData = $pSubjectsObj->getC($programID);
        
        if(gettype($psData) === "array" && gettype($subjects) === "array"){
            
            sort($subjects);
            sort($psData);
    
            $result = array_diff_assoc(array_map("serialize", $subjects), array_map("serialize", $psData));
          
    
            if(count($result) == 0){
                return $programID;
            }
        }
       
   
    }
?>