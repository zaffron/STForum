<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/admin_dashboard" style="font-weight: 900;">Dashboard</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{Auth::user()->name}} <span class="glyphicon glyphicon-fire"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{{route('user_profile', Auth::user())}}">Profile</a></li>
          <li><a href="/">General User</a></li>
          <li><a href="{{ route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
        </ul>
        <form id="logout-form" method="POST" action="{{route('logout')}}">
            {{csrf_field()}}
        </form>
    </li>
    </ul>
  </div>
</nav>