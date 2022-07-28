<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Perbaikan;
use App\Models\transaksi_perbaikan;
use App\Http\Requests\PerbaikanRequest;
use App\Imports\ImportPerbaikan;
use App\Exports\PerbaikanExport;
use Maatwebsite\Excel\Facades\Excel;

class TransaksiPerbaikanController extends Controller
{
    public function index()
    {    $title = 'Transaksi Laporan Terlaksana';   
        $items = transaksi_perbaikan::where('status','terkonfirmasi')->orderBy('created_at', 'desc')->get();
        return view('pages.transaksi.import_perbaikan')->with(['items'=>$items,'title'=>$title]);
    }
    public function selesai()
    {   $title = 'Transaksi Perbaikan Selesai'; 
        $item = transaksi_perbaikan::where('status','selesai')->orderBy('created_at', 'desc')->get();
        return view('pages.transaksi.transaksi_perbaikan_selesai')->with(['item'=>$item,'title'=>$title]);
    }
    public function gagal()
    {   $title = 'Transaksi Perbaikan Gagal'; 
        $item = transaksi_perbaikan::where('status','gagal')->orderBy('created_at', 'desc')->get();
        return view('pages.transaksi.transaksi_perbaikan_gagal')->with(['item'=>$item,'title'=>$title]);
    }
    public function registerperbaikan()
    {$title = 'Tambah Pengaduan Perbaikan';
        return view('pages.member.registerperbaikan')->with(['title'=>$title]);
    }

    public function store(Request $request)
    {   $dibuat = Carbon::now();
        $date = Carbon::now();
        $daysToAdd = 4;
        $dates= $date->addDays($daysToAdd);
        Perbaikan::create(['id_pelanggan'=>$request->id_pelanggan,
        'nama'=>$request->nama,
        'alamat'=>$request->alamat,
        'email'=>$request->email,
        'kodepos'=>$request->kodepos,
        'telepon'=>$request->telepon,
        'description'=>$request->description,
        'tenggat'=>$dates]);

        $item = ([
            'id_pelanggan'=>$request->id_pelanggan,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'email'=>$request->email,
            'kodepos'=>$request->kodepos,
            'telepon'=>$request->telepon,
            'deskripsi'=>$request->description,
            'dibuat'=>$dibuat,
            'tenggat'=>$dates]);
        return view ('pages.transaksi.receipts_perbaikan', compact('item'));
    }

    public function cetaklaporan()
    {   $title = 'Cetak Laporan Perbaikan';
        return view('pages.perbaikan.cetaklaporan')->with(['title'=>$title]);
    }
    public function laporan_tahunan()
    {    $title = 'Cetak Laporan Transaksi Perbaikan';
        return view('pages.transaksi.cetaklaporanperbaikan')->with(['title'=>$title]);
    }

    public function cetakperbaikanpertanggal($tglawal,$tglakhir,$kodepos1,$kodepos2)
    {
        $cetaklaporan=Perbaikan::where([
            ['status', 'PROCESSED'],
            ['kodepos','>=',[$kodepos1]],
            ['kodepos','<=',[$kodepos2]],
            ])->whereBetween('created_at',[$tglawal,$tglakhir])
        ->orderBy('kodepos', 'asc')->get();
        return view('pages.perbaikan.cetaklaporanpertgl',)->with([ 
            'cetaklaporan'=>$cetaklaporan,
            'kodepos1'=>$kodepos1,
            'kodepos2'=>$kodepos2,
            'tglawal'=>$tglawal,
            'tglakhir'=>$tglakhir
             ]);
    }

    public function show($id)
    {
        $item = transaksi_perbaikan::find($id);
    	return response()->json($item);
    }

    public function receipts($id)
    {
        $item = transaksi_perbaikan::find($id);
    	return view('pages.transaksi.receipts_perbaikan')->with(['item'=>$item]);
    }
    public function invoice($id)
    {
        $items = transaksi_perbaikan::find($id);
    	return view('pages.transaksi.invoice_perbaikan')->with(['items'=>$items]);
    }

    public function importdata(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('transaksi_perbaikan', $namaFile);

        Excel::import(new ImportPerbaikan, public_path ('transaksi_perbaikan/'.$namaFile));
        return redirect('transaksi/perbaikan');
    }

    public function eksporperbaikan($tglawal,$tglakhir,$kodepos1,$kodepos2)
    {
        $eksporlaporan=Perbaikan::where([
            ['status', 'PROCESSED'],
            ['kodepos','>=',[$kodepos1]],
            ['kodepos','<=',[$kodepos2]],
            ])->whereBetween('updated_at',[$tglawal,$tglakhir])
        ->orderBy('kodepos', 'asc')->get();
        return view('pages.perbaikan.eksporlaporan')->with([ 
            'eksporlaporan'=>$eksporlaporan,
            'kodepos1'=>$kodepos1,
            'kodepos2'=>$kodepos2,
            'tglawal'=>$tglawal,
            'tglakhir'=>$tglakhir
             ]);
    }

    public function Statusakhir(Request $request, $id)
    {
        $request->validate(['status' => 'required|in:SELESAI,GAGAL']);
        $item = transaksi_perbaikan::findOrFail($id);
        $item->status = $request->status;
        $item->save();
        return redirect('transaksi/perbaikan');
    }  

    public function cari_laporan_gagal($kodepos1,$kodepos2,$tgl1,$tgl2)
    {   $title = 'Transaksi Perbaikan Gagal';
        $item=transaksi_perbaikan::where([
            ['status', 'gagal'],
            ['kodepos','>=',[$kodepos1]],
            ['kodepos','<=',[$kodepos2]],
            ])->whereBetween('updated_at',[$tgl1,$tgl2])
        ->orderBy('id_transaksi', 'asc')->get();
        return view('pages.transaksi.transaksi_perbaikan_gagal')->with(['item'=>$item,'title'=>$title]);
    }

    public function cari_laporan_selesai($kodepos1,$kodepos2,$tgl1,$tgl2)
    {   $title = 'Transaksi Perbaikan Selesai';
        $item=transaksi_perbaikan::where([
            ['status', 'selesai'],
            ['kodepos','>=',[$kodepos1]],
            ['kodepos','<=',[$kodepos2]],
            ])->whereBetween('updated_at',[$tgl1,$tgl2])
        ->orderBy('id_transaksi', 'asc')->get();
        return view('pages.transaksi.transaksi_perbaikan_selesai')->with(['item'=>$item,'title'=>$title]);
    }

    public function cetaklaporantransaksipertanggal($tglawal,$tglakhir,$kodepos1,$kodepos2)
    {   $title = 'Data Transaksi Perbaikan Selesai ';
        $cetaklaporan=transaksi_perbaikan::where([
            ['status', 'selesai'],
            ['kodepos','>=',[$kodepos1]],
            ['kodepos','<=',[$kodepos2]],
            ])->whereBetween('updated_at',[$tglawal,$tglakhir])
        ->orderBy('id_transaksi', 'asc')->get();
        return view('pages.transaksi.cetakperbaikan')->with([ 
            'cetaklaporan'=>$cetaklaporan,
            'kodepos1'=>$kodepos1,
            'kodepos2'=>$kodepos2,
            'tglawal'=>$tglawal,
            'tglakhir'=>$tglakhir,
            'title'=>$title,
        ]);
        
    }
}

