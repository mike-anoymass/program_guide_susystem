<?php
    require_once "classAutoload.php";

    Session::start();
    
    if (isset($_POST['action']) && $_POST['action'] === "view") {
        $output = '';
        $view = new MessageView;
        $data = $view->getStudentMessages(Session::get("userVars", "id"));

        if ($data) {
            $output .= '
            <section class=" bg-light text-center">
                        <div class=" w-100 pt-5 m-auto" style="
                    width:100%;
                    padding-right:15px;
                    padding-left:15px;
                    margin-right:auto;
                    margin-left:auto;
                    ">
                            <h1>My Questions</h1>
                            <div class="row pt-3 pb-3">
                            ';



                               ' 
                                
                           ';

            foreach ($data as $rows) {
                $status = "";
                if($rows['status']){
                    $status = "replied";
                }else{
                    $status="Not Replied";
                }

                $output .= '

                
                <div class="col-lg-3 col-md-3 col-sm-12 col-10 m-auto">
                    <div class="card card-margin">
                        <div class="card-body">
                            <h2>'.$rows['subject'].'</h2>
                            <h5>'.$rows['body'].'</h5>
                            <p>Response: <i>'.$rows['response'].'</i></p>
                            <code>Date Sent: '.$rows['dateCreated'].' <br>'.$status.'</code><br>
                            <hr>
                            <code>Date Replied: '.$rows['replied_on'].'</code><br>
                                    <a href="#" title="Delete" class="text-danger delBtn" id="'.$rows['messageID'].'">
                                        <i class="fa fa-trash fa-lg"></i>
                                    </a>&nbsp
                        </div>
                    </div>
                </div>
                
                ';
            }

            $output .= '
            </div>
            </div>	
            </section>';
            echo $output;

        } else {
            echo '<h3 class="text-center text-secondary mt-5">
                            :Add a New Question
                        </h3>';
        }
    }
?>