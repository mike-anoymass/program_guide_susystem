<!---------------- Session starts from here ----------------------->
<?php
    require_once "classAutoload.php";
    Session::start();

    if(!Session::get("userVars")){
        header("Location: ../../../login/login.php");
    }

    if(Session::get("programVars")){
        $programID = Session::get("programVars","programID");
    }else{
        header("Location: /college-management-system/views/admin/programs/");
    }
?>
<!---------------- Session Ends here ------------------------>

<?php
    require_once "../../../inc/scripts.php";
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Faculty</title>
	</head>
	<body>
		<?php include('../../../common/common-header.php') ?>
		<?php include('../../../common/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<a href="/college-management-system/views/admin/programs/"
                    class="btn btn-danger">
                        Back
                    </a>&nbsp; &nbsp;
                    <?php
                        $pView = new ProgramView();
                        $data = $pView->get($programID);
                        echo "<h4>".$data['name']."</h4>"; 
                    ?>    
				</div>
                <h5>Please Select four subjects</h5>
				<div class="row">
					<div class="col-md-12">
						<form action="" method="post" id="ps-data">
							<div class="row mt-3">
								<div class="col-md-6">
                                    <input type="hidden" name="program_id" id="program_id" 
                                    value='<?php echo $programID ?>' required>
									<div class="form-group">
                                        <label for="subject">Select Subject:</label>
                                        <select class="form-control" id="subject" name="subject">

                                            <?php
                                            $subjectView = new SubjectView();
                                            $rows = $subjectView->getAll();

                                            if(count($rows) === 0){
                                                echo "<option>Subjects Do not Exist</option>";
                                            }else{
                                                echo "<option>----Subjects-----</option>";
                                            }

                                            foreach($rows as $row){
                                                echo "<option value='$row[id]'>".
                                                    $row['name']. "</option>";
                                            }
                                            ?>
                                        </select>

                                    </div>


								</div>
								<div class="col-md-6">
									<div class="form-group">
                                        <label for="fculty">Select Grade/Weight:</label>
                                        <select class="form-control" id="grade" name="grade">

                                            <?php
                                            $gradeView = new GradeView();
                                            $rows = $gradeView->getAll();

                                            if(count($rows) === 0){
                                                echo "<option>Grades Do not Exist</option>";
                                            }else{
                                                echo "<option>----Grades-----</option>";
                                            }

                                            foreach($rows as $row){
                                                echo "<option value='$row[weight_number]'>".
                                                    $row['weight_number']."~".$row['description'] ."</option>";
                                            }
                                            ?>
                                        </select>

                                    </div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-6 mt-4">
									<div class="form-group pt-2">
										<input type="submit" name="insert" id="insert_btn" class="btn btn-primary"
                                        value="Add">
									</div>
                                    
								</div>
							</div>
						</form>
					</div>
				</div>

                <div id="showSubjects">
                    <div class="alert alert-success text-center text-bold">
                        Loading data...
                    </div>
                </div>
			</div>
		</main>
		
        <script src="/College-Management-System/js/program&subject.js"> </script>
	</body>
</html>
