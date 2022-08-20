<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 4.1.1 -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="//fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
    <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    @yield('page_css')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/components.css')}}">
    <link rel="stylesheet" href="{{ asset('web/css/custom.css') }}">

    @yield('page_css')

    @yield('css')
</head>

<body>

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <nav class="navbar navbar-home navbar-expand-lg main-navbar">
                @include('layouts.header_home')



            </nav>

            <!-- Main Content -->



            <div class="main-content-home">
                
                <section class="section">
                    <div class="section-header">
                        <h3 class="page__heading ml-5">Inicio</h3>
                    </div>
                    <div class="section-body">
                        <div class="row ">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <!-- -->
                                            @foreach($areas as $area)
                                            <div class="col-md-3 col-xl-3">
                                                <div class="card bg-c-black order-card  h-100">
                                                    <div class="card-block">

                                                        <div class="mb-3 text-center  border-bottom border-warning pb-1">
                                                            <span class="h5">Área: </span>
                                                            <span class="h5">{{ $area['nombre'] }}</span>
                                                        </div>

                                                        <h5>Descripción:</h5>
                                                        <span >{{ $area['descripcion'] }}</span>
                                                       
                                                        <p class=" py-2 text-right"><a href="/agendar/{{$area['id']}}" class="text-dark badge badge-warning ">Agendar</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <!-- -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


            </div>
            <footer class="main-footer">

            </footer>
        </div>
    </div>


</body>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/iziToast.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>

<!-- Template JS File -->
<script src="{{ asset('web/js/stisla.js') }}"></script>
<script src="{{ asset('web/js/scripts.js') }}"></script>
<script src="{{ mix('assets/js/profile.js') }}"></script>
<script src="{{ mix('assets/js/custom/custom.js') }}"></script>

<!-- custom scripts-->
<script src="{{ asset('assets/js/annyang.js') }}"></script>



<!-- 
<script>

    function voice(id){
        document.getElementById(id).click();
    }

        if (annyang) {
            // Let's define our first command. First the text we expect, and then the function it should call
            var commands = {
                'sección dashboard': function () {
                    voice("voice_dashboard");
                },
                'sección usuarios': function () {
                voice("voice_usuarios");
                },
                'sección roles': function () {
                    voice("voice_roles");
                },
                'sección areas': function () {
                    voice("voice_areas");
                },
                'desplegar menú': function () {
                    voice("voice_menu_toggle");
                },
                '(desplegar) opciones usuario': function () {
                    voice("voice_toggle_user_options");
                },
                'opciones usuario cerrar sesión': function () {
                    voice("voice_logout");
                },
            };
            annyang.setLanguage('es-MX');
            annyang.addCommands(commands);
            annyang.debug();
            annyang.start({ continuous: false });
        }
</script> -->

</html>