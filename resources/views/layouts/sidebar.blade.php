<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        
        <a href="{{ url('/home') }}" class="h6">  {{ config('app.name') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full" src="{{ asset('img/logo2-sm.jpg') }}"  alt=""/>
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('layouts.menu')
    </ul>
</aside>
