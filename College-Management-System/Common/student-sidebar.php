	<div class="row w-100">
		<button class="show-btn button-show ml-auto">
		<i class="fa fa-bars py-1" aria-hidden="true"></i>
		</button> 
	</div>
		<nav id="sidebarMenu" class="">
			<div class="col-xl-2 col-lg-3 col-md-4 sidebar position-fixed border-right">
				
				<ul class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link" href="/college-management-system/views/student/student&subject/">
						<span data-feather="file"></span>
						<i class="fa fa-book mr-2" aria-hidden="true"></i> My Subjects
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/college-management-system/views/student/suggested_programs/">
						<span data-feather="file"></span>
						<i class="fa fa-info-circle mr-2" aria-hidden="true"></i> Suggested Programs
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/college-management-system/views/student/messages/">
						<span data-feather="shopping-cart"></span>
						<i class="fa fa-th-list mr-2" aria-hidden="true"></i> Questions
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/college-management-system/views/student/account/">
						<span data-feather="shopping-cart"></span>
						<i class="fa fa-user mr-2" aria-hidden="true"></i> My Profile
						</a>
					</li>
				</ul>
			</div>
		</nav>
		
		<script>
			const toggleBtn = document.querySelector(".show-btn");
			const sidebar = document.querySelector(".sidebar");
			// undefined
			toggleBtn.addEventListener("click",function(){
				sidebar.classList.toggle("show-sidebar");
			});
		</script>