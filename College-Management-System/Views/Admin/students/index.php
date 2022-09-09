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
		<title>Admin - Students</title>
	</head>
	<body>
		<?php include('../../../common/common-header.php') ?>
		<?php include('../../../common/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4>Registered Students</h4>
				</div>

                <div id="showStudents">
                    <div class="alert alert-success text-center text-bold">
                        Loading data...
                    </div>
                </div>
			</div>
		</main>
		<?php include '../../../Common/edit_message_modal.php'; ?>
        <script src="/College-Management-System/js/adminStudents.js"> </script>
	</body>
</html>
