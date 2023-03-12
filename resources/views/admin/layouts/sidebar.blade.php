<div class="polished-sidebar bg-light col-12 col-md-3 col-lg-2 p-0 collapse d-md-inline" id="sidebar-nav">

    <ul class="polished-sidebar-menu ml-0 pt-4 p-0 d-md-block">
        <input class="border-dark form-control d-block d-md-none mb-4" type="text" placeholder="Search" aria-label="Search" />
        <li class=" {{ request()->is('home') ? 'active' : ''}}"><a href="{{ url('dashboard') }}"><span class="oi oi-home"></span> Dashboard</a></li>
        <li class="{{ request()->is('programs*') ? 'active' : ''}} "><a href="{{url('programs/list')}}"><span class="oi oi-dashboard"></span> Programs</a></li>
        <li class=" {{ request()->is('users*') ? 'active' : ''}}"><a href="{{ url('users/list') }}"><span class="fa fa-users"></span> Users</a></li>
        <li class="{{ request()->is('messages*') ? 'active' : ''}}"><a href="{{ url('messages/list') }}"><span class="fas fa-mail-bulk"></span> Messages</a></li>
    </ul>

</div>
