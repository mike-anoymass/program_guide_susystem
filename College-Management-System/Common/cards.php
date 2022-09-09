
</section>
	<section class=" bg-light text-center">
		<div class=" w-100 pt-5 m-auto" style="
	width:100%;
	padding-right:15px;
	padding-left:15px;
	margin-right:auto;
	margin-left:auto;
">
			<h1>FACULTIES</h1>
			<p>MUBAS serves the national and international community through a broad spectrum of undergraduate studies..</p>
			<div class="row pt-3 pb-3">

            <?php
                $view = new FacultyView();
                $data = $view->getAll();
                if ($data) {
                    foreach($data as $row){
                        echo '
                        <div class="col-lg-3 col-md-3 col-sm-12 col-10 m-auto">
                            <div class="card card-margin">
                                <div class="card-logo m-auto">
                                    <img src="images/1.jpg" class="card-img img-fluid">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">'.$row['name'].'</h5>
                                    <p class="card-title">'.$row['description'].'</p>
                                </div>
                            </div>
                        </div>';
                    }
                   
                }
            ?>
				
				
			</div>
		</div>	
	</section>