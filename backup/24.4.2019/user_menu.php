<?php

echo '

 <!--<link href="includes/css/nav-bar.css" rel="stylesheet">-->
 <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="user_homepage.php"> <h1>Cempaka CRMS</h1>
</a>

</div>
<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
     <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="user_homepage.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">CRMS Main Menu</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="user_profile.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">My Profile</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="user_complaint.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Complaint Section</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="user_on_duty_fellow_list.php">
            <i class="fa fa-fw fa-list-ul"></i>
            <span class="nav-link-text">On-Duty Fellow</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="user_emergency_list.php">
            <i class="fa fa-fw fa-ambulance"></i>
            <span class="nav-link-text">Emergency Call Log</span>
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