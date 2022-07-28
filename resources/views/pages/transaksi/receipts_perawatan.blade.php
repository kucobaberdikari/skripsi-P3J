<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pengaduan Perawatan {{$item['nama']}}</title>
    <link rel="apple-touch-icon" href="{{url('images/Icon_Telkom.png')}}">
    <link rel="shortcut icon" href="{{url('images/Icon_Telkom.png')}}">
    @include('includes.style')
    <style>
      @page{
        size: A4;
      }
    </style>
  </head>
  <div class="row" style="padding: 0px">
    <div class="col-12">
      <div class="page-header digital" >
        <h1 style="margin-bottom:0rem;background-color:rgb(228,35,19);color:white" >
           <img src="{{url('images/icon_telkom_reserved.png')}}" class="brand-image"
            style="width: 10%;height:10%;margin-bottom:1rem"><b >Telkom Indonesia</b></h1>
      </div>
    </div>
  </div>
  <body class="document">
    <section class="invoice" style="padding: 50px">
    <div class="container">
      <div class="row" style="padding-top: 50px;text-align:center">
        <center><h1><u>PENGADUAN PERAWATAN</u></h1></center>
      </div>
    </div>
    <div class="row invoice-info" style="padding-top: 30px;padding-left:20px">
      <div class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
        <h3>Hai {{$item['nama']}},</h3>
        <p>terima kasih telah menggunakan layanan Perawatan dari Telkom Indonesia Berikut
           keterangan pengaduan yang telah dilakukan :
      </div>
    </div>
    <div class="row" >
      <div class="col-12 table-responsive">
        <table class="table table-striped table-bordered " style="width: 80%;margin-left: 40px" >
          <tbody>
            <tr>
              <td>ID Pelanggan</td>
              <td>{{$item['id_pelanggan']}}</td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>{{$item['nama']}}</td>
            </tr>
            <tr>
              <td>Alamat </td>
              <td>{{$item['alamat']}}</td>
            </tr>
            <tr>
              <td>Kode Pos </td>
              <td>{{$item['kodepos']}}</td>
            </tr>
            <tr>
              <td>Email </td>
              <td>{{$item['email']}}</td>
            </tr>
            <tr>
              <td>Telepon </td>
              <td>{{$item['telepon']}}</td>
            </tr>
            <tr>
              <td>Jenis Perawatan</td>
              <td>{{$item['perawatan']}}</td>
            </tr>
            <tr>
              <td>Tanggal Pengaduan </td>
              <td>{{$item['dibuat']}}</td>
            </tr>
            <tr>
              <td>Tenggat Pengaduan</td>
              <td>{{$item['tenggat']}}</td>
            </tr>
          </tbody>
        </table>
        <p>Demikian laporan ini dibuat sesuai dengan data yang terdapat di dalam database kami.</p>
      </div>
    </div>
    <br>
    <br>
    <footer >
      <div class="footer" style="padding-right: 40px;text-align: right">
        <p >Jakarta, {{ date('d F Y ') }}</p>
        <p > CONSUMER SERVICE</p>
        <br>
        <br>
        <p > Telkom Indonesia</p>
      </div>
   </footer>
    </section>
    <footer  style="position: absolute;bottom: 0px;" >
      <table class="email-footer" align="center" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
          <td class="content-cell" align="center">
            <p class="f-fallback sub align-center"> <img src="{{url('images/Icon_Telkom.png')}}"style="width: 5%;height:5%" >Telkom Indonesia
            <br>Telkom Landmark Tower, 39-nd floor,Kuningan Barat, DKI Jakarta, Indonesia, 12710
            </p>
          </td>
        </tr>
      </table>  
    </footer>
    @include('includes.script')
  <script type="text/javascript">
    window.print();
 </script>
  </body>
</html>