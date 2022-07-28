@extends('layouts.default')
@section('content')

<div class="row">
  <div class="col-lg-3 col-6">
    <div class="small-box bg-warning">
        <div class="inner">
            <h4>
              {{$items}}
            </h4>
            <p>PERAWATAN (pending)</p>
        </div>
        <a href="{{route('perawatan.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div> 
 <div class="col-lg-3 col-6">
    <div class="small-box bg-info">
        <div class="inner">
            <h4>
              {{$item}}
            </h4>
            <p>PERAWATAN (processed)</p>
        </div>
        <a href="{{url('/perawatan/transaksi')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
  <div class="col-lg-3 col-6">
    <div class="small-box bg-warning">
        <div class="inner">
            <h4>
              {{$perbaikan}}
            </h4>
            <p>PERBAIKAN (pending)</p>
        </div>
        <a href="{{route('perbaikan.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<div class="col-lg-3 col-6">
    <div class="small-box bg-info">
        <div class="inner">
            <h4>
              {{$perbaikanproses}}
            </h4>
            <p>PERBAIKAN (processed)</p>
        </div>
        <a href="{{url('/perbaikan/transaksi')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
</div>

<div class="card">
  <div class="card-header">
    <h2>DATA PERAWATAN</h2>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped" id="table1">
      <thead>
        <tr>
         <th>#</th>
         <th>ID Pelanggan</th>
         <th>Nama </th>
         <th>alamat</th>
         <th>Telepon</th>
         <th>Jenis Perawatan</th>
        </tr>
        </thead>
        <tbody>
         <?php $no=1; ?>
         @foreach ($itemsx as $items)
        <tr>
         <td>{{$no++}}</td>
         <td>{{$items->id_pelanggan}}</td>
         <td>{{$items->nama}} </td>
         <td>{{$items->alamat}}</td>
         <td>{{$items->telepon}}</td>
         <td>{{$items->perawatan}}</td>
        </tr>
    @endforeach
        </tbody>
    </table>
  </div>
</div>
<div class="card">
  <div class="card-header">
    <h2>DATA PERBAIKAN</h2>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped" id="table2">
      <thead>
        <tr>
         <th>#</th>
         <th>ID Pelanggan</th>
         <th>Nama </th>
         <th>alamat</th>
         <th>Telepon</th>
         <th>Deskripsi</th>
        </tr>
        </thead>
        <tbody>
         <?php $no=1; ?>
         @foreach ($itemss as $items)
        <tr>
         <td>{{$no++}}</td>
         <td>{{$items->id_pelanggan}}</td>
         <td>{{$items->nama}} </td>
         <td>{{$items->alamat}}</td>
         <td>{{$items->telepon}}</td>
         <td>{{$items->description}}</td>
        </tr>
    @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection

@push('script')
 <script>
     $('#table1').DataTable({
         "responsive": true,
     });
     $('#table2').DataTable({
         "responsive": true,
     });
 </script>
@endpush