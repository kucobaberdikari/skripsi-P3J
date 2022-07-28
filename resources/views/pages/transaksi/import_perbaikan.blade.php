@extends('layouts.default')
@section('content')
<div class="card">
   <div class="card-header">
      <h3 class="card-title">DATA TRANSAKSI PERBAIKAN TERLAKSANA</h3>
      <div class="card-tools">
        <button type="button" class="btn bg-red" data-toggle="modal" data-target="#ModalPerbaikan">Import Data Perbaikan</button>
      </div>
   </div>
   <div class="card-body">
      <table class="table table-bordered table-striped" id="table1">
         <thead>
            <tr class="text-center">
             <th>#</th>
             <th>ID Transaksi</th>
             <th>ID Pelanggan</th>
             <th>Nama </th>
             <th>alamat</th>
             <th>Telepon</th>
             <th width="150px">Deskripsi</th>
             <th>Action</th>
            </tr>
            </thead>
            <tbody>
             <?php $no=1; ?>
             @forelse ($items as $item)
            <tr>
             <td>{{$no++}}</td>
             <td>{{$item->id_transaksi}}</td>
             <td>{{$item->id_pelanggan}}</td>
             <td>{{$item->nama}} </td>
             <td>{{$item->alamat}}</td>
             <td>{{$item->telepon}}</td>
             <td>{{$item->deskripsi}}</td>
             <td class="text-center"> 
              <div class="btn-group btn-group-toggle">
                <label class="btn bg-red">
                  <a href="javascript:void(0)" data-id="{{$item->id}}" data-toggle="modal" data-target="#post-modal" onclick="showPost(event.target)">Detail</a>
                </label>
                <label class="btn bg-secondary">
                  <a href="javascript:void(0)" data-id="{{$item->id}}" onclick="invoicePost(event.target)">Invoice</a>
                </label>
                <label class="btn bg-red">
                  <a href="javascript:void(0)" data-id="{{ $item->id }}"onclick="konfirmasiPost(event.target)">Konfirmasi</a>
                </label>
                <label class="btn bg-secondary ">
                   <input type="radio" id="option_b0" autocomplete="off" >
                   <a href="javascript:void(0)" data-id="{{ $item->id }}"onclick="gagalPost(event.target)">Gagal</a>
                </label>
              </div>
             </td>
            </tr>
            @empty
            <tr>
               <td colspan="8" class="text-center p-5">
                  Data Tidak tersedia
               </td>
            </tr>
        @endforelse
            </tbody>
      </table>
   </div>
</div>
<div class="modal fade" id="ModalPerbaikan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Import Data Perbaikan</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <form action="{{route ('import.perbaikan')}}" method="POST" enctype="multipart/form-data">
         @csrf
       <div class="modal-body">
         <div class="form-group">
           <input type="file" name="file" required>
         </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">import</button>
       </div>
     </div>
    </form>
    </div>
</div>
  <div class="modal fade" id="post-modal" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
                 <h4 class="modal-title">Detail Laporan</h4>
              <button class="close" type="button" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card card-danger card-outline card-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0">
              </div>
              <div class="card-body">
                <form name="editForm" class="form-horizontal" id="editForm" >
                  @csrf 
                   <input type="hidden" name="id" id="id" >
                    <div class="form-group">
                        <label for="name" class="col-md-2">ID Transaksi</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" disabled>
                            <span id="id_transaksiError" class="alert-message"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-md-2">ID pelanggan</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" disabled>
                            <span id="id_pelangganError" class="alert-message"></span>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2">Nama</label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" id="nama" name="nama" disabled>
                          <span id="namaError" class="alert-message"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2">Alamat</label>
                      <div class="col-sm-12">
                        <input type="text" class="form-control" id="alamat" name="alamat" disabled>
                        <span id="alamatError" class="alert-message"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2">Kode Pos</label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" id="kodepos" name="kodepos" disabled>
                          <span id="kodeposError" class="alert-message"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2">telepon</label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" id="telepon" name="telepon" disabled>
                          <span id="teleponError" class="alert-message"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2">email</label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" id="email" name="email" disabled>
                          <span id="emailError" class="alert-message"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2">Deskripsi</label>
                      <div class="col-sm-12">
                          <textarea class="form-control" id="description" name="description" rows="4" cols="50" disabled>
                          </textarea>
                          <span id="descriptionError" class="alert-message"></span>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="name" class="col-sm-2">Nama Teknisi</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="teknisi" name="teknisi" disabled>
                        <span id="teknisiError" class="alert-message"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name" class="col-sm-2">Biaya</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="biaya" name="biaya" disabled>
                        <span id="biayaError" class="alert-message"></span>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
    </div>
  </div>
 @endsection

@push('script')
    <script>
    function showPost(event) {
      var id  = $(event).data("id");
      let _url = `perbaikan/show/${id}`;
      let _token   = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        url: _url,
        type: "GET",
        data: {
            _token: _token
      },
      success: function(response) {
        if(response) {
          $("#id").val(response.id);
          $("#id_transaksi").val(response.id_transaksi);
          $("#id_pelanggan").val(response.id_pelanggan);
          $("#nama").val(response.nama);
          $("#alamat").val(response.alamat);
          $("#kodepos").val(response.kodepos);
          $("#telepon").val(response.telepon);
          $("#email").val(response.email);
          $("#description").val(response.deskripsi);
          $("#status").val(response.status);
          $("#teknisi").val(response.teknisi);
          $("#biaya").val(response.biaya);
          $('#post-modal').modal('show');
        }
      }
      });
      } 

      function invoicePost(event) {
  var id  = $(event).data("id");
  let _url = `perbaikan/invoice/${id}`;
  let _token   = $('meta[name="csrf-token"]').attr('content');
  $.ajax({
    url: _url,
    type: "get",
    data: {
        _token: _token
      },
    success: function(response) {
      var redirectWindow = window.open(_url, '_blank','noopener noreferrer');
    redirectWindow.location;
    }
  });
}  

    function konfirmasiPost(event){
      var id = $(event).data("id");
      let _url = `perbaikan/Statusakhir/${id}?status=SELESAI`;
      let _token   = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
         url: _url,
         type: 'POST',
         data: {
           _token: _token
         },
         success: function(response) {
           window.location.href = "{{url('/transaksi/perbaikan')}}";
         }
       });
    }

    function gagalPost(event){
      var id = $(event).data("id");
      let _url = `perbaikan/Statusakhir/${id}?status=GAGAL`;
      let _token   = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
         url: _url,
         type: 'POST',
         data: {
           _token: _token
         },
         success: function(response) {
           window.location.href = "{{url('/transaksi/perbaikan')}}";
         }
       });
    }
    </script>
@endpush