<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
          <img src="{{ asset('img/logo-branco.png') }}" class="img-logo-sidebar" alt="Logo">
      </div>
      <!-- search form -->

        <div class="input-group">
          <a href="{{ route('site.home') }}">Página inicial</a>
        </div>

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu Lateral</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Painel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <!--

                  -->
              @if(Auth::user()->tipo == 'admin')
                <li class="active"><a href="{{ route('Painel.index') }}"><i class="fa fa-home"></i> Painel Principal</a></li>
                <li class="active"><a href="{{ route('Painel.sugestoes.listAllSugestoes') }}"><i class="fa fa-tags"></i> Todas as Sugestões</a></li>
                <li class="active"><a href="{{ route('Painel.sugestoes.avaliarSugestoes') }}"><i class="fa fa-legal"></i> Avaliar Sugestões</a></li>
                <li class="active"><a href="{{ route('Painel.sugestoes.implantadas') }}"><i class="fa fa-child"></i> Sugestões Implantadas</a></li>
              @endif

              <li class="active"><a href="{{ route('Painel.sugestoes.minhasSugestoes') }}"><i class="fa fa-tags"></i> Minhas Sugestões</a></li>
              <li class="active"><a href="{{ route('Painel.sugestoes.addSugestao') }}"><i class="fa fa-lightbulb-o"></i> Cadastrar Sugestões</a></li>
            @if(Auth::user()->tipo == 'admin')
              <li class="active"><a href="{{ route('Painel.users.listAllUsers') }}"><i class="fa fa-users"></i> Usuários</a></li>
            @endif
              <li class="active"><a href="{{ route('Painel.sugestoes.novaSugestao') }}"><i class="fa fa-lightbulb-o"></i> teste de envio mail</a></li>

          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
