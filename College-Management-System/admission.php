<!DOCTYPE html>
<html>
<head>
	<title>Registration form</title>
    
</head>
<body>
	<?php include('common/header.php') ?>
    <?php
        require_once "inc/scripts.php";
    ?>
	<div class="container-fluid">
		<div class="row pt-2">
			<div class="col-xl-12 col-lg-12 col-md-12 w-100">
				<div class="bg-info text-center">
					<div class="table-one flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
						<h4>Student Registration Form</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="row m-3">
			<div class="col-md-12">
				<form method="POST" id="student-data">
					<div class="row mt-3">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">First Name:*</label>
								<input type="text" name="first_name" class="form-control" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Middle Name:</label>
								<input type="text" name="middle_name" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required>Last Name:*</label>
								<input type="text" name="last_name" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
                    <div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Gender:</label>
								<select class="browser-default custom-select" name="gender" required>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Postal/Residential Address:*</label>
								<input type="text" name="address" class="form-control" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Mobile No:*</label>
								<input type="number" name="mobile_no" class="form-control" required>
							</div>
						</div>
					</div>
					<div class="row">
                    <div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Previous/MSCE School:*</label>
								<input type="text" name="school" class="form-control" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">MSCE Year:</label>
								<input type="number" name="year" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required>Type:</label>
								<input type="text" value="Student" disabled class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
                    <div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Username:*</label>
								<input type="text" name="username" class="form-control" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Password:</label>
								<input type="password" id="password" name="password" class="form-control" 
                                required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Confirm Password:</label>
								<input type="password" id="password2" class="form-control" required>
							</div>
						</div>
                    </div>
				
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary px-5" name="btn_save" id="btn-save">
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 w-100 p-5">
				<h4 class="bg-secondary p-3 text-center text-white">Policy</h4>
				<h5>Students take note of the following undetaking:</h5>
				<p class="tet-justify">
                    Mubas is a public university 
                </p>
			</div>
		</div>	
	</div>

    <script src="/college-management-system/js/studentRegister.js"></script>
</body>
</html>