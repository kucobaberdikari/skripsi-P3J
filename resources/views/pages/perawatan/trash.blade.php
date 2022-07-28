@extends('layouts.default')
@section('content')
  <div class="card">
   <div class="card-header">
     <h3 class="card-title">DATA PENGADUAN PERAWATAN TERHAPUS</h3>
     <div class="card-tools">
      <button type="button" class="btn btn-tool" >
        <a href="{{url('perawatan')}}" class="btn btn-md"><i class="fas fa-home fa-lg"></i></a>
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
        <th>Jenis Perawatan</th>
        <th>Dihapus pada</th>
        <th>Action</th>
       </tr>
       </thead>
       <tbody>
        <?php $no=1; ?>
        @forelse ($items as $item)
       <tr id="row_{{$item->id}}">
        <td>{{$no++}}</td>
        <td>{{$item->id_pelanggan}}</td>
        <td>{{$item->nama}} </td>
        <td>{{$item->alamat}}</td>
        <td>{{$item->kodepos}}</td>
        <td>{{$item->telepon}}</td>
        <td>{{$item->perawatan}}</td>
        <td>{{$item->deleted_at}}</td>
        <td align="center"> 
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label  class="btn bg-olive">
              <a href="javascript:void(0)" data-id="{{ $item->id }}" 
                onclick="restorePost(event.target)">Restore</a>
            </label>
            <label class="btn bg-olive">
              <a href="javascript:void(0)" data-id="{{ $item->id }}" 
                onclick="deletePost(event.target)">Delete</a>
            </label>
          </div>
        </td>
       </tr>
       @empty
       <tr>
          <td colspan="6" class="text-center p-5">
             Data Tidak tersedia
          </td>
       </tr>
   @endforelse
       </tbody>
     </table>
   </div>
 </div>
 @endsection
 @push('script')
 <script>
     $('#table1').dataTable({
         "responsive": true,
     });
   function restorePost(event) {
     var id  = $(event).data("id");
     let _url = 'perawatan/restore/${id}';
       $.ajax({
         url: _url,
         type: 'POST',
         success: function(response) {
           $("#row_"+id).remove();
           window.location.href = "{{url('/perawatan/trash')}}";
         }
       });
   }
   function deletePost(event) {
     var id  = $(event).data("id");
     let _url = `/perawatan/delete/${id}`;
     let _token   = $('meta[name="csrf-token"]').attr('content');
       $.ajax({
         url: _url,
         type: 'GET',
         data: {
       _token: _token
         },
         success: function(response) {
           $("#row_"+id).remove();
           window.location.href = "{{url('/perawatan/trash')}}";
         }
       });
   }
      function restorePost(event) {
     var id  = $(event).data("id");
     let _url = `/perawatan/restore/${id}`;
       $.ajax({
         url: _url,
         type: 'GET',

         success: function(response) {
           $("#row_"+id).remove();
           window.location.href = "{{url('/perawatan/trash')}}";
         }
       });
   }
 </script>
@endpush