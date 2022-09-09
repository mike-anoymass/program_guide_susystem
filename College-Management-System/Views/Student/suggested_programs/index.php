<!---------------- Session starts from here ----------------------->
<?php
    require_once "classAutoload.php";
    Session::start();

    if(!Session::get("userVars")){
        header("Location: ../../../login/login.php");
    }

     $studentID = Session::get("userVars","id");
   
?>
<!---------------- Session Ends here ------------------------>

<?php
    require_once "../../../inc/scripts.php";
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Student - Programs</title>
	</head>
	<body>
		<?php include('../../../common/common-header.php') ?>
		<?php include('../../../common/student-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4>Suggested Programs</h4>      
				</div>
				

                <div id="show">
                    <div class="alert alert-success text-center text-bold">
                        Loading data...
                    </div>
                </div>
			</div>
		</main>
		
        <script src="/College-Management-System/js/student&programs.js"> </script>
	</body>
</html>
