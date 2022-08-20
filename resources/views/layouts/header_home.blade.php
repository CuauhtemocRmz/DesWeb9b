     <!-- Nav bar-->
    <a class="mr-auto" href="/"> <span class=" h4 text-white"> {{ config('app.name') }}</span></a>
     <ul class="navbar-nav navbar-right">
         @if (Route::has('login'))
         @auth
         <li class="nav-link  nav-link-lg nav-link-user">
             <a href="{{ url('/home') }}" class="nav-link nav-link-lg nav-link-user">
                 <span class="btn btn-light">Mi cuenta</span>
             </a>
         </li>
         @else
         <li class="">
             <a href="{{ url('/login') }}" class="nav-link nav-link-lg nav-link-user">
                 <span class="btn btn-light">Iniciar Sesión</span>

             </a>
         </li>
         @if (Route::has('register'))
         <li class="">
             <a href="{{ url('/register') }}" class="nav-link nav-link-lg nav-link-user">
                 <span class="btn btn-light">Registrarse</span>

             </a>
         </li>
         @endif
         @endauth

         @endif
     </ul>