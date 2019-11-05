 <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <a class="navbar-brand" href="index.php">Administrator - <?php  echo $_SESSION['admin_name'] ?></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          </li>

           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
            <a class="nav-link" href="index.php">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text" style="color: #fff;">
                Dashboard</span>
            </a>
          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-group"></i>
              <span class="nav-link-text" style="color: #fff;">
                View Users Enrolled</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseComponents">
              <li>
                <a href="all_farmers.php"><span class="nav-link-text" style="color: #fff;">
                <i class="fa fa-fw fa-group"></i> Farmers</span></a>
              </li>
              <li>
                <a href="view_extension_officers.php"><span class="nav-link-text" style="color: #fff;">
                <i class="fa fa-fw fa-group"></i> Extension Officers</span></a>
              </li>
              <li>
                <a href="all_buyers.php"><span class="nav-link-text" style="color: #fff;">
                <i class="fa fa-fw fa-group"></i> Buyers</span></a>
              </li>
            </ul>
          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Components" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-user"></i>
              <span class="nav-link-text" style="color: #fff;">
                Add User </span>
            </a>
            <ul class="sidenav-second-level collapse" id="Components">
              <li>
                <a href="add_farmer.php"><span class="nav-link-text" style="color: #fff;">
                <i class="fa fa-fw fa-user"></i> Farmer</span></a>
              </li>
              <li>
                <a href="add_extension_officer.php"><span class="nav-link-text" style="color: #fff;">
                <i class="fa fa-fw fa-user"></i> Extension Officer</span></a>
              </li>
              <li>
                <a href="add_buyer.php"><span class="nav-link-text" style="color: #fff;">
                <i class="fa fa-fw fa-user"></i> Buyer</span></a>
              </li>
            </ul>
          </li>

          <!--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
            <a class="nav-link" href="new_region.php">
              <i class="fa fa-fw fa-globe"></i>
              <span class="nav-link-text" style="color: #fff;">
                Add New Region</span>
            </a>
          </li>-->
        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <!--<li class="nav-item">
            <form class="form-inline my-2 my-lg-0 mr-lg-2">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
            </form>
          </li>-->
          <li class="nav-item">
            <a class="nav-link" href="../farmer/logout.php">
              <i class="fa fa-fw fa-sign-out"></i>
              Logout</a>
          </li>
        </ul>
      </div>
    </nav>