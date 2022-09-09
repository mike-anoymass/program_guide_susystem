<?php
require_once "classAutoload.php";
Session::start();

if(Session::get("userVars")){
    //print_r( Session::get("sessionVars","typeOfUser")) ;

    if(Session::get("userVars","type") === "admin" ){
        header("Location: ../views/admin/students/");
    }else {
        header("Location: ../views/student/student&subject/");
    }   
}
?>

<?php
    require_once "../inc/scripts.php";
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Login - Program Guide</title>
	</head>
	<body class="login-background">
		<?php include('../common/common-header.php') ?>
        <div class="login-div mt-3 rounded">
            <div class="logo-div text-center">
                <img src="../Images/logo.jpeg" alt="" class="align-items-center" width="100" height="100">
            </div>
            <div class="login-padding">
                <h2 class="text-center text-white">LOGIN</h2>
                <form class="p-1" action="" method="POST" id="data">
                    <div class="form-group">
                        <label><h6>Enter Your Username/Email:</h6></label>
                        <input type="text" name="username" placeholder="Enter username or email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label><h6>Enter Password:</h6></label>
                        <input type="Password" name="password" placeholder="Enter Password" class="form-control border-bottom" required>
                    </div>
                    <div class="form-group text-center mb-3 mt-4">
                        <input type="submit" name="login" id="login"
                        value="LOGIN" class="btn btn-white pl-5 pr-5
                         ">
                    </div>
                    <div  class="form-group text-center mb-3 mt-4" >
                        <a href="../admission.php" style="color:white">Register (for students)</a>
                    </div>
                </form>
            </div>
        </div>

        <script src="../js/login.js"></script>
    </body>
</html>



