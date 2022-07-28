<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$title}}</title>
  <link rel="apple-touch-icon" href="{{url('images/Icon_Telkom.png')}}">
  <link rel="shortcut icon" href="{{url('images/Icon_Telkom.png')}}"> 
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
      <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}">
    @include('includes.style')
   
</head>
<body>
<div class="wrapper" >
  <section class="invoice" >
    <div class="row">
      <div class="col-12">
        <h2 class="page-header digital">
          <img src="{{url('images/Icon_Telkom.png')}}" class="brand-image" style="width: 5%;height:5%"> Telkom Indonesia
        </h2>
      </div>
    </div>
    <hr>
    <h3 style="text-align: center"><b>{{$title}}</b></h3>
    <div class="row invoice-info" style="padding-left: 10px">
      <table class="table table-bordered" rules="all" style="text-align: center;border:1px;width:99%">
         <tr>
             <th rowspan="2">Month</th>
             <th colspan="4">Jumlah Perawatan</th>
             <th colspan="4">Jumlah Biaya Perawatan</th>
         </tr>
         <tr>
           @foreach ($job_comp_codes as $perawatan)
           <th> {{ $perawatan }}</th>
       @endforeach
       @foreach ($job_comp_codes as $perawatan)
           <th>{{ $perawatan }}</th>
       @endforeach
         </tr>
         @foreach ($report as $month => $values)
             <tr>
                 <td>{{ \Carbon\Carbon::parse($month)->format('F Y') }}</td>
                 @foreach ($job_comp_codes as $perawatan)
                     <td>{{ $report[$month][$perawatan]['count'] ?? '0' }}</td>
                 @endforeach
                 @foreach ($job_comp_codes as $perawatan)
                     <td> Rp. {{ $report[$month][$perawatan]['amount'] ?? '0' }}</td>
                 @endforeach
             </tr>
         @endforeach
     </table> 
    </div>

    <div class="row invoice-info" style="padding-top: 30px">
      <div class="col-12 table-responsive">
         <table class="table table-bordered " style="border: 1px;width:80%" rules="all">
            <thead>
            <tr>
              <th>No.</th>
             <th>ID Transaksi</th>
             <th>ID Pelanggan</th>
             <th>Nama </th>
             <th>alamat</th>
             <th>Kode Pos</th>
             <th>Telepon</th>
             <th>email</th>
             <th>Jenis Perawatan</th>
             <th>Deskripsi Perawatan</th>
            </tr>
            </thead>
            <tbody>
              <?php $no=1; ?>
             @foreach ($cetaklaporan as $item)
            <tr>
             <td>{{$no++}}</td>
             <td>{{$item->id_transaksi}}</td>
             <td>{{$item->id_pelanggan}}</td>
             <td>{{$item->nama}} </td>
             <td>{{$item->alamat}}</td>
             <td>{{$item->kodepos}}</td>
             <td>{{$item->telepon}}</td>
             <td>{{$item->email}}</td>
             <td>{{$item->perawatan}}</td>
             <td>{{$item->deskripsi}}</td>
            </tr>
        @endforeach
            </tbody>
          </table>
      </div>
    </div>
    <footer >
      <div class="footer" style="padding-top:40px;padding-right: 40px;text-align: right">
        <p >Jakarta, {{ date('d F Y ') }}</p>
        <p >MANAGER CONSUMER SERVICE</p>
        <br>
        <br>
        <p > Donni Mardian S.</p>
      </div>
   </footer>
  </section>
</div>
<script>
   window.print();
</script>
</body>
</html>