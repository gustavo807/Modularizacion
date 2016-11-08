<nav class="navbar">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Alive Technology</a>
        </div>


        <!-- Navbar Right -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="/forms/prospect_form">Documentación de proyectos</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cuenta 
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                       
                        @if (Auth::check())
                        <li><a href="/users/logout">Logout</a></li>
                        @else
                        <li><a href="/users/register">Registro</a></li>
                        <li><a href="/users/login">Iniciar Sesión</a></li>
                        @endif   
                       
                        
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>