<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laporan Perbaikan {{$tglawal}} - {{$tglakhir}} </title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="apple-touch-icon" href="{{url('images/Icon_Telkom.png')}}">
  <link rel="shortcut icon" href="{{url('images/Icon_Telkom.png')}}">
  @include('includes.style')
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
  @include('includes.navbar')
  <div class="content-wrapper" style="padding-top: 15px">
    <div class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">DATA PERBAIKAN</h3>
        </div>
        <div class="card-body">
          <table id="table1" class="table table-bordered table-striped" >
            <thead>
            <tr>
             <th>No.</th>
             <th>ID Pelanggan</th>
             <th>Nama </th>
             <th>Alamat</th>
             <th>Kode Pos</th>
             <th>Telepon</th>
             <th>Email</th>
             <th>Deskripsi Masalah</th>
             <th>Tanggal Pengaduan</th>
             <th>Tenggat Pengaduan</th>
            </tr>
            </thead>
            <tbody>
             <?php $no=1; ?>
             @forelse ($eksporlaporan as $item)
            <tr >
             <td>{{$no++}}</td>
             <td>{{$item->id_pelanggan}}</td>
             <td>{{$item->nama}} </td>
             <td>{{$item->alamat}}</td>
             <td>{{$item->kodepos}}</td>
             <td>{{$item->telepon}}</td>
             <td>{{$item->email}}</td>
             <td>{{$item->description}}</td>
             <td>{{$item->created_at}}</td>
             <td>{{$item->tenggat}}</td>
            </tr>
            @empty
            <tr>
               <td colspan="10" class="text-center p-5">
                  Data Tidak tersedia
               </td>
            </tr>
        @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@include('includes.script')
<script>
  $("#table1").DataTable({
 "responsive": true, "lengthChange": false, "autoWidth": false,
 "buttons": ["copy", "csv", "excel", "colvis"]
}).buttons().container().appendTo('#table1_wrapper .col-md-6:eq(0)');
</script>
</body>
@stack('script')
</html>