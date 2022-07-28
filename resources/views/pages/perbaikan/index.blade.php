@extends('layouts.default')
@section('content')
  <div class="card">
   <div class="card-header">
     <h3 class="card-title">DATA PENGADUAN PERBAIKAN MASUK</h3>
     <div class="card-tools">
      <button type="button" class="btn btn-tool" >
        <a href="{{url('perbaikan/trash')}}" class="btn btn-sm"><i class="fas fa-trash"></i></a>
       </button>
   </div>
   </div>
   <div class="card-body">
     <table id="table1" class="table table-bordered table-striped" >
       <thead>
       <tr>
        <th>#</th>
        <th>ID Pelanggan</th>
        <th>Nama </th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Email</th>
        <th>Deskripsi</th>
        <th>Action</th>
       </tr>
       </thead>
       <tbody>
        <?php $no=1; ?>        
        @forelse ($data as $item)
       <tr>
        <td>{{$no++}}</td>
        <td>{{$item->id_pelanggan}}</td>
        <td>{{$item->nama}} </td>
        <td>{{$item->alamat}}</td>
        <td>{{$item->telepon}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->description}}</td>
        <td align="center"> 
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn bg-olive">
              <a href="javascript:void(0)" data-id="{{ $item->id }}" data-toggle="modal" data-target="#post-modal"
                onclick="showPost(event.target)" >Detail</a>
            </label>
            <label class="btn bg-olive">
              <a href="javascript:void(0)" data-id="{{ $item->id }}"onclick="processPost(event.target)">Proses</a>
            </label>
            <label class="btn bg-olive ">
              <input type="radio" id="option_b0" autocomplete="off" >
              <a href="javascript:void(0)" data-id="{{ $item->id }}"
                onclick="deletePost(event.target)">Delete</a>
            </label>
          </div>
        </td>
       </tr>
       @empty
       <tr>
          <td colspan="7" class="text-center p-5">
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
               <input type="hidden" name="id" id="id" >
                <div class="form-group">
                    <label for="name" class="col-md-2">ID pelanggan</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" >
                        <span id="id_pelangganError" class="alert-message"></span>
                    </div>
                </div>
                <div class="form-group">
                  <label for="name" class="col-sm-2">Nama</label>
                  <div class="col-sm-12">
                      <input type="text" class="form-control" id="nama" name="nama" >
                      <span id="namaError" class="alert-message"></span>
                  </div>
              </div>
              <div class="form-group">
                <label for="name" class="col-sm-2">Alamat</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="alamat" name="alamat" >
                    <span id="alamatError" class="alert-message"></span>
                </div>
            </div>
            <div class="form-group">
              <label for="name" class="col-sm-2">Kode Pos</label>
              <div class="col-sm-12">
                  <input type="text" class="form-control" id="kodepos" name="kodepos" >
                  <span id="kodeposError" class="alert-message"></span>
              </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-2">telepon</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="telepon" name="telepon" >
                <span id="teleponError" class="alert-message"></span>
            </div>
        </div>
        <div class="form-group">
          <label for="name" class="col-sm-2">email</label>
          <div class="col-sm-12">
              <input type="text" class="form-control" id="email" name="email" >
              <span id="emailError" class="alert-message"></span>
          </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2">Deskripsi</label>
        <div class="col-sm-12">
            <textarea class="form-control" id="description" name="description" rows="4" cols="50" >
            </textarea>
            <span id="descriptionError" class="alert-message"></span>
        </div>
    </div>
    <div class="modal-footer" style="align-items: right">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button  class="btn btn-primary update" type="submit" >Update </button>
        </div>
      </form>
        </div>
    </div>
  </div>
</div>
 @endsection

 @push('script')
 <script>
     $('#table1').dataTable({
         "responsive": true,
     });
     function showPost(event) {
     var id  = $(event).data("id");
     let _url = `perbaikan/show/${id}`;
     $.ajax({
       url: _url,
       type: "GET",
       success: function(response) {
           if(response) {
             $("#id").val(response.id);
             $("#id_pelanggan").val(response.id_pelanggan);
             $("#nama").val(response.nama);
             $("#alamat").val(response.alamat);
             $("#kodepos").val(response.kodepos);
             $("#telepon").val(response.telepon);
             $("#email").val(response.email);
             $("#description").val(response.description);
             $('#post-modal').modal('show');
           }
       }
     });
   }

$("#editForm").submit(function(e){
  e.preventDefault();
  let _token   = $("input[name=_token]").val();
    let id = $('#id').val();
    let id_pelanggan = $('#id_pelanggan').val();
    let nama = $('#nama').val();
    let alamat = $('#alamat').val();
    let kodepos = $('#kodepos').val();
    let telepon = $('#telepon').val();
    let email = $('#email').val();
    let description = $('#description').val();
    $.ajaxSetup({
headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
      url: 'perbaikan/update/'+id,
      type: 'PUT',
      data: {
        nama:nama,
        id_pelanggan:id_pelanggan,
        alamat:alamat,
        kodepos:kodepos,
        telepon:telepon,
        email:email,
        description:description,
        _token:_token
      },
      success: function (response) {
        $('#post-modal').modal('hide');
        window.location.href = "{{url('/perbaikan')}}";
      }
    });
})
   function processPost(event){
      var id = $(event).data("id");
      let _url = `perbaikan/setstatus/${id}?status=PROCESSED&operator={{Auth::user()->name}}`;
      let _token   = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
         url: _url,
         type: 'GET',
         data: {
           _token: _token
         },
         success: function(response) {
          window.location.href = "{{url('/perbaikan')}}";
         }
       });
    }
   function deletePost(event) {
     var id  = $(event).data("id");
     let _url = `perbaikan/destroy/${id}`;
     let _token   = $('meta[name="csrf-token"]').attr('content');
       $.ajax({
         url: _url,
         type: 'DELETE',
         data: {
           _token: _token
         },
         success: function(response) {
           window.location.href = "{{url('/perbaikan')}}";
         }
       });
   }
 </script>
@endpush