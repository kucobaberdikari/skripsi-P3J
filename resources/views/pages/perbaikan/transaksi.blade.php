@extends('layouts.default')
@section('content')
  <div class="card">
   <div class="card-header">
     <h3 class="card-title">DATA PENGADUAN PERBAIKAN TERPROSES</h3>
     <div class="card-tools">
      <button type="button" class="btn btn-tool" >
        <a href="{{url('perbaikan/trash')}}" class="btn btn-sm"><i class="fas fa-trash"></i></a>
       </button>
   </div>
   </div>
   <div class="card-body">
     <table id="table1" class="table table-bordered table-striped" style="max-width: 150px">
       <thead>
       <tr>
        <th>#</th>
        <th>ID Pelanggan</th>
        <th>Nama </th>
        <th>alamat</th>
        <th>Kode Pos</th>
        <th>Telepon</th>
        <th>Email</th>
        <th width="150px">Deskripsi</th>
        <th>Tanggal Diproses</th>
        <th>Action</th>
       </tr>
       </thead>
       <tbody>
        <?php $no=1; ?>
        @forelse ($items as $item)
       <tr>
        <td>{{$no++}}</td>
        <td>{{$item->id_pelanggan}}</td>
        <td>{{$item->nama}} </td>
        <td>{{$item->alamat}}</td>
        <td>{{$item->kodepos}}</td>
        <td>{{$item->telepon}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->description}}</td>
        <td>{{$item->updated_at}}</td>
        <td align="center"> 
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn bg-olive ">
              <input type="radio" id="option_b0" autocomplete="off" >
              <a href="javascript:void(0)" data-id="{{ $item->id }}"onclick="processPost(event.target)">Reset</a>
            </label>
            <label class="btn bg-olive">
              <a href="javascript:void(0)" data-id="{{ $item->id }}" data-toggle="modal" data-target="#post-modal"
                onclick="showPost(event.target)" >Detail</a>
             </label>
          </div>
        </td>
       </tr>
       @empty
       <tr>
          <td colspan="10" class="text-center p-5">
             Data Tidak Tersedia
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
               <input type="hidden" name="post_id" id="post_id" >
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
      <label for="name" class="col-sm-2">Status</label>
      <div class="col-sm-12">
          <input type="text" class="form-control" id="status" name="status" disabled>
          <span id="statusError" class="alert-message"></span>
      </div>
  </div>
    <div class="form-group">
      <label for="name" class="col-sm-4">Operator Pemeriksa</label>
      <div class="col-sm-12">
          <input type="text" class="form-control" id="operator" name="operator" disabled>
          <span id="operatorError" class="alert-message"></span>
      </div>
  </div>
            </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
 @endsection
 @push('script')
 <script>
    $("#table1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table1_wrapper .col-md-6:eq(0)');
    function showPost(event) {
     var id  = $(event).data("id");
     let _url = `show/${id}`;
     $.ajax({
       url: _url,
       type: "GET",
       success: function(response) {
           if(response) {
             $("#post_id").val(response.id);
             $("#id_pelanggan").val(response.id_pelanggan);
             $("#nama").val(response.nama);
             $("#alamat").val(response.alamat);
             $("#kodepos").val(response.kodepos);
             $("#telepon").val(response.telepon);
             $("#email").val(response.email);
             $("#status").val(response.status);
             $("#operator").val(response.operator);
             $("#description").val(response.description);
             $('#post-modal').modal('show');
           }
       }
     });
   }
    function processPost(event){
      var id = $(event).data("id");
      let _url = `setstatus/${id}?status=PENDING`;
      $.ajax({
         url: _url,
         type: 'GET',
         success: function(response) {
          window.location.href = "{{url('/perbaikan/transaksi')}}";
         }
       });
    }
 </script>
@endpush