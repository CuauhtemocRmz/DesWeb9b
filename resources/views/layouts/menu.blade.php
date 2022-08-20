<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <hr>
<a class="nav-link bg-dark text-white" href="/"  >
        <i class=" fas fa-home"></i><span>INICIO</span>
    </a>
    <hr>
   @can('ver-dashboard')
    <a class="nav-link bg-dark text-white   "  href="/home" id="voice_dashboard" >
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
   @endcan
    @can('ver-usuario')
   <a class="nav-link bg-dark text-white "  href="/usuarios" id="voice_usuarios">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
    @endcan
    @can('ver-role')
    <a class="nav-link bg-dark text-white  "  href="/roles" id="voice_roles">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
    @endcan
    @can('ver-area')
    <a class="nav-link bg-dark text-white   "  href="/areas" id="voice_areas">
        <i class=" fas fa-folder"></i><span>Areas</span>
    </a>
    @endcan
    @can('ver-cita')
    <a class="nav-link bg-dark text-white   "  href="/citas" id="voice_citas">
        <i class=" fas fa-calendar"></i><span>Citas</span>
    </a>
    @endcan
</li>
