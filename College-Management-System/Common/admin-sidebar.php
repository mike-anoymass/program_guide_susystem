  <div class="row w-100">
    <button class="show-btn button-show ml-auto">
      <i class="fa fa-bars py-1" aria-hidden="true"></i>
    </button> 
  </div>
    <nav id="sidebarMenu" class="">
			<div class="col-xl-2 col-lg-3 col-md-4 sidebar position-fixed border-right">
        <div class="sidebar-header">
          
        </div>   
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="/college-management-system/views/admin/students/">
              <span data-feather="file"></span>
              <i class="fa fa-user mr-2" aria-hidden="true"></i>Students
            </a>
		      </li>
          <li class="nav-item">
            <a class="nav-link" href="/college-management-system/views/admin/faculties/">
              <span data-feather="shopping-cart"></span>
              <i class="fa fa-table mr-2" aria-hidden="true"></i> Faculties
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/college-management-system/views/admin/programs/">
              <span data-feather="users"></span>
              <i class="fa fa-book mr-2" aria-hidden="true"></i>Programs
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/college-management-system/views/admin/subjects/">
              <span data-feather="bar-chart-2"></span>
              <i class="fa fa-file-text-o mr-2" aria-hidden="true"></i> Subjects
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/college-management-system/views/admin/grades/">
              <span data-feather="layers"></span>
               <i class="fa fa-clock-o mr-2" aria-hidden="true"></i> Grades
            </a>
		  </li>
         
          <li class="nav-item">
            <a class="nav-link" href="/college-management-system/views/admin/messages/">
              <span data-feather="layers"></span>
              <i class="fa fa-envelope mr-2" aria-hidden="true"></i> Inbox
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/college-management-system/views/admin/account/">
              <span data-feather="layers"></span>
              <i class="fa fa-key mr-2" aria-hidden="true"></i> Manage Account
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