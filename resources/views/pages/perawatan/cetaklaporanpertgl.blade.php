<!DOCTYPE html>
<html>
  <head>
    <title>{{$title}}</title>
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
    <h3 class="card-title" style="text-align: center;text-transform: uppercase" >{{$title}}</h3>
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
    </div>
    <br>
    <br>
    <footer>
     <div class="footer mx-5" style="padding-right: 40px">
           <p style="text-align: right">Jakarta, {{ date('d F Y ') }}</p>
           <p style="text-align: right">MANAGER CONSUMER SERVICE</p>
           <br>
           <br>
           <br>
           <p style="text-align: right"> Donni Mardian S.</p>
     </div>
   </footer>
  </div>
  <script type="text/javascript">
    window.print();
 </script>
  </body>
</html>