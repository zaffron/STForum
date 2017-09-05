<!-- Sidebar -->
  <nav class="navbar navbar-default navbar-fixed-top nav-sidebar" id="sidebar-wrapper" role="navigation">
  <div class="sidebar-user-details">
    <div class="sidebar-image-holder">
        <img src="http://www.sbsc.in/images/dummy-profile-pic.png" alt="user-image">
    </div>
    <div class="sidebar-details-holder">
        <h4 style="color:skyblue;font-weight: 900;">{{Auth::user()->username}}</h4>
        <h6>Admin</h6>
    </div>    
  </div>

      <ul class="nav sidebar-nav">
          <li class="active">
              <a href="/admin_dashboard"><i class="fa fa-fw fa-home"></i> Home</a>
          </li>
          <li>
              <a href="/user_management"><i class="fa fa-fw fa-user"></i> Users Management</a>
          </li>
          <li>
              <a href="/tags_management"><i class="fa fa-fw fa-file-o"></i> Tags Management</a>
          </li>
          <li>
              <a href="#"><i class="fa fa-fw fa-cog"></i> Third page</a>
          </li>
      </ul>
  </nav>
  <!-- /#sidebar-wrapper -->