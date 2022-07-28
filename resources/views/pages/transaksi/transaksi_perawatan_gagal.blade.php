@extends('layouts.default')
@section('content')

  <div class="card">
   <div class="card-header">
     <h3 class="card-title">DATA TRANSAKSI PERAWATAN GAGAL</h3>
   </div>
   <div class="card-body">
     <table id="table1" class="table table-bordered table-striped" style="max-width: 150px">
       <thead>
       <tr>
        <th>#</th>
        <th>ID Transaksi</th>
        <th>ID Pelanggan</th>
        <th>Nama </th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Email</th>
        <th>Jenis Perawatan</th>
        <th>Action</th>
       </tr>
       </thead>
       <tbody>
        <?php $no=1; ?>
        @forelse ($item as $item)
       <tr>
        <td>{{$no++}}</td>
        <td>{{$item->id_transaksi}}</td>
        <td>{{$item->id_pelanggan}}</td>
        <td>{{$item->nama}} </td>
        <td>{{$item->alamat}}</td>
        <td>{{$item->telepon}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->perawatan}}</td>
        <td align="center"> 
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn bg-olive">
              <a href="javascript:void(0)" data-id="{{ $item->id }}" data-toggle="modal" data-target="#post-modal"
                onclick="showPost(event.target)" >Detail</a>
            </label>
          </div>
        </td>
       </tr>
       @empty
       <tr>
          <td colspan="9" class="text-center p-5">
             Data Tidak tersedia
          </td>
       </tr>
   @endforelse
       </tbody>
     </table>
   </div>
 </div>
 <div class="modal fade" id="post-modal" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Detail Laporan</h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form name="userForm" class="form-horizontal" id="editForm">
              @csrf
               <input type="hidden" name="id" id="id" >
                <div class="form-group">
                    <label class="col-md-2">No. Laporan</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" disabled>
                        <span id="id_transaksiError" class="alert-message"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2">ID Pelanggan</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" disabled>
                        <span id="id_pelangganError" class="alert-message"></span>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2">Nama</label>
                  <div class="col-sm-12">
                      <input type="text" class="form-control" id="nama" name="nama" disabled>
                      <span id="namaError" class="alert-message"></span>
                  </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2">Alamat</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="alamat" name="alamat" disabled>
                    <span id="alamatError" class="alert-message"></span>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2">Kode Pos</label>
              <div class="col-sm-12">
                  <input type="text" class="form-control" id="kodepos" name="kodepos" disabled>
                  <span id="kodeposError" class="alert-message"></span>
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2">telepon</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="telepon" name="telepon" disabled>
                <span id="teleponError" class="alert-message"></span>
            </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2">email</label>
          <div class="col-sm-12">
              <input type="text" class="form-control" id="email" name="email" disabled>
              <span id="emailError" class="alert-message"></span>
          </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5">Jenis perawatan</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="perawatan" name="perawatan" disabled>
            </textarea>
            <span id="perawatanError" class="alert-message"></span>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5">Deskripsi perawatan</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" disabled>
            </textarea>
            <span id="deskripsiError" class="alert-message"></span>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5">Nama Teknisi </label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="teknisi" name="teknisi" disabled>
            </textarea>
            <span id="teknisiError" class="alert-message"></span>
        </div>
      </div>
    <div class="form-group">
      <label  class="col-sm-2">Status</label>
      <div class="col-sm-12">
          <input type="text" class="form-control" id="status" name="status" disabled>
          <span id="statusError" class="alert-message"></span>
      </div>
    </div>
    <div class="modal-footer" style="align-items: right">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
        </div>
    </div>
  </div>
</div>
 @endsection

 @push('script')
 <script>
$(function () {
    $("#table1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "print", "colvis"]
    }).buttons().container().appendTo('#table1_wrapper .col-md-6:eq(0)');
    });
     function showPost(event) {
     var id  = $(event).data("id");
     let _url = `perawatan/show/${id}`;
     $.ajax({
       url: _url,
       type: "GET",
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
             $("#status").val(response.status);
             $("#perawatan").val(response.perawatan);
             $("#deskripsi").val(response.deskripsi);
             $("#teknisi").val(response.teknisi);
             $('#post-modal').modal('show');
           }
       }
     });
   }
 </script>
@endpush