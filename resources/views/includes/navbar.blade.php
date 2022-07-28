<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
<div>
  <a href="{{route('dashboard')}}" class="brand-link">

    <img src="{{url('images/logo-telkom.png')}}" class="brand-image " >
  </a>   
</div>
     
<div class="collapse navbar-collapse order-3" id="navbarCollapse"  >
  <ul class="navbar-nav">
    <li class="nav-item">
      <a href="{{route('dashboard')}}" class="nav-link">
        <p class="text">DASHBOARD</p>
      </a>
    </li>
<div class="dropdown">
  <li class="nav-item dropdown-hover">
      <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">PERAWATAN</a>
      <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="width: 230px">
        <li><a href="{{route('perawatan.index')}}" class="nav-link"><p>PENGADUAN MASUK</p></a></li>
        <li class="dropdown-divider"></li>
        <li><a href="{{route('perawatan.make')}}" class="nav-link">TAMBAH PENGADUAN</a></li>
        <li class="dropdown-divider"></li>
        <li><a href="{{route('perawatan.transaksi')}}" class="nav-link">PENGADUAN TERPROSES</a></li>
        <li class="dropdown-divider"></li>
        <li><a href="{{url('perawatan/trash')}}" class="nav-link">PENGADUAN TERHAPUS</a></li>
    </li>
</div>
    
<div class="dropdown">
  <li class="nav-item dropdown-hover">
      <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">PERBAIKAN</a>
      <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="width: 230px">
        <li class="nav-item">
          <a href="{{route('perbaikan.index')}}" class="nav-link"><p>PENGADUAN MASUK</p></a></li>
          <li class="dropdown-divider"></li>
        <li class="nav-item">
          <a href="{{route('perbaikan.create')}}" class="nav-link"><p>TAMBAH PENGADUAN</p></a></li>
          <li class="dropdown-divider"></li>
        <li class="nav-item">
          <a href="{{route('perbaikan.transaksi')}}" class="nav-link"><p>PENGADUAN TERPROSES</p></a></li>
          <li class="dropdown-divider"></li>
          <li><a href="{{url('perbaikan/trash')}}" class="nav-link">PENGADUAN TERHAPUS</a></li>
    </li>
</div>
    
<div class="dropdown">
  <li class="nav-item dropdown-hover">
      <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">TRANSAKSI</a>
      <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="width: 280px">
        <li class="nav-item">
          <a href="{{url('transaksi/perawatan')}}" class="nav-link"><p>IMPORT TRANSAKSI PERAWATAN</p></a></li>
          <li class="dropdown-divider"></li>
        <li class="nav-item">
          <a href="{{url('transaksi/perbaikan')}}" class="nav-link"><p>IMPORT TRANSAKSI PERBAIKAN</p></a></li>
          <li class="dropdown-divider"></li>
        <li class="nav-item">
          <a href="{{url('transaksi/perawatanselesai')}}" class="nav-link"><p>TRANSAKSI PERAWATAN SELESAI</p></a></li>
          <li class="dropdown-divider"></li>
        <li class="nav-item">
          <a href="{{url('transaksi/perawatangagal')}}" class="nav-link"><p>TRANSAKSI PERAWATAN GAGAL</p></a></li>
          <li class="dropdown-divider"></li>
        <li class="nav-item">
          <a href="{{url('transaksi/perbaikanselesai')}}" class="nav-link"><p>TRANSAKSI PERBAIKAN SELESAI</p></a></li>
          <li class="dropdown-divider"></li>
        <li class="nav-item">
          <a href="{{url('transaksi/perbaikangagal')}}" class="nav-link"><p>TRANSAKSI PERBAIKAN GAGAL</p></a></li>
    </li>
</div>
    
<div class="dropdown">
  <li class="nav-item dropdown-hover">
      <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">CETAK LAPORAN</a>
      <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="width: 340px" >
        <li class="nav-item">
          <a href="{{url('cetaklaporan')}}" class="nav-link"><p>CETAK LAPORAN PERAWATAN</p></a></li>
          <li class="dropdown-divider"></li>
        <li class="nav-item">
          <a href="{{url('cetaklaporanperbaikan')}}" class="nav-link"><p>CETAK LAPORAN PERBAIKAN</p></a></li>
          <li class="dropdown-divider"></li>
        <li class="nav-item">
          <a href="{{url('transaksi/perawatan/laporan_tahunan ')}}" class="nav-link"><p>CETAK TRANSAKSI PERAWATAN TAHUNAN</p></a></li>
          <li class="dropdown-divider"></li>
        <li class="nav-item">
          <a href="{{url('transaksi/perbaikan/laporan_tahunan ')}}" class="nav-link"><p>CETAK TRANSAKSI PERBAIKAN TAHUNAN</p></a></li>
    </li>
</div>
    
  </ul>
</div>

  <!-- Right navbar links -->
  <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
    <!-- Notifications Dropdown Menu -->
    
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" >
        <i class="fa fa-user fa-lg"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div class="dropdown-item" style="align: center">
          <a > Admin : {{Auth::user()->name}}</a>
        </div>
        <div class="dropdown-divider"></div>
        <a href="{{route('logout')}}" class="dropdown-item">
          LOGOUT
        </a>
      </div>
    </li>
 
   
  </ul>
</nav>