<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('Painel.index') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>P</b>TU</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Painel ideias</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('AdminLTE/dist/img/user2-160x160.jpg') }}" class="user-image"
                            alt="User Image">
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle"
                                alt="User Image">

                            <p>
                                {{ Auth::user()->name }} - Web Developer

                                <small>Membro há {{ Auth::user()->created_at->diffForHumans() }}</small>
                            </p>
                        </li>
                        
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-primary btn-flat">Perfil</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" class="btn btn-danger btn-flat">Sair</a>
                            </div>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>
