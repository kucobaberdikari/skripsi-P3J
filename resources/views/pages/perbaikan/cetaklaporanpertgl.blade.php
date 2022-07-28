<!DOCTYPE html>
<html>
  <head>
    <title>Laporan Perbaikan {{$tglawal}} - {{$tglakhir}}</title>
    <link rel="apple-touch-icon" href="{{url('images/Icon_Telkom.png')}}">
    <link rel="shortcut icon" href="{{url('images/Icon_Telkom.png')}}">
    <style>
      @page{
        size: A4 Landscape;
      }
    </style>
  </head>
  <body>
    <nav class="main-header navbar navbar-white">
      <div class="brand-icon">
        <img src="{{url('images/Telkom_Indonesia.png')}}" class="brand-image " style="height: 66px; width:120px">
      </div>
    </nav>
    <h3 class="card-title" style="text-align: center">DATA PERBAIKAN TERPROSES</h3>
<div class="inf">
  <table class="table-borderless" style="padding-left: 35px; padding-bottom:10px">
    <tr>
      <td >Tanggal Laporan </td>
      <td>: {{$tglawal}} - {{$tglakhir}}</td>
    </tr>
    <tr>
      <td >Kode Pos </td>
      <td>: {{$kodepos1}} - {{$kodepos2}}</td>
    </tr>
  </table>
</div>
    <div class="card">
      <table class="table table-bordered " rules="all" border="1px" align="center" >
        <thead>
        <tr>
          <th>#</th>
         <th>ID Pelanggan</th>
         <th>Nama </th>
         <th>alamat</th>
         <th>Kode Pos</th>
         <th>Telepon</th>
         <th>email</th>
         <th>Deskripsi Pengaduan</th>
         <th>Tanggal Dibuat</th>
         <th>Tenggat Pengaduan</th>
        </tr>
        </thead>
        <tbody>
          <?php $no=1; ?>
         @foreach ($cetaklaporan as $item)
        <tr>
         <td>{{$no++}}</td>
         <td>{{$item->id_pelanggan}}</td>
         <td>{{$item->nama}} </td>
         <td>{{$item->alamat}}</td>
         <td>{{$item->kodepos}}</td>
         <td>{{$item->telepon}}</td>
         <td>{{$item->email}}</td>
         <td >{{$item->description}}</td>
         <td>{{$item->created_at}}</td>
         <td>{{$item->tenggat}}</td>
        </tr>
    @endforeach
        </tbody>
      </table>
    </div>
    <br>
    <br>
    <footer >
      <div class="footer" style="padding-right: 40px;text-align: right">
        <p >Jakarta, {{ date('d F Y ') }}</p>
        <p >MANAGER CONSUMER SERVICE</p>
        <br>
        <br>
        <p > Donni Mardian S.</p>
      </div>
   </footer>
  </div>
  <script type="text/javascript">
    window.print();
 </script>
  </body>
</html>