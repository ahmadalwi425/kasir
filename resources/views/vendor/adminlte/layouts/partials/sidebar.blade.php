<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('img/avatar5.png') }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->username }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menu Utama</li>
            <!-- Optionally, you can add icons to the links -->
            @if (Auth::user()->level->nama_level=='administrator')
            <li><a href="{{url('user')}}"><i class='fa fa-user'></i> <span>User</span></a></li>
            <li><a href="{{url('masakan')}}"><i class='fa fa-cutlery'></i> <span>Masakan</span></a></li>
            <li><a href="{{url('order')}}"><i class='fa fa-list'></i> <span>Pesanan</span></a></li>
            <li><a href="{{url('transaksi')}}"><i class='fa fa-usd'></i> <span>Transaksi</span></a></li>
            <li><a href="{{url('meja')}}"><i class='fa fa-umbrella'></i> <span>Tempat</span></a></li>
            @elseif (Auth::user()->level->nama_level=='waiter')
            <li><a href="{{url('user')}}"><i class='fa fa-user'></i> <span>User</span></a></li>
            <li><a href="{{url('order')}}"><i class='fa fa-list'></i> <span>Pesanan</span></a></li>
            <li><a href="{{url('transaksi')}}"><i class='fa fa-usd'></i> <span>Transaksi</span></a></li>
            <li><a href="{{url('meja')}}"><i class='fa fa-umbrella'></i> <span>Tempat</span></a></li>
            @elseif (Auth::user()->level->nama_level=='kasir')
            <li><a href="{{url('user')}}"><i class='fa fa-user'></i> <span>User</span></a></li>
            <li><a href="{{url('order')}}"><i class='fa fa-list'></i> <span>Pesanan</span></a></li>
            <li><a href="{{url('transaksi')}}"><i class='fa fa-usd'></i> <span>Transaksi</span></a></li>
            @elseif (Auth::user()->level->nama_level=='owner')
            <li><a href="{{url('transaksi')}}"><i class='fa fa-usd'></i> <span>Transaksi</span></a></li>
            @elseif (Auth::user()->level->nama_level=='pelanggan')
            <li><a href="{{url('order/'.Auth::user()->id)}}"><i class='fa fa-list'></i> <span>Pesanan</span></a></li>
            @endif
            <li class="header">Konten Bantuan</li>
            <li><a href="{{url('transaksi/manual')}}"><i class='fa fa-fax'></i> <span>Cara Memesan</span></a></li>
            <!--<li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.multilevel') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">link 2</a></li>
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                </ul>
            </li>-->
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
