@extends('layouts.defaultmember')
@section('content')
<div class="wrapper" style="padding-top: 30px">
    <div class="content-wrapper">
        <div class="container">
                <div class="col-lg-7">
                    <h1 class="m-0">Layanan Perawatan dan Perbaikan</h1>
                </div>
                     <div class="row mb-2" > 
            <div class="col-lg-8">
                <h2 style="padding-top: 30px">
                    Akses layanan pengaduan perawatan dan perbaikan yang anda butuhkan dengan cepat dan mudah
                </h2>
                <div  class="col-lg-8" style="padding-top: 10px">
                 <a class="btn  btn-block bg-danger" href="{{ url('/registrasiperawatan') }}">Layanan Perawatan</a> 
                 <a class="btn btn-block bg-danger" href="{{ url('/registrasiperbaikan') }}" >Layanan Perbaikan</a>   
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
