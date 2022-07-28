@extends('layouts.default')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">DAFTAR PENGADUAN PERBAIKAN </h1>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
   <div class="card-body">
    <div class="card-body card-block">
      <form action="{{ route('perbaikan.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="id_pelanggan" class="form-control-label">ID Pelanggan</label>
            <input type="number" name="id_pelanggan" value="{{ old('id_pelanggan') }}" class="form-control @error('id_pelanggan') is-invalid @enderror"/>
            @error('id_pelanggan') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
          <div class="form-group">
              <label for="nama" class="form-control-label">Nama Pelanggan</label>
              <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror"/>
              @error('nama') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
              <label for="alamat" class="form-control-label">Alamat Pelanggan</label>
              <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror"/>
              @error('alamat') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
            <label for="kodepos" class="form-control-label">Kode Pos</label>
            <input type="number" name="kodepos" value="{{ old('kodepos') }}" class="form-control @error('kodepos') is-invalid @enderror"/>
            @error('kodepos') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
          <label for="kodepos" class="form-control-label">Email</label>
          <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"/>
          @error('email') <div class="text-muted">{{ $message }}</div> @enderror
      </div> 
          <div class="form-group">
              <label for="telepon" class="form-control-label">Telepon Pelanggan</label>
              <input type="number" name="telepon" value="{{ old('telepon') }}" class="form-control @error('telepon') is-invalid @enderror"/>
              @error('telepon') <div class="text-muted">{{ $message }}</div> @enderror
          </div>  
          <div class="form-group">
            <label for="description" class="form-control-label">Deskripsi Masalah</label>
            <textarea name="description" class="ckeditor form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
             @error('description') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
          <div class="form-group">
              <button class="btn btn-primary btn-block" type="submit">Tambah Laporan</button>
          </div>
      </form>
  </div>
   </div>
 </div>
 @endsection