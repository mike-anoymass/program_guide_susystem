<!---------------- Session starts form here ----------------------->
<?php
require_once "classAutoload.php";
Session::start();

if(!Session::get("userVars")){
    header("Location: ../../../login/login.php");
}
?>
<!---------------- Session Ends form here ------------------------>

<?php
    require_once "../../../inc/scripts.php";
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Subjects</title>
	</head>
	<body>
		<?php include('../../../common/common-header.php') ?>
		<?php include('../../../common/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4>Subjects Management</h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<form action="" method="post" id="subject-data">
							<div class="row mt-3">
								<div class="col-md-6">
                                    <input type="hidden" name="subject_id" id="subject_id" required>
									<div class="form-group">
										<label for="exampleInputEmail1">Subject Name: </label>
										<input type="text" name="subject_name" class="form-control" 
                                        required placeholder="Enter Subject Name" required id="subject_name">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Description:</label>
										<textarea name="description" class="form-control"
                                        id="description"
                                         required placeholder="Enter Subject Description" required></textarea>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-6 mt-4">
									<div class="form-group pt-2">
										<input type="submit" name="insert" id="insert_btn" class="btn btn-primary"
                                        value="Save" >
                                        <button type="submit" class="btn btn-success" id="clearBtn" >Clear</button>
                                        <input type="submit" name="update" id="update_btn" class="btn btn-warning"
                                        value="Update" >
                                        <input type="submit" name="delete" id="delete_btn" class="btn btn-danger"
                                        value="Delete" >
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
		
        <script src="/College-Management-System/js/subjects.js"> </script>
	</body>
</html>
