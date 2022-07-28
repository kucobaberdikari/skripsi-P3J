<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>invoice {{$items->nama}}</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}">
<style>
  @page{
    size: A4;
  }
</style>
</head>
<body>
<div class="wrapper" >
  <section class="invoice" style="padding: 50px">
    <div class="row">
      <div class="col-12">
        <h2 class="page-header digital">
          <img src="{{url('images/Icon_Telkom.png')}}" class="brand-image" style="width: 5%;height:5%"> Telkom Indonesia
        </h2>
        <h5 class="float-right" style="padding-right: 100px">Date: {{ date('d F Y ') }}</h5>
      </div>
    </div>
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>Telkom Indonesia</strong><br>
          Telkom Landmark Tower, 39-nd floor,<br>
          Kuningan Barat, DKI Jakarta, Indonesia, 12710<br>
          Phone: +62 21 - 808 63539<br>
          Email: corporate_comm@telkom.co.id
        </address>
      </div>
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong>{{$items->nama}}</strong><br>
          {{$items->alamat}}, {{$items->kodepos}}<br>
          Phone: {{$items->telepon}}<br>
          Email: {{$items->email}}
        </address>
      </div>
      <div class="col-sm-4 invoice-col">
        <br>
        <b>ID Transaksi: </b>{{$items->id_transaksi}}<br>
        <b>ID Pelanggan:</b> {{$items->id_pelanggan}}
      </div>
    </div>
    <div class="row" style="padding-top: 30px">
      <div class="col-12 table-responsive">
        <table class="table table-striped table-bordered " style="width: 90%;margin-left: 10px" >
          <tbody>
            <tr>
              <td>ID transaksi</td>
              <td>{{$items->id_transaksi}}</td>
            </tr>
            <tr>
              <td>ID Pelanggan</td>
              <td>{{$items->id_pelanggan}}</td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>{{$items->nama}}</td>
            </tr>
            <tr>
              <td>Tanggal </td>
              <td>{{$items->tanggal_diproses}}</td>
            </tr>
            <tr>
              <td>Jenis Perawatan</td>
              <td>{{$items->perawatan}}</td>
            </tr>
            <tr>
              <td>Deskripsi Perawatan</td>
              <td>{{$items->deskripsi}}</td>
            </tr>
            <tr>
              <td>Nama Teknisi</td>
              <td>{{$items->teknisi}}</td>
            </tr>
            <tr>
              <td>Harga</td>
              <td>Rp. {{$items->biaya}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <p class="lead"> Rincian</p
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th>Total:</th>
              <td>Rp. {{$items->biaya}}</td>
            </tr>
          </table>
        </div>
      </div>
      <footer >
        <div class="footer" style="padding-right: 40px;text-align: right">
          <p >Jakarta, {{ date('d F Y ') }}</p>
          <p > CONSUMER SERVICE</p>
          <br>
          <br>
          <p > Telkom Indonesia</p>
        </div>
     </footer>
    </div>
  </section>
</div>
<script>
   window.print();
</script>
</body>
</html>