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
<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Manage your Account</title>
	</head>
	<body>
        <?php include('../../../common/common-header.php') ?>
		<?php include('../../../common/admin-sidebar.php') ?>  
		<div class="container  mt-1 border border-secondary mb-1">
            <form action="" id="user-data">
                <div class="row text-white bg-primary pt-5">
                    <div class="col-md-4">
                        <img class="ml-5 mb-5" height='290px' width='250px' 
                        src="/college-management-system/images/149071.png">
                    </div>
                    <div class="col-md-8">
                        <h3 class="ml-5"></h3><br>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Name:<input type="text" name="name" class="form-control" 
                                        required placeholder="Enter your full name" 
                                        required id="name">
                                </h5>
                                
                                <br><br>
                                <h5>Email:
                                <input type="email" name="email" class="form-control" 
                                        required placeholder="Enter Email Address" required
                                         id="email">
                                </h5> <br><br>
                            </div>
                            <div class="col-md-6">
                                <h5>Password:
                                <input type="password" name="password" class="form-control" 
                                        required placeholder="Enter Your new Password" required id="password">
                                </h5> <br><br>
                                <h5>Created On:
                                <input type="text" class="form-control" 
                                        placeholder="Date here" disabled
                                         id="date">
                                </h5> <br><br>
                            </div>		
                        </div>
                    </div>
                    <hr>
                </div>

                <div class="row">
                    <div class="col-md-6 mt-4">
                        <div class="form-group pt-2">
                            <input type="submit" name="update" id="update" class="btn btn-warning"
                            value="Update">
                        </div>
                        
                    </div>
				</div>

            </form>
		</div>

        <script src="/College-Management-System/js/accountAdmin.js"> </script>
	
</body>
</html>
