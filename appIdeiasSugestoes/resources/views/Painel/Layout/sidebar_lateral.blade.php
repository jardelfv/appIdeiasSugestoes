<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('AdminLTE/') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
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
            <li class="active"><a href="{{ route('Painel.index') }}"><i class="fa fa-home"></i> Painel Principal</a></li>
            <li class="active"><a href="{{ route('Painel.sugestoes.addSugestao') }}"><i class="fa fa-lightbulb-o"></i> Cadastrar Sugestões</a></li>
            <li class="active"><a href="{{ route('Painel.sugestoes.listAllSugestoes') }}"><i class="fa fa-lightbulb-o"></i> Sugestões Realizadas</a></li>
            <li class="active"><a href="{{ route('Painel.sugestoes.avaliarSugestoes') }}"><i class="fa fa-lightbulb-o"></i> Avaliar Sugestões</a></li>
            <li class="active"><a href="{{ route('Painel.users.listAllUsers') }}"><i class="fa fa-users"></i> Usuários</a></li>
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
