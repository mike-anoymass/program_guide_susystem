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
		<title>Student - Questions</title>
	</head>
	<body>
		<?php include('../../../common/common-header.php') ?>
		<?php include('../../../common/student-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
                <button type="button" class="btn btn-sm btn-primary pull-right" style="margin:7px"
                                    data-toggle="modal" data-target="#messageAdd">
                                <i class="fa fa-user-plus fa-lg">&nbsp; New Question </i>
                </button>
			</div>
            <div id="showMessages">
                    <div class="alert alert-success text-center text-bold">
                        Loading data...
                    </div>
                </div>
		</main>
        
        <?php include '../../../Common/new_message_modal.php'; ?>
		<?php include '../../../Common/edit_message_modal.php'; ?>
        <script src="/College-Management-System/js/messagesStudent.js"> </script>
	</body>
</html>
