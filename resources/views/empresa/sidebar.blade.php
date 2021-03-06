<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    @if(Auth::user()->foto != '' )
                        <img src="/documentos/{{ Auth::user()->foto }}" class="user-image" alt="User Image"/>
                    @else 
                        <img src="/alivetech/res/img/AliveTech-Logo.png" class="img-circle" alt="User Image" />
                    @endif
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->nombre }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{-- trans('adminlte_lang::message.search') --}}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!--<li class="header">{{-- trans('adminlte_lang::message.header') --}}</li>-->
            <!-- Optionally, you can add icons to the links -->
            
            <li><a href="/empresamodulognrl"><i class='fa fa-id-card-o'></i> <span>Modulos Generales</span></a></li>
            <li class="active" id="urlempresa"><a href="/empresa"><i class='fa fa-briefcase'></i> <span>Proyectos</span></a></li>            
            <li><a href="/empresadocumentos"><i class='fa fa-folder-open-o'></i> <span>Documentos</span></a></li>


        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
