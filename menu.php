<?php

echo '

 <!--<link href="includes/css/nav-bar.css" rel="stylesheet">-->
 <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="homepage.php"> <h1>Cempaka CRMS</h1>
</a>

</div>
<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
     <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="homepage.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">CRMS Main Menu</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="complaint.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Complaint Section</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-search"></i>
            <span class="nav-link-text">Search Complaint</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
          
            <li>
              <a href="search_complaint_by_type.php">By Complaint Type</a>
            </li>
            <li>
              <a href="deleted_complaint.php">Deleted Complaint</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="print_interface.php">
            <i class="fa fa-fw fa-print"></i>
            <span class="nav-link-text">Print Complaint</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="fellow.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Fellow Section</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="emergency.php">
            <i class="fa fa-fw fa-ambulance"></i>
            <span class="nav-link-text">Emergency Section</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-wrench">Configuration</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="user_list.php">Registered User List</a>
            </li>
            <li>
              <a href="reset_all_complaint.php">Reset All Complaint</a>
            </li>
            <li>
              <a href="reset_all_fellow.php">Reset All Fellow</a>
            </li>
            
          </ul>
        
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="complaint_statistic.php">
            <i class="fa fa-fw fa-signal"></i>
            <span class="nav-link-text">Complaint Statistic</span>
          </a>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="logout.php">
            <i class="fa fa-fw fa-sign-out"></i>
            <span class="nav-link-text">Log out</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>


';


?>