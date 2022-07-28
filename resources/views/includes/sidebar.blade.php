<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="{{route('dashboard')}}" class="brand-link">
     <img src="{{url('images/Icon_Telkom.png')}}"   class="brand-image " style="opacity: .8">
     <span class="brand-text font-weight-light">Telkom Indonesia</span>
   </a>

   <div class="sidebar">

     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <li class="nav-header">NAVIGATION</li>
         <li class="nav-item">
           <a href="{{route('dashboard')}}" class="nav-link">
             <i class="nav-icon fa fa-home"></i>
             <p class="text">Dashboard</p>
           </a>
         </li>
         <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              PERAWATAN
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('perawatan.index')}}" class="nav-link">
                <p>LAPORAN MASUK</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('perawatan.create')}}" class="nav-link">
                <p>TAMBAH LAPORAN</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-wrench"></i>
            <p>
              PERBAIKAN
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
           
            <li class="nav-item">
              <a href="{{route('perbaikan.index')}}" class="nav-link">
                <p>LAPORAN PERBAIKAN</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('perbaikan.create')}}" class="nav-link">
                <p>TAMBAH LAPORAN</p>
              </a>
            </li>
          </ul>
        </li>
 
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-plus"></i>
            <p>
              TRANSAKSI
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
           
            <li class="nav-item">
              <a href="{{url('transaksi/perawatan')}}" class="nav-link">
                <p>TRANSAKSI PERAWATAN</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('transaksi/perbaikan')}}" class="nav-link">
                <p>TRANSAKSI PERBAIKAN</p>
              </a>
            </li>
          </ul>
        </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>