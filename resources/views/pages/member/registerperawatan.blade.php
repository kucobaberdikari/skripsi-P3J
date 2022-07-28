@extends('layouts.defaultmember')
@section('content')
<div class="wrapper" style="padding-top: 30px">
    <div class="content-wrpapper">
        <div class="container">
            <div class="col-lg-10">
                <h1 class="m-0" align="center" style="padding-bottom: 20px"> Registrasi Layanan Perawatan </h1>
            </div>
            <div class="row mb-2" > 
                <div class="col-lg-10">
                 <div class="card">
                  <div class="card-body">
                     <div class="card-body card-block">
                       <form action="{{ route('transaksiperawatan.store') }}" method="POST">
                           @csrf
                           <div class="form-group">
                             <label for="id_pelanggan" class="form-control-label">ID Pelanggan</label>
                             <input type="number" name="id_pelanggan" value="{{ old('id_pelanggan') }}" class="form-control @error('id_pelanggan') is-invalid @enderror"  required/>
                             @error('id_pelanggan') <div class="text-muted">{{ $message }}</div> @enderror
                         </div>
                           <div class="form-group">
                               <label for="nama" class="form-control-label">Nama </label>
                               <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" required/>
                               @error('nama') <div class="text-muted">{{ $message }}</div> @enderror
                           </div>
                           <div class="form-group">
                               <label for="alamat" class="form-control-label">Alamat </label>
                               <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror" required/>
                               @error('alamat') <div class="text-muted">{{ $message }}</div> @enderror
                           </div>
                           <div class="form-group">
                             <label for="kodepos" class="form-control-label">Kode Pos</label>
                             <input type="number" name="kodepos" value="{{ old('kodepos') }}" class="form-control @error('kodepos') is-invalid @enderror" required/>
                             @error('kodepos') <div class="text-muted">{{ $message }}</div> @enderror
                         </div> 
                         <div class="form-group">
                            <label for="email" class="form-control-label">Email </label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required/>
                            @error('email') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                           <div class="form-group">
                               <label for="telepon" class="form-control-label">Telepon </label>
                               <input type="number" name="telepon" value="{{ old('telepon') }}" class="form-control @error('telepon') is-invalid @enderror" required/>
                               @error('telepon') <div class="text-muted">{{ $message }}</div> @enderror
                           </div>
                         <div class="form-group">
                           <label><strong>Pilih Jenis Perawatan :</strong></label><br/>
                           <select class="form-control select2bs4" name="perawatan" data-placeholder="Pilih Jenis Perawatan" style="width: 100%;" required >
                            <option value="">Pilih Jenis Perawatan</option>
                            <option value="kabel">Jaringan Kabel</option>
                            <option value="router">Router</option>
                            <option value="perawatan tahunan">Perawatan Tahunan</option>
                            <option value="penggantian jenis layanan">Penggantian Jenis Layanan</option>
                            <option value="cek piranti pendukung">Pengecekan Piranti Pendukung</option>
                           </select>
                       </div>
                           <div class="row form-group">
                               <button class="btn btn-danger btn-block" type="submit">Submit</button>
                               <button type="reset" class="btn btn-default btn-block">Reset</button>
                           </div>
                       </form>
                   </div>
                    </div>
                 </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection