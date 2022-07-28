<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerawatanController;
use App\Http\Controllers\PerbaikanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransaksiPerawatanController;
use App\Http\Controllers\TransaksiPerbaikanController;


Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('Home');
Auth::routes(['register' => true]);
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');
Route::get('/help', 'HomeController@help');


Route::get('perawatan', 'PerawatanController@index')->name('perawatan.index');
Route::get('perawatan/make', 'PerawatanController@make')->name('perawatan.make');
Route::post('perawatan/create', 'PerawatanController@create')->name('perawatan.create');
Route::put('perawatan/update/{id}', 'PerawatanController@updateperawatan')->name('perawatan.update');
Route::get('/perawatan/restore/{id}', 'PerawatanController@restore')->name('perawatan.restore');
Route::get('perawatan/delete/{id}', 'PerawatanController@delete')->name('perawatan.delete');
Route::get('perawatan/show/{id}', 'PerawatanController@show');
Route::get('perawatan/showproses/{id}', 'PerawatanController@showproses')->name('perawatan.showproses');
Route::GET('perawatan/edit/{id}', 'PerawatanController@edit')->name('perawatan.edit');
Route::get('perawatan/trash', 'PerawatanController@trash');
Route::post('perawatan/store', 'PerawatanController@store')->name('perawatan.store');
Route::GET('perawatan/showtrash/{id}', 'PerawatanController@showtrash')->name('perawatan.showtrash');
Route::DELETE('perawatan/destroy/{id}', 'PerawatanController@destroy')->name('perawatan.destroy');
Route::get('perawatan/transaksi', 'PerawatanController@transaksi')->name('perawatan.transaksi');
Route::get('perawatan/setstatus/{id}', 'PerawatanController@setStatus')->name('perawatan.setStatus');


Route::get('perbaikan', 'PerbaikanController@index')->name('perbaikan.index');
Route::get('perbaikan/create', 'PerbaikanController@create')->name('perbaikan.create');
Route::put('perbaikan/update/{id}', 'PerbaikanController@updateperbaikan')->name('perbaikan.update');
Route::get('/perbaikan/restore/{id}', 'PerbaikanController@restore');
Route::get ('perbaikan/delete/{id}', 'PerbaikanController@delete')->name('perbaikan.delete');
Route::get('perbaikan/show/{id}', 'PerbaikanController@show');
Route::get('perbaikan/edit/{id}', 'PerbaikanController@edit')->name('perbaikan.edit');
Route::get('perbaikan/trash', 'PerbaikanController@trash');
Route::post('perbaikan/store', 'PerbaikanController@store')->name('perbaikan.store');
Route::DELETE('perbaikan/destroy/{id}', 'PerbaikanController@destroy')->name('perbaikan.destroy');
Route::get('perbaikan/transaksi', 'PerbaikanController@transaksi')->name('perbaikan.transaksi');
Route::get('perbaikan/setstatus/{id}', 'PerbaikanController@setStatus')->name('perbaikan.setStatus');


Route::get('/transaksi/perawatan', 'TransaksiPerawatanController@index')->name('transaksi.perawatan');
Route::get('/transaksi/perawatanselesai', 'TransaksiPerawatanController@selesai')->name('transaksi.perawatanselesai');
Route::get('/transaksi/perawatangagal', 'TransaksiPerawatanController@gagal')->name('transaksi.perawatangagal');
Route::get('/transaksi/perawatan/show/{id}', 'TransaksiPerawatanController@show');
Route::POST('/transaksi/perawatan/store', 'TransaksiPerawatanController@store')->name('transaksiperawatan.store');
Route::get('/transaksi/perawatan/receipts/{id}', 'TransaksiPerawatanController@receipts')->name('transaksi.perawatan.receipt');
Route::get('/transaksi/perawatan/invoice/{id}', 'TransaksiPerawatanController@invoice')->name('transaksi.perawatan.invoice');
Route::get('/transaksi/perawatan/kirimemail/{id}', 'TransaksiPerawatanController@kirimemail')->name('transaksi.perawatan.kirimemail');
Route::get('/registrasiperawatan','TransaksiPerawatanController@registerperawatan')->name('registerperawatan');
Route::get('cetaklaporan', 'TransaksiPerawatanController@cetaklaporan')->name('cetak-laporan');
Route::get('cetaklaporantransaksiperawatan', 'TransaksiPerawatanController@cetaklaporantransaksi')->name('cetaklaporantransaksi');
Route::get('cetakperawatanpertgl/{tglawal}/{tglakhir}/{kodepos1}/{kodepos2}', 'TransaksiPerawatanController@cetaklaporanpertanggal')->name('cetak-laporanperawatan-pertgl');
Route::get('cetaktransaksipertgl/{tglawal}/{tglakhir}/{kodepos1}/{kodepos2}', 'TransaksiPerawatanController@cetaklaporantransaksipertanggal')->name('cetak-laporantransaksi-pertgl');
Route::post('importlaporanperawatan', 'TransaksiPerawatanController@importdata')->name('import.perawatan');
Route::get('eksporlaporanpertanggal/{tglawal}/{tglakhir}/{kodepos1}/{kodepos2}', 'TransaksiPerawatanController@eksporlaporanpertanggal')->name('eksporlaporanpertanggal');
Route::POST('transaksi/perawatan/Statusakhir/{id}', 'TransaksiPerawatanController@Statusakhir')->name('perawatan.Statusakhir');
Route::get('transaksi/perawatan/laporan_tahunan','TransaksiPerawatanController@laporan_tahunan')->name('laporan_tahunan'); 
Route::get('transaksi/cari-perawatan-gagal/{kodepos1}/{kodepos2}/{tgl1}/{tgl2}','TransaksiPerawatanController@cari_laporan_gagal');
Route::get('transaksi/cari-perawatan-selesai/{kodepos1}/{kodepos2}/{tgl1}/{tgl2}','TransaksiPerawatanController@cari_laporan_selesai');
Route::get('transaksi/print_laporan_tahunan/{tglawal}/{tglakhir}/{kodepos1}/{kodepos2}','TransaksiPerawatanController@print_laporan_tahunan');

Route::get('/transaksi/perbaikan', 'TransaksiPerbaikanController@index')->name('transaksi.perbaikan');
Route::get('/transaksi/perbaikanselesai', 'TransaksiperbaikanController@selesai')->name('transaksi.perbaikanselesai');
Route::get('/transaksi/perbaikangagal', 'TransaksiperbaikanController@gagal')->name('transaksi.perbaikangagal');
Route::post('/transaksi/perbaikan/store', 'TransaksiPerbaikanController@store')->name('transaksiperbaikan.store');
Route::get('/transaksi/perbaikan/show/{id}', 'TransaksiPerbaikanController@show');
Route::get('/transaksi/perbaikan/receipts/{id}', 'TransaksiPerbaikanController@receipts')->name('transaksi.perbaikan.receipts');
Route::get('/transaksi/perbaikan/invoice/{id}', 'TransaksiPerbaikanController@invoice')->name('transaksi.perbaikan.invoice');
Route::get('/registrasiperbaikan','TransaksiPerbaikanController@registerperbaikan');
Route::get('cetaklaporanperbaikan', 'TransaksiPerbaikanController@cetaklaporan')->name('cetak-laporan');
Route::get('transaksi/perbaikan/laporan_tahunan', 'TransaksiPerbaikanController@laporan_tahunan')->name('laporan_tahunan');
Route::get('cetakperbaikanpertgl/{tglawal}/{tglakhir}/{kodepos1}/{kodepos2}', 'TransaksiPerbaikanController@cetakperbaikanpertanggal')->name('cetak-laporanperbaikan-pertgl');
Route::get('eksporperbaikanpertgl/{tglawal}/{tglakhir}/{kodepos1}/{kodepos2}', 'TransaksiPerbaikanController@eksporperbaikan')->name('ekspor-perbaikan-pertgl');
Route::post('importlaporanperbaikan', 'TransaksiPerbaikanController@importdata')->name('import.perbaikan');
Route::post('transaksi/perbaikan/Statusakhir/{id}', 'TransaksiPerbaikanController@Statusakhir')->name('perbaikan.Statusakhir');
Route::get('transaksi/cari-perbaikan-gagal/{kodepos1}/{kodepos2}/{tgl1}/{tgl2}','TransaksiPerbaikanController@cari_laporan_gagal');
Route::get('transaksi/cari-perbaikan-selsai/{kodepos1}/{kodepos2}/{tgl1}/{tgl2}','TransaksiPerbaikanController@cari_laporan_selsai');
Route::get('transaksi/cetaklaporantransaksipertanggal/{kodepos1}/{kodepos2}/{tglawal}/{tglakhir}','TransaksiPerbaikanController@cetaklaporantransaksipertanggal');