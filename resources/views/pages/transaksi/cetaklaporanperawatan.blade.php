@extends('layouts.default')
@section('content')
  <div class="card">
   <div class="card-header">
    <h3 class="card-title">CETAK DATA TRANSAKSI PERAWATAN SELESAI </h3>
   </div>
   

   <div class="card-body" >
      <table class="table" >
     <tr>
        <td>
         <div class="input-group mb-3">
            <label for="label" style="padding-right: 10px">Tanggal Awal</label>
            <input type="date" name="tglawal" id="tglawal" class="form-control">
         </div>
        </td>
        <td>
         <div class="input-group mb-3">
            <label for="label" style="padding-right: 10px">Tanggal Akhir</label>
            <input type="date" name="tglakhir" id="tglakhir" class="form-control">
        </td>
      <td>
         <div class="input-group mb-3" >
               <button class="btn bg-blue" type="button">
               <a href="" onclick="this.href='/transaksi/print_laporan_tahunan/'+document.getElementById('tglawal').value+
               '/'+document.getElementById('tglakhir').value+
               '/'+document.getElementById('kodepos1').value+
               '/'+document.getElementById('kodepos2').value" target="_blank" rel="noopener noreferrer">Cetak Laporan</a>
               </button>
          </div>
        </td>
     </tr>
     <tr>
      <td>
         <div class="input-group mb-3">
            <label for="label"style="padding-right: 27px">Kode Pos 1</label>
            <input type="number" name="kodepos1" id="kodepos1" class="form-control">
         </div> 
        </td>
        <td rowspan="2">
         <div class="input-group mb-3">
            <label for="label" style="padding-right: 27px">Kode Pos 2 </label>
            <input type="number" name="kodepos2" id="kodepos2" class="form-control">
         </div>
        </td>    
     </tr>
      </table>
   </div>
 </div>
 @endsection